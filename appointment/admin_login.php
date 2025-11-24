<?php include "db.php"; session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<style>
body { 
    font-family:Segoe UI; 
    background:#fff3cd; 
    margin:0; 
}
.header { 
    background:#ff9800; 
    color:white; 
    padding:18px; 
    text-align:center; 
    font-size:28px; 
}
.form {
    width:350px; 
    margin:40px auto; 
    background:white; 
    padding:25px;
    border-radius:10px; 
    box-shadow:0 0 10px #ffcc80;
}
.form input {
    width:100%; 
    padding:12px; 
    margin:10px 0;
    border:2px solid #ff9800; 
    border-radius:6px;
}
.form button {
    width:100%; 
    padding:12px; 
    background:#ef6c00;
    color:white; 
    border:none; 
    border-radius:6px;
}
</style>

</head>
<body>

<div class="header">Admin Login</div>

<form method="post" class="form">
    <input type="email" name="email" placeholder="Admin Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>

</body>
</html>

<?php
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $res=mysqli_query($conn,"SELECT * FROM admin WHERE email='$email' AND password='$password'");

    if(mysqli_num_rows($res)){
        $_SESSION['admin']=1;
        header("location:admin_dashboard.php");
    } else {
        echo "<script>alert('Invalid Admin Login');</script>";
    }
}
?>
