<?php
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    
    // Establish database connection
    $connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update user's status to active
    $query = "UPDATE `addnewadmin` SET `status` = 'Active' WHERE `sno` = $user_id";
    $result = mysqli_query($connection, $query);

    mysqli_close($connection);

    // Redirect back to the admin records page
    header("Location: fetchingsubadmin.php");
    exit();
} else {
    // Invalid or missing user ID
    echo "Invalid user ID.";
}
?>
