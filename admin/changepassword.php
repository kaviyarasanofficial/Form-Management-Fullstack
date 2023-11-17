<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sno = $_POST['sno'];
    $newPassword = $_POST['newPassword'];
    
    $connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");
    
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $updateQuery = "UPDATE addnewadmin SET password = '$newPassword' WHERE sno = $sno";
    
    if (mysqli_query($connection, $updateQuery)) {
        // echo "Password changed successfully.";
    } else {
        echo "Error changing password: " . mysqli_error($connection);
    }
    
    mysqli_close($connection);
}
?>
<script>
    alert("Password changed successfully.");
    window.location.href = document.referrer;
</script>