<?php session_start(); if(!isset($_SESSION['patient_id'])) header("location:patient_login.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Patient Dashboard</title>

<style>
body { font-family: Arial; background:#f0fff4; margin:0; }
.header { background:#2ecc71; color:white; padding:18px; text-align:center; font-size:26px; }
.container { text-align:center; margin-top:40px; }
.btn {
    display:inline-block; background:#27ae60; color:white;
    padding:15px 20px; margin:10px; border-radius:8px;
    text-decoration:none; font-size:18px;
}
</style>

</head>
<body>

<div class="header">Patient Dashboard</div>

<div class="container">
    <a href="book_appointment.php" class="btn">Book Appointment</a>
    <a href="logout.php" class="btn">Logout</a>
</div>

</body>
</html>
