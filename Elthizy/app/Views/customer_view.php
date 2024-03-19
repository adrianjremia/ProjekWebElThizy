<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer View</title>
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
            animation: animate 17s ease-in-out infinite;
            background-size: cover;
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

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
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

        p {
            text-align: center;
            font-style: italic;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .edit-button,
        .delete-button {
            padding: 8px;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .edit-button {
            background-color: #3498db;
        }

        .edit-button:hover {
            background-color: #2980b9;
        }


        .delete-button {
            background-color: #ff3333;
        }

        .delete-button:hover {
            background-color: #cc0000;
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

    <h1>Customer</h1>

    <?php if (!empty($customers)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID Customer</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomor Telp / No. HP</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer) : ?>
                    <tr>
                        <td><?= $customer['id']; ?></td>
                        <td><?= $customer['name']; ?></td>
                        <td><?= $customer['address']; ?></td>
                        <td><?= $customer['phone_number']; ?></td>
                        <td><?= $customer['email']; ?></td>
                        <td class="action-buttons">
                            <a href="/admin/edit_customer/<?= $customer['id']; ?>" class="edit-button">Edit</a>
                            <a href="/deleteCustomer/<?= $customer['id']; ?>" class="delete-button">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No customer data found.</p>
    <?php endif; ?>

</body>

</html>