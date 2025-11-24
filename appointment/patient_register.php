<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Register Patient</title>

<style>
body {
    font-family: Arial;
    background: #f0fff4;
    margin: 0;
}
.header {
    background: #2ecc71;
    color: white;
    padding: 18px;
    text-align: center;
    font-size: 26px;
    font-weight: bold;
}
.form {
    width: 350px;
    margin: 40px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px #b2f2bb;
}
.form input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 2px solid #2ecc71;
    border-radius: 6px;
}
.form button {
    width: 100%;
    padding: 12px;
    background: #27ae60;
    color: white;
    font-size: 17px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}
</style>

</head>
<body>

<div class="header">Register as Patient</div>

<form method="post" class="form">
    <input type="text" name="name" placeholder="Patient Name" required>
    <input type="number" name="age" placeholder="Age" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="mobile" placeholder="Mobile Number" required>
    <input type="password" name="password" placeholder="Create Password" required>
    <button type="submit" name="submit">Register</button>
</form>

</body>
</html>

<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];

    mysqli_query($conn,
    "INSERT INTO patients(name, age, email, mobile, password)
     VALUES('$name','$age','$email','$mobile','$password')");
    
    echo "<script>alert('Registered Successfully!');window.location='patient_login.php';</script>";
}
?>
