<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile</title>
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

    <h1>Edit Profile</h1>

    <form action="/updateProfile/<?= $customer['id'] ?>" method="post">
        <input type="hidden" name="id" value="<?= $customer['id'] ?>">

        <div class="form-group">
            <label for="name">Nama</label> <br>
            <input type="text" id="name" name="name" value="<?= $customer['name'] ?>">
        </div>

        <div class="form-group">
            <label for="address">Alamat</label> <br>
            <textarea name="address" id="address"><?= $customer['address'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="phone_number">Nomor Telp / No. HP</label><br>
            <input type="text" id="phone_number" name="phone_number" value="<?= $customer['phone_number'] ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $customer['email'] ?>">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Data</button>
        </div>
    </form>

</body>

</html>