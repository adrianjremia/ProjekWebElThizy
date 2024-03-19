<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kantin Elthizy</title>
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

        .main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            width: 100%;
            background-color: #4CAF50;
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

        .welcome {
            text-align: center;
            margin-top: 90px;
            font-size: 35px;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            color: black;
        }

        .welcome h1 {
            margin-bottom: 25px;
        }

        span {
            font-size: 21px;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
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

    <div class="main">
        <div class="welcome">
            <h1>Welcome, Admin!</h1>
            <p>This is the admin panel for Elthizy Food.</p>
        </div>

        <div class="admin-content">
            <p>Manage users, transactions, and other admin tasks here.</p>
        </div>
    </div>
</body>

</html>