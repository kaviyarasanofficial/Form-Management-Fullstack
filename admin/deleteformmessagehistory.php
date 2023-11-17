<?php
$connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['delete'])) {
    $deleteCode = mysqli_real_escape_string($connection, $_POST['deleteCode']);

    // Construct the delete query
    $deleteQuery = "DELETE FROM updateformhistory WHERE historyid = '$deleteCode' LIMIT 1";

    // Execute the delete query
    if (mysqli_query($connection, $deleteQuery)) {
        header("Location: updatehistoryform.php");
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}
?>
