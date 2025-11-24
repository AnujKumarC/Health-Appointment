<?php 
include "db.php"; 
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Appointment</title>

<style>
body {
    font-family: 'Segoe UI', Arial;
    background: linear-gradient(to right, #d4fc79, #96e6a1);
    margin: 0;
    min-height: 100vh;
}

.header {
    background: #2ecc71;
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
}

.form-container {
    width: 380px;
    background: white;
    padding: 30px;
    margin: 40px auto;
    border-radius: 15px;
    box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.18);
}

.form-container input,
.form-container select {
    width: 100%;
    padding: 13px;
    margin: 12px 0;
    border: 2px solid #2ecc71;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
}

.form-container input:focus,
.form-container select:focus {
    border-color: #27ae60;
}

.form-container button {
    width: 100%;
    padding: 13px;
    background: #27ae60;
    color: white;
    border: none;
    font-size: 18px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 5px;
}

.form-container button:hover {
    background: #1f8f50;
    transform: scale(1.03);
}

.back-btn {
    display: block;
    width: 90%;
    padding: 12px;
    text-align: center;
    background: #0984e3;
    color: white;
    border-radius: 8px;
    text-decoration: none;
    font-size: 17px;
    margin: 20px auto 0;
    transition: 0.3s;
}

.back-btn:hover {
    background: #0a63ad;
    transform: scale(1.03);
}
</style>

</head>
<body>

<div class="header">Book Appointment</div>

<?php  
if(!isset($_SESSION['patient_id'])) {
    echo "
    <div class='form-container' style='text-align:center;'>
        <h3 style='color:#e74c3c;'>You must register/login before booking an appointment.</h3>
        <a href='patient_register.php' class='back-btn' style='background:#27ae60;'>Register as Patient</a>
        <a href='patient_login.php' class='back-btn'>Patient Login</a>
        <a href='index.php' class='back-btn' style='background:#636e72;'>Back to Home</a>
    </div>
    ";
    exit(); 
}
?>

<div class="form-container">

<form method="post">

    <label><b>Select Date</b></label>
    <input type="date" name="date" required>

    <label><b>Select Time</b></label>
    <input type="time" name="time" required>

   <label><b>Select Speciality</b></label>
<select name="speciality" required>
    <option value="">Select Speciality</option>

    <?php
    $spec_query = mysqli_query($conn, "SELECT DISTINCT speciality FROM doctors ORDER BY speciality ASC");

    while($spec = mysqli_fetch_assoc($spec_query)){
        echo "<option value='".$spec['speciality']."'>".$spec['speciality']."</option>";
    }
    ?>
</select>


    <label><b>Select Doctor</b></label>
    <select name="doctor" required>
        <option value="">Select Doctor</option>

        <?php
        $res = mysqli_query($conn, "SELECT * FROM doctors");
        while($d = mysqli_fetch_assoc($res)){
            echo "<option value='".$d['id']."'>".$d['name']." (".$d['speciality'].")</option>";
        }
        ?>

    </select>

    <button type="submit" name="book">Book Appointment</button>
</form>

<a href="patient_dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>

<?php
if(isset($_POST['book'])){
    $pid = $_SESSION['patient_id'];
    $did = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    mysqli_query($conn, 
        "INSERT INTO appointments(patient_id, doctor_id, date, time)
         VALUES('$pid', '$did', '$date', '$time')"
    );

    $doctorName = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT name FROM doctors WHERE id='$did'")
    )['name'];

    header("Location: appointment_success.php?date=$date&time=$time&doctor=$doctorName");
    exit;
}
?>
