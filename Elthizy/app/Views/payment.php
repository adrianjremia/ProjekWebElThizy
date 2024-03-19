<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment - Kantin Elthizy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .payment-form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Payment Details</h2>

    <div class="payment-form">
        <form method="post" action="<?= site_url('payment/recordPayment') ?>">

            <p>Total Amount to Pay: Rp <?= esc($totalAmount) ?></p>

            <input type="hidden" name="order_id" value="/* Your Order ID */">

            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="">Select Payment Method</option>
                <option value="gopay">Gopay</option>
                <option value="dana">Dana</option>
                <option value="bank_bca">Bank BCA</option>
                <option value="bank_mandiri">Bank Mandiri</option>
            </select>

            <input type="hidden" name="payment_status" value="pending">

            <button type="submit">Bayar Sekarang</button>
        </form>
    </div>
</body>
</html>