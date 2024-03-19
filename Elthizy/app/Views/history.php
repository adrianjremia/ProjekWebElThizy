<!DOCTYPE html>
<html lang="en">

<head>
    <title>Riwayat Order - Kantin Elthizy</title>
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
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
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

    <h1>Riwayat Order</h1>

    <?php if (!empty($orderDetails)) : ?>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Makanan ID</th>
                    <th>Order Date</th>
                    <th>Order Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderDetails as $order) : ?>
                    <tr>
                        <td><?= $order['order_id'] ?></td>
                        <td><?= $order['makanan_id'] ?></td>
                        <td><?= $order['order_date'] ?></td>
                        <td><?= $order['order_quantity'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p>Total Orders: <?= count($orderDetails) ?></p>

    <?php else : ?>
        <p>No orders found</p>
    <?php endif; ?>

</body>

</html>