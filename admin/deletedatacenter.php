<?php
$connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Delete logic
if (isset($_POST['delete'])) {
    $deleteCode = mysqli_real_escape_string($connection, $_POST['deleteCode']);
    
    $deleteSql = "DELETE FROM datacenters WHERE datacentercodes = ? LIMIT 1";
    $deleteStmt = mysqli_prepare($connection, $deleteSql);
    mysqli_stmt_bind_param($deleteStmt, "s", $deleteCode);
    
    if (mysqli_stmt_execute($deleteStmt)) {
        mysqli_stmt_close($deleteStmt);
        header("Location: datacenters.php");
        exit(); // Important: Terminate script after redirection
    } else {
        echo '<script>alert("Error deleting data.");</script>';
    }
    
    mysqli_stmt_close($deleteStmt);
}

// Close the connection at the end
mysqli_close($connection);
?>

?>
