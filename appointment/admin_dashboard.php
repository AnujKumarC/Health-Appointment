<?php session_start(); if(!isset($_SESSION['admin'])) header("location:admin_login.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

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
    font-size:28px; }
.container { 
    text-align:center; 
    margin-top:40px; 
}
.btn {
    display:inline-block; 
    background:#ef6c00; 
    color:white;
    padding:15px; 
    width:250px; 
    margin:10px;
    border-radius:8px; 
    text-decoration:none;
    font-size:18px;
}
</style>

</head>
<body>

<div class="header">Admin Dashboard</div>

<div class="container">
    <a href="add_doctor.php" class="btn">Add Doctor</a>
    <a href="manage_patients.php" class="btn">Manage Patients</a>
    <a href="manage_appointments.php" class="btn">View Appointments</a>
    <a href="logout.php" class="btn">Logout</a>
</div>

</body>
</html>
