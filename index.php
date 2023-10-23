<?php
include("dbin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="log.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        @media only screen and (max-width: 768px) {
            .gambar>img {
               display: none;
            }

            .login {
                height: 400px;
                width: 350px;
            }

            .wcm {
                color: black;
                font-size: 20px;
                margin-left: 30px;
                margin-top: 10px;
            }

            .form{
                margin-top: 10;
                margin-left: 20px;
            }

            input[type=text], input[type=password]{
                width: 300px;
                height: 30px;
            }

            input[type=submit]{
                margin-left: 15px;
                margin-top: 35px;
            }
        }
    </style>
</head>

<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="container">
            <div class="wrap">
                <div class="login">
                    <div class="gambar">
                        <img src="./image/illus-1.png" />
                    </div>
                    <div class="wcm">
                        <h1 style="margin-top: 10px">Sign Up</h1>
                    </div>
                    <div class="form">
                        <p><?php ?></p>
                        <p>Username :</p>
                        <input type="text" name="username" placeholder="Your name"><br>
                        <br>
                        <p>Password :</p>
                        <input type="password" name="password"><br>
                        <div class="sign-up">
                            <a href="#">
                                <h5>Already have an account?</h5>
                            </a></a>
                        </div>
                        <input type="submit" name="submit"><br>
                        <?php  ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password");
    $hash = password_hash($password, PASSWORD_DEFAULT);

    if (empty($username)) {
        echo "enter username";
    } else if (empty($password)) {
        echo "enter password";
    } else {
        $checkQuery = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            echo "Username is already taken";
        } else {
            // Insert the new user into the database
            $sql = "INSERT INTO user (username, password) VALUES ('$username', '$hash')";
            try {
                mysqli_query($conn, $sql);
                echo "You are now registered";
                header("location: home.php");
                exit;
            } catch (mysqli_sql_exception) {
                echo "An error occurred while registering";
            }
        }
    }
}
mysqli_close($conn);
?>