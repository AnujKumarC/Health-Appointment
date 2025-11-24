<?php 
include "db.php"; 
session_start(); 

if(!isset($_SESSION['admin'])){
    header("location:admin_login.php");
    exit;
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM appointments WHERE doctor_id='$delete_id'");

    mysqli_query($conn, "DELETE FROM doctors WHERE id='$delete_id'");

    header("Location: add_doctor.php");
    exit;
}

$edit_mode = false;
$edit_id = "";
$edit_name = "";
$edit_speciality = "";

if(isset($_GET['edit'])){
    $edit_mode = true;
    $edit_id = $_GET['edit'];

    $doctor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM doctors WHERE id='$edit_id'"));
    $edit_name = $doctor['name'];
    $edit_speciality = $doctor['speciality'];
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $spec = $_POST['speciality'];

    mysqli_query($conn, "UPDATE doctors SET name='$name', speciality='$spec' WHERE id='$id'");
    header("Location: add_doctor.php");
    exit;
}

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $spec = $_POST['speciality'];

    mysqli_query($conn, "INSERT INTO doctors(name, speciality) VALUES('$name','$spec')");
    header("Location: add_doctor.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Doctors</title>

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
    font-size: 28px;
    text-align: center;
    font-weight: bold;
    box-shadow: 0px 3px 10px rgba(0,0,0,0.2);
}

.container {
    width: 90%;
    max-width: 900px;
    background: white;
    margin: 30px auto;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0px 6px 20px rgba(0,0,0,0.15);
}

.form-container {
    margin-bottom: 30px;
}

input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 2px solid #ff9800;
    border-radius: 8px;
    font-size: 16px;
}

button {
    width: 100%;
    padding: 12px;
    background: #ef6c00;
    color: white;
    font-size: 17px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #d36800;
}

table {
    width: 100%;
    border-collapse: collapse;
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
    text-align: center;
}

.action-btn {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 14px;
    text-decoration: none;
    color: white;
}

.edit-btn {
    background: #3498db;
}

.delete-btn {
    background: #e74c3c;
}

.edit-btn:hover {
    background: #1f78b4;
}
.delete-btn:hover {
    background: #c0392b;
}

.btn-back {
    display: inline-block;
    padding: 12px 18px;
    background: #ef6c00;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    margin-top: 20px;
    transition: 0.3s;
}

.btn-back:hover {
    background: #c85a00;
    transform: scale(1.03);
}
</style>

</head>
<body>

<div class="header">Manage Doctors</div>

<div class="container">

<div class="form-container">
<h2><?php echo $edit_mode ? "Edit Doctor" : "Add Doctor"; ?></h2>

<form method="post">

    <?php if($edit_mode): ?>
        <input type="hidden" name="id" value="<?php echo $edit_id; ?>">
    <?php endif; ?>

    <input type="text" name="name" placeholder="Doctor Name" 
        value="<?php echo $edit_mode ? $edit_name : ""; ?>" required>

    <input type="text" name="speciality" placeholder="Speciality" 
        value="<?php echo $edit_mode ? $edit_speciality : ""; ?>" required>

    <?php if($edit_mode): ?>
        <button type="submit" name="update">Update Doctor</button>
    <?php else: ?>
        <button type="submit" name="add">Add Doctor</button>
    <?php endif; ?>
</form>
</div>

<h2>Doctor List</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Speciality</th>
        <th>Actions</th>
    </tr>

    <?php 
    $res = mysqli_query($conn, "SELECT * FROM doctors ORDER BY id DESC");
    while($d = mysqli_fetch_assoc($res)){
        echo "
        <tr>
            <td>".$d['name']."</td>
            <td>".$d['speciality']."</td>
            <td>
                <a href='add_doctor.php?edit=".$d['id']."' class='action-btn edit-btn'>Edit</a>
                <a href='add_doctor.php?delete=".$d['id']."' class='action-btn delete-btn' onclick=\"return confirm('Delete this doctor?');\">Delete</a>
            </td>
        </tr>
        ";
    }
    ?>
</table>

<a href="admin_dashboard.php" class="btn-back">⬅ Back to Dashboard</a>

</div>

</body>
</html>
