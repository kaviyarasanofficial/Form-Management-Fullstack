<?php
// Start the session to handle user authentication
session_start();

// Check if the login form is submitted
if (isset($_POST['login'])) {
    $servername = "localhost";
    $username = "rectubmx_customer";
    $password = "Rakesh@2023";
    $dbname = "rectubmx_customerquery";

    // Create a database connection
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (!$con) {
        die("Connection to the Database failed due to " . mysqli_connect_error());
    }

    // Escape and sanitize user inputs
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to retrieve user data based on provided email
    $sql = "SELECT * FROM `addnewadmin` WHERE `Email` = '$Email'";
    $result = $con->query($sql);

    // Check if a single user record was found
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Check if user status is "Active"
        if ($row['status'] === 'Active') {
            // Compare entered password with the stored password
            if ($password === $row['password']) {
                // Set session variable for logged-in user
                $_SESSION['admin_email'] = $Email;

                // Redirect based on user role
                if ($row['role'] === 'Superadmin') {
                    header("Location: Index.php"); // Redirect to Index.php page for Superadmin
                    exit();
                } elseif ($row['role'] === "Beta Admin") {
                    header("Location: betaadminindex.php"); // Redirect to betaadminindex.php page for Beta Admin
                    exit();
                } else {
                    header("Location: subadminindex.php"); // Redirect to subadminindex.php page for other roles
                    exit();
                }
            } else {
                $error = "Invalid Password";
            }
        } else {
            $error = "User is Inactive"; // Debugging line
        }
    } else {
        $error = "Email not found";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... Your meta and title tags ... -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container w-50 p-3 bg-light mt-5">
        <h1 class="text-center text-primary font-weight-bold">Login</h1>
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="logginSubAdmin.php">
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email</label>
            <input type="email" id="form2Example1" class="form-control" name="Email" required />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
            <input type="password" id="form2Example2" class="form-control" name="password" required />
        </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mb-4 btn-lg" name="login">Sign in</button> 
        </div>
        
       
        
        </form>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
