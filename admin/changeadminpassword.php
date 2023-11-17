<?php
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: logginSubAdmin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $newPassword = $_POST['newPassword'];

    // Replace with your database connection code
    $connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the password in the database
    $query = "UPDATE addnewadmin SET password = '$newPassword' WHERE Email = '$email'";
    if (mysqli_query($connection, $query)) {
       
    } else {
        echo "Error updating password: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>

<script>
    alert("Password changed successfully.");
    window.location.href = document.referrer;
</script>
