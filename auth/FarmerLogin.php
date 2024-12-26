<?php
include("../Includes/db.php");
include("../Functions/functions.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Farmer Login Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-image : url(../Images/farmergif.gif);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .container {
            background: #ffffff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            text-align: center;
            animation: slideIn 1s ease-out;
        }

        .container h1 {
            font-family: 'Pacifico', cursive;
            margin-bottom: 20px;
            color: #4a90e2;
        }

        .form-control {
            background: #f0f2f5;
            border: 1px solid #ccc;
            color: #333;
            margin-bottom: 20px;
            border-radius: 30px;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4a90e2;
            background: #ffffff;
        }

        .btn {
            background: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #357ab7;
        }

        .links a {
            color: #4a90e2;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: #357ab7;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Farmer Login</h1>
        <form action="FarmerLogin.php" method="post">
            <div class="form-group">
                <input type="text" id="phone_number" class="form-control" name="phonenumber" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <input type="password" id="p1" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn" name="login" value="Login">Login</button>
            <div class="links mt-4">
                <a href="FarmerForgotPassword.php">Forgot your password?</a><br>
                <a href="FarmerRegister.php">Create New Account</a>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['login'])) {
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '2345678910111211';
    $encryption_key = "DE";
    $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);

    $query = "SELECT * FROM farmerregistration WHERE farmer_phone = '$phonenumber' AND farmer_password = '$encryption'";
    $run_query = mysqli_query($con, $query);
    $count_rows = mysqli_num_rows($run_query);
    if ($count_rows == 0) {
        echo "<script>alert('Please Enter Valid Details');</script>";
        echo "<script>window.open('FarmerLogin.php','_self')</script>";
    } else {
        while ($row = mysqli_fetch_array($run_query)) {
            $id = $row['farmer_id'];
        }
        $_SESSION['phonenumber'] = $phonenumber;
        echo "<script>window.open('../FarmerPortal/farmerHomepage.php','_self')</script>";
    }
}
?>
