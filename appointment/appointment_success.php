<?php 
session_start();
if(!isset($_SESSION['patient_id'])){
    header("location:patient_login.php");
    exit;
}

$date = $_GET['date'] ?? '';
$time = $_GET['time'] ?? '';
$doctor = $_GET['doctor'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
<title>Appointment Booked</title>

<style>
body {
    font-family: 'Segoe UI', Arial;
    background: linear-gradient(to right, #d4fc79, #96e6a1);
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.box {
    background: white;
    width: 400px;
    text-align: center;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0px 6px 25px rgba(0,0,0,0.18);
}

h2 {
    color: #27ae60;
    margin-bottom: 15px;
}

.details {
    background: #ecf9ec;
    padding: 15px;
    border-left: 5px solid #27ae60;
    border-radius: 10px;
    margin-bottom: 25px;
    font-size: 17px;
}

.btn {
    display: block;
    padding: 12px;
    background: #27ae60;
    color: white;
    text-decoration: none;
    border-radius: 10px;
    margin-top: 10px;
    transition: 0.3s;
}

.btn:hover {
    background: #1f8f50;
    transform: scale(1.03);
}
</style>

</head>
<body>

<div class="box">
    <h2>🎉 Appointment Booked Successfully!</h2>

    <div class="details">
        <b>Date:</b> <?php echo $date; ?><br>
        <b>Time:</b> <?php echo $time; ?><br>
        <b>Doctor:</b> <?php echo $doctor; ?>
    </div>

    <a href="patient_dashboard.php" class="btn">Go to Dashboard</a>
    <a href="book_appointment.php" class="btn" style="background:#0984e3;">Book Another Appointment</a>
</div>

</body>
</html>
