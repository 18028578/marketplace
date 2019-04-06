<?php
if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    //Information from sign up form
    $username = $_POST['Username'];
    $name = $_POST['FirstName'];
    $surname = $_POST['LastName'];
    $email = $_POST['InputEmail'];
    $password = $_POST['InputPassword'];
    $passwordRepeat = $_POST['RepeatPassword'];

    //Empty form checker
    if (empty($username) || empty($name) || empty($surname) || empty($email) || empty($password)
    || empty($passwordRepeat)) {
        header("Location: ../register.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        exit();
    //Email validity checker
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invalidmeil&uid");
        exit();
    //Used email checker
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmeil&uid=" . $username);
        exit();
    //Username validity checker
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register.php?error=invaliduids&meil=" . $email);
        exit();
    //Check if password is the same as repeat password
    } else if ($password !== $passwordRepeat) {
        header("Location: ../register.php?error=passwordcheck&uid=" . $username . "&mail=" . $email);
        exit();

    } else {
        $sql = "SELECT * FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        //Failed SQl query execution
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
        //Insertion of user details to database
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            //Exit if mail is used already
            if ($resultCheck > 0) {
                header("Location: ../register.php?error=usertaken&mail=" . $email);
                exit();
            //Insert and hash password to database
            } else {
                $sql = "INSERT INTO users (uidUsers, userName, userSurname, emailUsers, pwdUsers) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssss", $username, $name, $surname, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../register.php?signup=success");
                    exit();
                }
            }
        }
    }
    //closing statement connection to database
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
// return back to register.php
} else {
    header("Location: ../register.php");
    exit();
}
?>
