<?php
include("../Functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <a href="https://icons8.com/icon/83325/roman-soldier"></a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
</head>
<style>
    /* your styles here */
</style>

<body>

<nav class="navbar navbar-expand-xl ">
    <!-- your navbar code here -->
</nav>

<div class="text-center container">
    <br>
    <b>
        <h1 class="guard text-center" style="  font-family: 'Times New Roman', Times, serif;"><span><b>Farmers</b></span>
        </h1>
    </b>
</div>

<div class="container mt-5">
    <div class="row">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "impulse101");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT farmer_name, farmer_phone, farmer_state, farmer_district FROM farmerregistration";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 ">
                    <div class="card border-dark border">
                        <div class="card-body ">
                            <h5 class="card-title text-center"><img src="iconbig3.png" style=" margin-bottom:  10px;"></h5>
                            <h4 class="card-subtitle mb-2  text-center"><?= $row['farmer_name'] ?></h4>
                            <p class="card-text text-center"><?= $row['farmer_district'] ?>, <?= $row['farmer_state'] ?><br><br>
                                <button type="button" class="btn  border-dark border" style="background-color:#FFD700;color:black">View Profile </button>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No farmers found";
        }

        mysqli_close($conn);
        ?>
    </div>
</div>

<!-- your footer code here -->

</body>
</html>