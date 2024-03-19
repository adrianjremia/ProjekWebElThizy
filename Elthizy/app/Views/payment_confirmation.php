<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment Confirmation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #4caf50; /* Green color */
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }

        #menu-link {
            display: inline-block;
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

        #menu-link:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Payment Successful</h1>
    <p>Your payment has been processed successfully.</p>
    <a href="/menu" id="menu-link">KEMBALI</a>
</body>

</html>