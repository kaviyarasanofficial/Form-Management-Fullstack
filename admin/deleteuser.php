<?php
// Include your database connection code here (e.g., connecting to MySQLi)
$connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['sno'])) {
    // Sanitize the input to prevent SQL injection
    $sno = intval($_GET['sno']);

    // Perform the deletion
    $sql = "DELETE FROM addnewadmin WHERE sno = ? LIMIT 1";
    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $sno);
        if (mysqli_stmt_execute($stmt)) {
            // Deletion successful
            echo '<script>window.history.back();</script>';
            exit();
        } else {
            // Deletion failed, handle the error as needed
            echo "Error deleting record: " . mysqli_error($connection);
        }
        mysqli_stmt_close($stmt);
    } else {
        // Prepare statement failed, handle the error
        echo "Error preparing statement: " . mysqli_error($connection);
    }
} else {
    // Handle cases where 'sno' is not provided in the URL
    echo "Invalid request";
}

mysqli_close($connection);
?>
