<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu - Kantin Elthizy</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Arial", sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            background-size: cover;
            color: black;
        }

        .navbar {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        }

        .navbar a {
            text-decoration: none;
            font-size: 18px;
            margin: 0 20px;
            color: #fff;
        }

        .navbar h3 {
            font-size: 24px;
            margin: 0;
        }

        .menu-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .menu-table th,
        .menu-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .menu-table th {
            background-color: #4CAF50;
            color: white;
        }

        .menu-table img {
            width: 30%;
            height: auto;
            border-radius: 8px;
            display: block;
            margin: 0 auto;
        }

        td.quantity-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        td.quantity-container input {
            width: 50px;
            padding: 5px;
            text-align: center;
            margin: 0;
        }

        .quantity-container button.add-item,
        .quantity-container button.subtract-item {
            width: 30px;
            height: 30px;
            box-sizing: content-box;
            padding: 0;
        }

        .quantity-container button {
            background-color: #4caf50;
            color: black;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            margin: 5px 0;
            display: inline-block;
            margin: 5px 0;
            margin-left: auto;
            margin-right: auto;
        }

        .quantity-container button.add-item {
            background-color: #007BFF;
            color: white;
        }

        .quantity-container button.subtract-item {
            background-color: #DC3545;
            color: white;
        }

        .quantity-container button.add-item:hover {
            background-color: #0056b3;
        }

        .quantity-container button.subtract-item:hover {
            background-color: #c82333;
        }

        .center-button {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
        }

        .center-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
<div class="navbar">
        <h3>Elthizy Food</h3>
        <a href="home" id="home-link">HOME</a>
        <a href="about" id="about-link">ABOUT</a>
        <a href="menu" id="menu-link">MENU</a>
        <a href="history" id="history-link">RIWAYAT</a>
        <a href="customer_profile" id="profile-link">PROFILE</a>
        <a href="/auth/logout" id="logout-link">LOGOUT</a>
    </div>

    <form action="/process_order" method="post">
        <div class="menu">
            <table class="menu-table">
                <thead>
                    <tr>
                        <th>Nama Makanan</th>
                        <th>Gambar Makanan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $menuItems = [
                        ["name" => "Ayam Rica - Rica", "price" => 15000, "image" => "../img/food/rica.jpg", "quantity_id" => "quantity_1"],
                        ["name" => "Ayam Cabai Garam", "price" => 15000, "image" => "../img/food/cabegaram.jpg", "quantity_id" => "quantity_2"],
                        ["name" => "Sapi Lada Hitam", "price" => 18000, "image" => "../img/food/ladahitam.jpeg", "quantity_id" => "quantity_3"],
                        ["name" => "Sapi Saus Teriyaki", "price" => 18000, "image" => "../img/food/teriyaki.jpg", "quantity_id" => "quantity_4"],
                        ["name" => "Cumi Asam Manis", "price" => 17000, "image" => "../img/food/cumiasammanis.jpeg", "quantity_id" => "quantity_5"],
                        ["name" => "Cumi Cah Jamur", "price" => 17000, "image" => "../img/food/cumicahjamur.jpg", "quantity_id" => "quantity_6"],
                    ];

                    foreach ($menuItems as $index => $item) : ?>
                        <tr>
                            <td><?= isset($item['name']) ? htmlspecialchars($item['name']) : 'No Name' ?></td>
                            <td>
                                <?php if (isset($item['image']) && isset($item['name'])) : ?>
                                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                                <?php endif; ?>
                            </td>
                            <td>Rp <?= isset($item['price']) ? htmlspecialchars($item['price']) : 'No Price' ?></td>
                            <td class="quantity-container">
                                <?php if (isset($item['name']) && isset($item['price'])) : ?>
                                    <input type="hidden" name="item_<?= $index ?>" value="<?= htmlspecialchars($item['name']) ?>">
                                    <input type="hidden" name="price_<?= $index ?>" value="<?= htmlspecialchars($item['price']) ?>">
                                <?php endif; ?>
                                <label for="<?= $item['quantity_id'] ?>"></label>
                                <input type="number" name="<?= $item['quantity_id'] ?>" id="<?= $item['quantity_id'] ?>" value="0" readonly>
                                <button type="button" class="add-item" onclick="incrementQt('<?= $item['quantity_id'] ?>')">+</button>
                                <button type="button" class="subtract-item" onclick="decrementQt('<?= $item['quantity_id'] ?>')">-</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="total_items" value="<?= count($menuItems) ?>">
        <input type="hidden" name="total_quantity" id="total_quantity" value="0">
        <button type="submit" class="center-button">Pesan Makanan</button>
    </form>

    <script>
        function incrementQt(quantityId) {
            var quantityInput = document.getElementById(quantityId);
            var currentQuantity = parseInt(quantityInput.value);
            quantityInput.value = currentQuantity + 1;
            updateTotalQuantity();
        }

        function decrementQt(quantityId) {
            var quantityInput = document.getElementById(quantityId);
            var currentQuantity = parseInt(quantityInput.value);
            if (currentQuantity > 0) {
                quantityInput.value = currentQuantity - 1;
            }
            updateTotalQuantity();
        }

        function updateTotalQuantity() {
            var totalQuantityInput = document.getElementById('total_quantity');
            var total = 0;
            for (var i = 1; i <= <?= count($menuItems); ?>; i++) {
                var itemQuantity = parseInt(document.getElementById('quantity_' + i).value);
                total += itemQuantity;
            }
            totalQuantityInput.value = total;
        }
    </script>

</body>

</html>