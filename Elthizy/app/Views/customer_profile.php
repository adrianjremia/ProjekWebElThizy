<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
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
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .edit-button {
            background-color: #3498db;
            display: inline-block;
            padding: 8px;
            text-decoration: none;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
        }

        .edit-button:hover {
            background-color: #2980b9;
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

    <h1>Profile</h1>

    <?php if (!empty($customer)) : ?>
        <table>
            <tr>
                <th>ID Customer</th>
                <td><?= $customer['id']; ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?= $customer['name']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= $customer['address']; ?></td>
            </tr>
            <tr>
                <th>Nomor Telp / No. HP</th>
                <td><?= $customer['phone_number']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $customer['email']; ?></td>
            </tr>
        </table>

        <div class="action-buttons">
            <a href="/edit_profile/<?= $customer['id']; ?>" class="edit-button">Edit Profile</a>
        </div>

    <?php else : ?>
        <p>Customer not found.</p>
    <?php endif; ?>

</body>

</html>