<?php
$servername = "localhost";
$username = "rectubmx_customer";
$password = "Rakesh@2023";
$dbname = "rectubmx_customerquery";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // Sanitize and validate data
    $sno = $_POST['sno'];
    $remarks = $_POST['remarks'];       
    $email = $_POST['email'];

    // Prepare and execute the SQL statement for updating
    $stmt = $conn->prepare("UPDATE formcliant SET remarks=?, dt=NOW() WHERE sno=?");

    if ($stmt) {
        // The "ss" in bind_param indicates two string parameters
        $stmt->bind_param("ss", $remarks, $sno);

        if ($stmt->execute()) {
            // Insert statement for logging
            $insertStmt = $conn->prepare("INSERT INTO updatehistory (sno, remarks, email) VALUES (?, ?, ?)");
            if ($insertStmt) {
                $insertStmt->bind_param("sss", $sno, $remarks , $email);
                $insertStmt->execute();
            } else {
                echo "Error inserting into update_history: " . $conn->error;
            }
            
           echo '<script>alert("Update Done"); window.history.go(-2);</script>';

        } else {
            echo '<div class="container mt-4"><div class="alert alert-danger">Error updating remarks: ' . $stmt->error . '</div></div>';
        }
        
        // Close the update statement
        $stmt->close();
    } else {
        echo '<div class="container mt-4"><div class="alert alert-danger">Error preparing update statement: ' . $conn->error . '</div></div>';
    }

    // Close the connection
    $conn->close();
}
?>
