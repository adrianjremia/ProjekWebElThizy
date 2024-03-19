<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Process - Kantin Elthizy</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
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

        .payment-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .payment-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Order Process</h1>

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
        <a href="<?= site_url('payment') ?>" class="payment-button">Bayar Pesanan</a>
    <?php else : ?>
        <p>No orders found</p>
    <?php endif; ?>

</body>

</html>