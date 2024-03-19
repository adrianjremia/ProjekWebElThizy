<!DOCTYPE html>
<html>

<head>
    <title>Admin - Transaction</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Arial", sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        select {
            padding: 5px;
            font-size: 14px;
        }

        button {
            padding: 8px 12px;
            font-size: 14px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <h3>Elthizy Food</h3>
        <a href="/admin" id="dashboard-link">DASHBOARD</a>
        <a href="/admin/transaction" id="transaction-link">TRANSACTION</a>
        <a href="/admin/customer_view" id="cust-link">CUSTOMER</a>
        <a href="/auth/logout" id="admin-logout-link">LOGOUT</a>
    </div>

    <h1>Transaction</h1>

    <table>
        <tr>
            <th>Payment ID</th>
            <th>Customer ID</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($payments as $payment) : ?>
            <tr>
                <td><?= $payment['payment_id']; ?></td>
                <td><?= $payment['id']; ?></td>
                <td><?= $payment['payment_total']; ?></td>
                <td><?= $payment['payment_status']; ?></td>
                <td>
                    <form action="<?= site_url('admin/transaction/updateStatus'); ?>" method="post">
                        <input type="hidden" name="payment_id" value="<?= $payment['payment_id']; ?>">
                        <select name="new_status">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>