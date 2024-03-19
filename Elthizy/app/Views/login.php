<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
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

        input {
            width: 100%;
            padding: 10px;
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
    <h1>Login</h1>

    <form action="/login" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= isset($_COOKIE["loginId"]) ? $_COOKIE["loginId"] : (old('email') ?? '') ?>" placeholder="Input your email">

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?php echo (isset($_COOKIE["loginPass"])) ? $_COOKIE["loginPass"] : old('password'); ?>" placeholder="Input your password">
        </div>

        <?php if (isset($validation) && is_object($validation) && method_exists($validation, 'listErrors')) : ?>
            <div class="error-message">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <input type="checkbox" name="save_id" id="save_id" <?php echo (isset($_COOKIE["loginId"])) ? "checked" : ""; ?>>
            <label for="save_id">Remember Me</label>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

        <div class="form-group">
            <p>Don't have an account? Register <a href="register">here</a></p>
        </div>
    </form>

</body>

</html>