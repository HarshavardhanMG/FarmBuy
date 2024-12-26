<!-- BuyerRegistration.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buyer Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #4a90e2;
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
            max-width: 600px;
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
        <h1>Buyer Registration</h1>
        <form name="my-form" action="BuyerRegistration.php" method="post">
            <div class="form-group">
                <input type="text" id="full_name" class="form-control" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <input type="text" id="phone_number" class="form-control" name="phonenumber" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <input type="email" id="email_address" class="form-control" name="mail" placeholder="E-Mail Address" required>
            </div>
            <div class="form-group">
                <textarea id="present_address" class="form-control" rows="4" name="address" placeholder="Present Address" required></textarea>
            </div>
            <div class="form-group">
                <input type="text" id="company_name" class="form-control" name="company_name" placeholder="Company Name" required>
            </div>
            <div class="form-group">
                <input type="text" id="license" class="form-control" name="license" placeholder="License" required>
            </div>
            <div class="form-group">
                <input type="text" id="account1" class="form-control" name="account" placeholder="Bank Account No." required>
            </div>
            <div class="form-group">
                <input type="text" id="account2" class="form-control" name="pan" placeholder="PAN No." required>
            </div>
            <div class="form-group">
                <input type="text" id="user_name" class="form-control" name="username" placeholder="User Name" required>
            </div>
            <div class="form-group">
                <input id="p1" class="form-control" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input id="p2" class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn" name="register" value="Register">Register</button>
        </form>
    </div>
</body>

</html>

<?php
include("../Includes/db.php");

if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $license = mysqli_real_escape_string($con, $_POST['license']);
    $account = mysqli_real_escape_string($con, $_POST['account']);
    $pan = mysqli_real_escape_string($con, $_POST['pan']);
    $mail = mysqli_real_escape_string($con, $_POST['mail']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '2345678910111211';
    $encryption_key = "DE";
    $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);

    if (strcmp($password, $confirmpassword) == 0) {
        $query = "INSERT INTO buyerregistration (buyer_name, buyer_phone, buyer_addr, buyer_comp, buyer_license, buyer_bank, buyer_pan, buyer_mail, buyer_username, buyer_password) 
                  VALUES ('$name', '$phonenumber', '$address', '$company_name', '$license', '$account', '$pan', '$mail', '$username', '$encryption')";

        $run_register_query = mysqli_query($con, $query);
        echo "<script>alert('Successfully Registered');</script>";
        echo "<script>window.open('BuyerLogin.php','_self')</script>";
    } else {
        echo "<script>alert('Password and Confirm Password should be the same');</script>";
    }
}
?>