<!DOCTYPE html>
<html>
<head>
<title>Online Appointment Booking System</title>

<style>
body {
    font-family: Arial;
    background: #eef2f3;
    margin: 0;
    height: 100vh;
    overflow: hidden; 
    display: flex;
    flex-direction: column;
}

.header {
    background: #0077b6;
    color: white;
    text-align: center;
    padding: 20px;
    font-size: 28px;
    font-weight: bold;
}

.container {
    flex: 1; 
    display: flex;
    flex-direction: column;
    justify-content: center; 
    align-items: center; 
}

.btn {
    display: inline-block;
    background: #0096c7;
    padding: 15px;
    color: white;
    width: 250px;
    margin: 10px;
    text-decoration: none;
    border-radius: 6px;
    font-size: 18px;
}

.btn:hover {
    background: #0077b6;
}

footer {
    background: #023e8a;
    color: white;
    text-align: center;
    padding: 12px;
    font-size: 16px;
}
</style>

</head>

<body>

<div class="header">Online Appointment Booking System</div>

<div class="container">
    <a href="admin_login.php" class="btn">Admin Dashboard</a>
    <a href="patient_register.php" class="btn">Register as Patient</a>
    <a href="patient_login.php" class="btn">Patient Login</a>
    <a href="book_appointment.php" class="btn">Book Appointment</a>
</div>

<footer>
    <p>Address: 123 ABC Street, Your City</p>
    <p>Phone: +91 9876543210 | Email: support@hospital.com</p>
</footer>

</body>
</html>
