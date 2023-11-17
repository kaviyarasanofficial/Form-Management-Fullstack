<?php

session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['admin_email'])) {
    header("Location: logginSubAdmin.php"); // Redirect to login page
    exit();
}

// Enable error reporting for debugging purposes
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");

// Check if the connection was successful, if not, display an error message and exit
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the admin's email from the session
$adminEmail = $_SESSION['admin_email'];

// Query to get the admin's data center code from the addnewadmin table
$queryAdmin = "SELECT datacenter FROM addnewadmin WHERE Email = '$adminEmail'";
$resultAdmin = mysqli_query($connection, $queryAdmin);

// Check if the query was successful
if (!$resultAdmin) {
    die("Query error: " . mysqli_error($connection));
}

// Fetch the admin's data center code
$rowAdmin = mysqli_fetch_assoc($resultAdmin);
$adminDataCenterCode = $rowAdmin['datacenter'];

// Query to fetch records from formcliant table based on admin's data center code
$queryFormcliant = "SELECT * FROM `formcliant` ORDER BY `formcliant`.`sno` DESC";
$resultFormcliant = mysqli_query($connection, $queryFormcliant);


// Check if the query was successful
if (!$resultFormcliant) {
    die("Query error: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title> Sub Admin</title>
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            <!--<div class="input-group">-->
            <!--  <input-->
            <!--    class="form-control"-->
            <!--    type="search"-->
            <!--    placeholder="Search"-->
            <!--    aria-label="Search"-->
            <!--  />-->
              <!--<button class="btn btn-primary" type="submit">-->
              <!--  <i class="bi bi-search"></i>-->
              <!--</button>-->
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <!--<li><a class="dropdown-item" href="#">Profile</a></li>-->
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</a></li>
                <li>
                  <a class="dropdown-item" href="logginSubAdmin.php">Log out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="changeadminpassword.php">
        <div class="modal-body">
          <input type="hidden" name="email" value="<?php echo $_SESSION['admin_email']; ?>">
          <div class="mb-3">
            <label for="newPassword" class="form-label">New Password</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Password</button>
        </div>
      </form>
    </div>
  </div>
</div>
   
   
   
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">
                <!-- CORE --><br>
              </div>
            </li>
            <li>
              <a href="subadminindex.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Sub Admin</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Interface
              </div>
            </li>
            
            <ul class="navbar-nav">
              <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#projects">
                  <span class="me-2"><i class="bi bi-layout-split"></i></span>
                  
                  <span onclick="window.location.href='subadminindex.php';" >Lead Management</span>
                  <span class="ms-auto">
                    <span class="right-icon">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
               
                 </li>  
                  
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Addons
              </div>
            </li>
            <li>
              <a href="/" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Lead Form</span>
              </a>
            </li>
            <li>
              <a href="logginSubAdmin.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Search Record from Database</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form to filter data -->
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="filter_value" class="form-control" placeholder="Search Record">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="filter_btn" class="btn btn-primary">Filter Data</button>
                                    <!--<a href="registrationbetaadmin.php?datacenter=<?= $adminDataCenterCode ?>" class="btn btn-success ml-3">Create Beta Admin</a>-->
                                    <!--<a href="fetchingbetaadmin.php?datacenter=<?= $adminDataCenterCode ?>" class="btn btn-primary ml-3">Beta Admin List</a>-->

                                </div>
                                 
                            </div>
                        </form>

                        <!-- Display records in a table -->
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
    <th scope="col">sno</th>
      <th scope="col">Center_Code</th>
      <th scope="col">First_Name</th>
      <th scope="col">Last_Name</th>
      <th scope="col">DOB</th>
      <th scope="col">Phone_Number</th>
       <th scope="col">Duplicate</th> 
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Zip</th>
      <th scope="col">Income</th>
      <th scope="col">Social_Security</th>
      <th scope="col">Email</th>
      <th scope="col">Bank_Name</th>
      <th scope="col">Account_Number</th>
       <th scope="col">Last Update</th>
      <th scope="col" >Remarks </th>
      <th scope="col" >Options </th>

    </tr>
                            </thead>
                            <tbody>
    <?php
   if (mysqli_num_rows($resultFormcliant) > 0) {
    while ($rowFormcliant = mysqli_fetch_assoc($resultFormcliant)) {
        $phone_number = $rowFormcliant['Phone_Number'];
        $duplicate_query = "SELECT COUNT(*) as count FROM formcliant WHERE Phone_Number = '$phone_number'";
        $duplicate_result = mysqli_query($connection, $duplicate_query);
        $duplicate_row = mysqli_fetch_assoc($duplicate_result);
        $is_duplicate = $duplicate_row['count'] > 1;

        // Mark duplicate entries in the "Duplicate" column
        $duplicate_marker = $is_duplicate ? '<span style="color: red;">Duplicate</span>' : 'No';
        
        echo '<tr>';
        echo '<td>' . $rowFormcliant['sno'] . '</td>';
        echo '<td>' . $rowFormcliant['Center_Code'] . '</td>';
        echo '<td>' . $rowFormcliant['First_Name'] . '</td>';
        echo '<td>' . $rowFormcliant['Last_Name'] . '</td>';
        echo '<td>' . $rowFormcliant['DOB'] . '</td>';
        echo '<td>' . $rowFormcliant['Phone_Number'] . '</td>';
        echo '<td>' . $duplicate_marker . '</td>';
        echo '<td>' . $rowFormcliant['Address'] . '</td>';
        echo '<td>' . $rowFormcliant['City'] . '</td>';
        echo '<td>' . $rowFormcliant['State'] . '</td>';
        echo '<td>' . $rowFormcliant['Zip'] . '</td>';
        echo '<td>' . $rowFormcliant['Income'] . '</td>';
        echo '<td>' . $rowFormcliant['Social_Security'] . '</td>';
        echo '<td>' . $rowFormcliant['Email'] . '</td>';
        echo '<td>' . $rowFormcliant['Bank_Name'] . '</td>';
        echo '<td>' . $rowFormcliant['Account_Number'] . '</td>';
        echo '<td>' . $rowFormcliant['dt'] . '</td>';
        echo '<td>' . $rowFormcliant['remarks'] . '</td>';
         $userEmail = $_SESSION['admin_email'];
        echo '<td><a href="update.php?sno=' . urlencode($rowFormcliant['sno']) . '&email=' . urlencode($userEmail) . '" class="btn btn-primary">Remark</a></td>';
$userEmail = $_SESSION['admin_email'];
        echo '<td><a href="updateindex.php?sno=' . urlencode($rowFormcliant['sno']) . '&email=' . urlencode($userEmail) . '" class="btn btn-primary">edit</a></td>';
        
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="17">No Record Found</td></tr>';
}
    ?>
</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
              </div>
            </div>
          </div>
          
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
