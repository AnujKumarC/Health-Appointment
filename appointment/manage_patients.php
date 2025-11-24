<?php 
include "db.php"; 
session_start(); 
if(!isset($_SESSION['admin'])){
    header("location:admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Patients</title>

<style>
body {
    font-family: 'Segoe UI', Arial;
    background: #fff3cd;
    margin: 0;
}

.header {
    background: #ff9800;
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 28px;
    font-weight: bold;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
}

.container {
    width: 90%;
    max-width: 900px;
    background: white;
    margin: 40px auto;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0px 6px 20px rgba(0,0,0,0.15);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

table th {
    background: #ef6c00;
    color: white;
    padding: 12px;
    font-size: 18px;
}

table td {
    padding: 12px;
    font-size: 16px;
    border-bottom: 1px solid #ddd;
}

table tr:hover {
    background: #fff7e0;
}

.btn-back {
    display: inline-block;
    padding: 12px 18px;
    background: #ef6c00;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    margin-top: 20px;
    font-size: 17px;
    transition: 0.3s;
}

.btn-back:hover {
    background: #c85a00;
    transform: scale(1.03);
}
</style>

</head>
<body>

<div class="header">Manage Patients</div>

<div class="container">

<table>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Mobile</th>
    </tr>

    <?php
    $res = mysqli_query($conn, "SELECT * FROM patients ORDER BY id DESC");

    if(mysqli_num_rows($res) > 0){
        while($p = mysqli_fetch_assoc($res)){
            echo "
            <tr>
                <td>".$p['name']."</td>
                <td>".$p['age']."</td>
                <td>".$p['email']."</td>
                <td>".$p['mobile']."</td>
            </tr>
            ";
        }
    } else {
        echo "
        <tr>
            <td colspan='4' style='text-align:center; padding:20px; font-size:18px; color:#555;'>
                No patients found.
            </td>
        </tr>";
    }
    ?>
</table>

<a href="admin_dashboard.php" class="btn-back">⬅ Back to Dashboard</a>

</div>

</body>
</html>
