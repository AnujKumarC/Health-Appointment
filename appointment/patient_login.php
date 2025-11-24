<?php include "db.php"; session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Patient Login</title>

<style>
body {
    font-family: 'Segoe UI', Arial;
    background: linear-gradient(to right, #d4fc79, #96e6a1);
    margin: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.header {
    position: absolute;
    top: 0;
    width: 100%;
    background: #2ecc71;
    color: white;
    text-align: center;
    padding: 18px;
    font-size: 28px;
    font-weight: bold;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
}

.form-container {
    width: 350px;
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0px 5px 20px rgba(0,0,0,0.15);
    text-align: center;
    margin-top: 60px;
}

.form-container input {
    width: 100%;
    padding: 12px;
    margin: 12px 0;
    border: 2px solid #2ecc71;
    border-radius: 8px;
    font-size: 16px;
}

.form-container button {
    width: 100%;
    padding: 12px;
    background: #27ae60;
    color: white;
    font-size: 18px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    margin-top: 10px;
    transition: 0.3s;
}

.form-container button:hover {
    background: #1f8f50;
    transform: scale(1.03);
}

.back-link {
    margin-top: 15px;
    display: block;
    color: #0984e3;
    text-decoration: none;
    font-size: 15px;
}
.back-link:hover {
    text-decoration: underline;
}
</style>

</head>
<body>

<div class="header">Patient Login</div>

<div class="form-container">
    <form method="post">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <a href="patient_register.php" class="back-link">New Patient? Register Here</a>
    <a href="index.php" class="back-link">Back to Home</a>
</div>

</body>
</html>

<?php
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $result=mysqli_query($conn,"SELECT * FROM patients WHERE email='$email' AND password='$password'");
    $row=mysqli_fetch_assoc($result);

    if($row){
        $_SESSION['patient_id']=$row['id'];
        header("location:patient_dashboard.php");
    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>
