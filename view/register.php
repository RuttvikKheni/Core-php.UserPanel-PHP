<?php
include_once './../config/db.config.php';

include_once './../middlewares/Session_index.php';


$username = "";
$usermail = "";
$userpassword = "";
$usercpassword = "";

$usermail = "";
$userpassword = "";

$e_username = false;
$e_usermail = false;
$e_userpassword = false;
$e_usercpassword = false;

$errorStatus = false;
$errorMeggage = "";


if (isset($_POST['submit'])) {



    $username = $_POST['username'];
    $usermail = $_POST['usermail'];
    $userpassword = $_POST['userpassword'];
    $usercpassword = $_POST['usercpassword'];
    $flag = true;

    if ($username === "") {
        $e_username = true;
        $flag = false;
    }


    if ($usermail === "") {
        $e_usermail = true;
        $flag = false;
    }

    if ($userpassword === "") {
        $e_userpassword = true;
        $flag = false;
    }
    if ($usercpassword === "") {
        $e_usercpassword = true;
        $flag = false;
    }

    if ($userpassword !== $usercpassword) {
        $e_usercpassword = "Password Not Match...!";
        $flag = false;
    }


    if ($flag) {
        $hashPassword = password_hash($userpassword, PASSWORD_BCRYPT);

        if ($_FILES['avtar']['error'] == '0') {

            if (@is_array(getimagesize($_FILES["avtar"]["tmp_name"]))) {

                $newFileName  = date('hisA') . "_" . $_FILES['avtar']['size'] . "_" . $_FILES['avtar']["name"];
                $tmpName = $_FILES['avtar']['tmp_name'];



                $userImage = "http://localhost/Rutvik/Core-php/UserPanel-PHP/public/defult_images/" . $newFileName;

                $query = "INSERT INTO user_login(username, usermail, userpassword,userimg) VALUES ('$username','$usermail','$hashPassword','$userImage')";
                // echo $query . "_with Img";
                if ($con->exec($query)) {
                    $_SESSION['login'] = true;
                    $_SESSION['userimg'] = $userImage;
                    $_SESSION['usermail'] = $usermail;
                    $_SESSION['username'] = $username;
                    move_uploaded_file($tmpName, "./../public/user_image/" . $newFileName);
                    header('Location: index.php');
                } else {
                    $errorStatus = true;
                    $errorMeggage = "!...SomeThing Wrong";
                }
            } else {
                $errorStatus = true;
                $errorMeggage = "!...It's Not Image";
            }
        } else {
            $query = "INSERT INTO user_login(username, usermail, userpassword) VALUES ('$username','$usermail','$hashPassword')";
            // echo $query . '_no img';
            if ($con->exec($query)) {
                $_SESSION['login'] = true;
                $_SESSION['userimg'] = 'http://localhost/Rutvik/Core-php/UserPanel-PHP/public/defult_images/avtar.png';
                $_SESSION['usermail'] = $usermail;
                $_SESSION['username'] = $username;
                header('Location: index.php');
            } else {
                $errorStatus = true;
                $errorMeggage = "!...SomeThing Wrong";
            }
        }
    } else {
        $errorStatus = true;
        $errorMeggage = "!...All Field Required";
    }
}


?>


<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Page | Prime Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="register-page" style="min-height: 586.391px;">
    <div class="register-box">
        <div class="register-logo">
            <a href="./index2.html"><b>Sign</b>Up</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form method="post" enctype="multipart/form-data">

                    <div class="input-group mb-3">
                        <label class="mx-auto" for="file-input">
                            <img id="imagePreview" src="./../public/defult_images/avtar.png" style="border-radius:50%;max-height:100px;cursor: pointer;" alt="User Avtar" width="90"><br>
                        </label>

                        <input id="file-input" type="file" name="avtar" class=" d-none" onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <?php
                    if ($errorStatus) {
                        echo "<div class='alert alert-warning' role='alert'>'$errorMeggage'</div>";
                    }
                    ?>
                    <div class="input-group mb-3">
                        <input type="text" name="username" value="<?= $username ?>" class="form-control" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span><?= $e_username ? ' | <i style="color:red;" class="fa fa-info-circle" aria-hidden="true"></i>' : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="usermail" value="<?= $usermail ?>" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span><?= $e_usermail ? ' | <i style="color:red;" class="fa fa-info-circle" aria-hidden="true"></i>' : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="userpassword" value="<?= $userpassword ?>" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span><?= $e_userpassword ? ' | <i style="color:red;" class="fa fa-info-circle" aria-hidden="true"></i>' : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="usercpassword" value="<?= $usercpassword ?>" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span><?= $e_usercpassword ? ' | <i style="color:red;" class="fa fa-info-circle" aria-hidden="true"></i>' : '' ?>
                            </div>
                        </div>
                    </div>
                    <small class="top-0 start-0" style="color: red;"><?= $e_usercpassword ?></small>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>

                <a href="login.php" class="text-center">I already have a membership</a>
            </div>
        </div>
    </div>

    <script src="./plugins/jquery/jquery.min.js"></script>
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./dist/js/adminlte.min.js"></script>


</body>
<script>
    setTimeout(() => {
        $('.alert-warning').addClass('d-none');
    }, 3000);
</script>

</html>