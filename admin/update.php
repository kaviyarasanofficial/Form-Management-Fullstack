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

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Update Remarks</title>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Update Remarks</h1>
        <?php
        if (isset($_GET['sno']) && isset($_GET['email'])) {
            $sno = $_GET['sno'];
            $email = $_GET['email'];

            // Retrieve the record from the database
            $stmt = $conn->prepare("SELECT * FROM formcliant WHERE sno=?");
            if ($stmt) {
                $stmt->bind_param("s", $sno);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                
            } else {
                echo "Error preparing statement: " . $conn->error;
            }
        ?>
        <form action="update2.php" method="POST">
            <input type="hidden" name="sno" value="<?php echo $sno; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" name="remarks" value="<?php echo $row['remarks']; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
        <?php
        } else {
           	 
           	//   echo '<script>alert("Update Done"); window.history.back();</script>';
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
