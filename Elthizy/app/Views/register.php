<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 30px;
            background-color: #4CAF50;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #fff;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            /* Add margin to match other form fields */
            border: 1px solid #fff;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
        }

        button {
            background-color: #45a049;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #398033;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <h1>Register</h1>

    <form action="/register" method="post">
        <div class="form-group">
            <label for="name">Nama</label> <br>
            <input type="text" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="address">Alamat</label> <br>
            <textarea name="address" id="address"></textarea>
        </div>

        <div class="form-group">
            <label for="phone_number">Nomor Telp / No. HP</label><br>
            <input type="text" id="phone_number" name="phone_number">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="password_confirm">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm">
        </div>

        <div class="form-group">
            <label for="level">Level</label>
            <select name="level" id="level">
                <option value="1">User</option>
                <option value="2">Admin</option>
            </select>
        </div>

        <?php if (isset($validation)) : ?>
            <div class="error-message">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

        <div class="form-group">
            <p>Already have an account? Click <a href="login">here</a> to login</p>
        </div>
    </form>

</body>

</html>