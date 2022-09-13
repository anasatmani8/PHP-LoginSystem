<?php 
if (isset($_POST['signup-submit'])){
include 'dbh.inc.php';
$name =  $_POST['name'];
$email =  $_POST['email'];
$password = $_POST['password'];		
$passwordRep = $_POST['passwordRep'];

if (empty($name) || empty($email)  || empty($password)  || empty($passwordRep)){
	header("Location: ../index.php?error=emptyfields&username=".$name."mail=".$email);
	exit();
}
elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$name)) {
	
	header("Location: ../index.php?error=invalidUsername&Email");
	exit();
	}
elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	
	header("Location: ../index.php?error=invalidEmail&mail=".$email);
	exit();

}
elseif (!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
	
	header("Location: ../index.php?error=invalidusername&mail=".$email);
	exit();
}
elseif ($password !== $passwordRep) {
	header("Location: ../index.php?error=passwordCheck=".$name."mail=".$email);
	exit();
}
else {
	$sql = "SELECT username from users where username=?";
	$stmt  =mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location: ../index.php?error=mysql_error()");
	exit();
	
}else {
                mysqli_stmt_bind_param($stmt,"s",$name);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0 ){
                    header("Location: ../index.php?error=AlreadyInUse(usertaken)&mail=".$email."");
                    exit();
                } else {
                    $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?);";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../index.php?error=sqlerror");
                        exit();
                    } else {
                        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sss", $name,$email,$hashedpwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../index.php?signup=succes");
                        $mssgSuccess = "Sign up Success";
                         exit();

                    }
                }
            }

}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}

	else{
		header("Location: ../index.php");
		exit();
}

?>