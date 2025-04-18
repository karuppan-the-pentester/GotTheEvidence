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
    $mail = $_SESSION['mail'];

    if($mail == NULL){
        header('location: ./');
    }
    if (isset($_POST['key'])) {
        
        $password = $_POST['key'];

        $select_user_query = "SELECT * FROM `user_details` WHERE mail='$mail' and secret_key='$password'; ";
        echo "$select_user_query";
        $select_user_result = mysqli_query($connection, $select_user_query);

        if ($row = mysqli_fetch_assoc($select_user_result)) {
            $db_id = $row['id'];
            $db_role = $row['role'];
            $db_name = $row['name'];

            
            $_SESSION['IsLogin'] = "Yes";
            if ($db_role == 'admin') {
                $_SESSION['userid'] = $db_id;
                header('location: ../admin/');
                
            } else {
                header('location: ../');
            }
        } else {
            header('location: ./LoginCheck.php');
        }

        
    }

    ?>

    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Admin Check</span>

                <form action="./LoginCheck.php" method="post">
                    <div class="input-field">
                        <input type="password" name="key" class="password" placeholder="Enter your Secret Key" required>
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