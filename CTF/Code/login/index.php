<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="style.css">

    <title>Login</title>
</head>

<body>

    <?php

    include '../database.php';
    session_start();
    
    if (isset($_POST['mail'])) {
        $email = $_POST['mail'];
        $password = $_POST['password'];

        $select_user_query = "SELECT * FROM user_details WHERE mail= '$email' AND password= '$password';";
        $select_user_result = mysqli_query($connection, $select_user_query);

        if ($row = mysqli_fetch_assoc($select_user_result)) {
            $db_id = $row['id'];
            $db_role = $row['role'];

            $_SESSION['IsLogin'] = "Yes";
            if ($db_role == 'admin') {
                $_SESSION['mail']=$row['mail'];
                header('location: ./LoginCheck.php');
                
            } else {
                header('location: ../');
                $_SESSION['userid'] = $db_id;
            }
        } else {
            header('location: ./');
        }

        
    }

    ?>

    <div class="container">
        <!-- Developed by ******* jony@umbrella.com ********* -->
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="./index.php" method="post">
                    <div class="input-field">
                        <input type="text" name="mail" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="SignIn" value="Login Now">
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>