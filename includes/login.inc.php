<?php
if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';

    $email = $_POST['email']; 
    $password = $_POST['password'] ;

    if (empty($email) || empty($password)) {
        header("Location: ../index.php?error=emptyFields");
        exit();
    }

    else {
        $sql = "select * from users where username =? or email=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlError");
        exit();
        }
        else{ 

            mysqli_stmt_bind_param($stmt, "ss",$email, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
             
            if ($row = mysqli_fetch_assoc($result)) {
                $passwordCheck = password_verify($password, $row['password']);
                if ($passwordCheck == false){
                    header("Location: ../index.php?error=wrongPassword");
                    exit();
                }
                else if ($passwordCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userUsername'] = $row['username'];
                    header("Location: ../logg.php?message=success&username=".$row['username']);
                    exit();
                }
                else {
                    header("Location: ../index.php?error=wrongPassword");
                    exit();

                }
            }else {
                header("Location: ../index.php?error=noUser");
                exit();
            }
        }
    }

}
	else{
		header("Location: ../index.php");
		exit();
}

?>

