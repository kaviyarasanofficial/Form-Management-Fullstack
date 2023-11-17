<?php
// Start the session to handle user authentication
session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['admin_email'])) {
    header("Location: logginSubAdmin.php"); // Redirect to login page
    exit();
}


// Replace with your actual database connection details
$servername = "localhost";
$username = "rectubmx_customer";
$password = "Rakesh@2023";
$dbname = "rectubmx_customerquery";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the count of users from the "user" table
$sql = "SELECT COUNT(*) AS user_count FROM addnewadmin";
$result = $conn->query($sql);

$userCount = 0; // Default value if no users are found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userCount = $row['user_count'];
}

// Query to get the count of leads from the "formcliant" table
$sql = "SELECT COUNT(*) AS lead_count FROM formcliant";
$result = $conn->query($sql);

$leadCount = 0; // Default value if no leads are found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $leadCount = $row['lead_count'];
}

$sql = "SELECT COUNT(*) AS Subadmin_count FROM addnewadmin WHERE role = 'Sub Admin'";
$result = $conn->query($sql);

$Subadmin_count = 0; // Default value if no records are found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $Subadmin_count = $row['Subadmin_count'];
}


$sql = "SELECT COUNT(*) AS betaadmin_count FROM addnewadmin WHERE role = 'Beta Admin'";
$result = $conn->query($sql);

$betaadmin_count = 0; // Default value if no records are found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $betaadmin_count = $row['betaadmin_count'];
}

$sql = "SELECT COUNT(*) AS datacenter_count FROM datacenters";
$result = $conn->query($sql);

$datacenter_count = 0; // Default value if no records are found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $datacenter_count = $row['datacenter_count'];
}

$sql = "SELECT COUNT(*) AS activeadmins_count FROM addnewadmin WHERE status = 'Active'";
$result = $conn->query($sql);

$activeadmins_count = 0; // Default value if no records are found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $activeadmins_count = $row['activeadmins_count'];
}

$sql = "SELECT COUNT(*) AS inactiveadmins_count FROM addnewadmin WHERE status = 'Inactive'";
$result = $conn->query($sql);

$inactiveadmins_count = 0; // Default value if no records are found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $inactiveadmins_count = $row['inactiveadmins_count'];
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="refresh" content="20">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Admin</title>
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
            <div class="input-group">
              <!--<input-->
              <!--  class="form-control"-->
              <!--  type="search"-->
              <!--  placeholder="Search"-->
              <!--  aria-label="Search"-->
              <!--/>-->
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
                <!--<li><a class="dropdown-item" href="#">Notify</a></li>-->
                <li>
                  <a class="dropdown-item" href="logginSubAdmin.php">Log out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
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
              <a href="Index.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
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
                  
                  <span onclick="window.location.href='fetchingdata.php';" >Lead Management</span>
                  <span class="ms-auto">
                    <span class="right-icon">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
              
              
             <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#website">
                  <span class="me-2"><i class="bi bi-layout-split"></i></span>
                  <span onclick="window.location.href='registrationbetaadmin.php';">Add Sub Admins</span>
                  <span class="ms-auto">
                    <span class="right-icon">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
                 </li>
              
              <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#website">
                  <span class="me-2"><i class="bi bi-layout-split"></i></span>
                  <span onclick="window.location.href='registrationnewadmin.php';">Add Beta Admins</span>
                  <span class="ms-auto">
                    <span class="right-icon">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
                 </li>
              
              <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#projects">
                  <span class="me-2"><i class="bi bi-layout-split"></i></span>
                  
                  <span onclick="window.location.href='fetchingsubadmin.php';" >Sub Admin List</span>
                  <span class="ms-auto">
                    <span class="right-icon">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
              <li>
                   <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#projects">
                  <span class="me-2"><i class="bi bi-layout-split"></i></span>
                  
                  <span onclick="window.location.href='fetchingbetasuperadmin.php';" >Beta Admin List</span>
                  <span class="ms-auto">
                    <span class="right-icon">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
              <li>
              
             <li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#projects">
                  <span class="me-2"><i class="bi bi-layout-split"></i></span>
                  
                  <span onclick="window.location.href='datacenters.php';" >Center Management</span>
                  <span class="ms-auto">
                    <span class="right-icon">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
              <li>
                  
                  <li>
                       <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#projects">
                  <span class="me-2"><i class="bi bi-layout-split"></i></span>
                  
                  <span onclick="window.location.href='updatehistory.php';" >Last Remark Updates</span>
                  <span class="ms-auto">
                    <span class="right-icon">
                      <i class="bi bi-chevron-down"></i>
                    </span>
                  </span>
                </a>
                   </li><li>
                <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#projects">
                  <span class="me-2"><i class="bi bi-layout-split"></i></span>
                  
                  <span onclick="window.location.href='updatehistoryform.php';" >Last Form Updates</span>
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
            <!--<li>-->
            <!--  <a href="#" class="nav-link px-3">-->
            <!--    <span class="me-2"><i class="bi bi-table"></i></span>-->
            <!--    <span>Settings</span>-->
            <!--  </a>-->
            <!--</li>-->
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
        <div class="row">
           
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Datacenter Code</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        $connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");

                        if (!$connection) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        if (isset($_POST['submit'])) {
                            $datacenterCode = mysqli_real_escape_string($connection, $_POST['datacenter_code']);
                            $insertQuery = "INSERT INTO datacenters (datacentercodes) VALUES ('$datacenterCode')";
                            $insertResult = mysqli_query($connection, $insertQuery);

                            if (!$insertResult) {
                                echo '<div class="alert alert-danger">Error adding datacenter code: ' . mysqli_error($connection) . '</div>';
                            } else {
                                echo '<div class="alert alert-success">Datacenter code added successfully</div>';
                            }
                        }

                        mysqli_close($connection);
                        ?>

                        <form method="post">
                            <div class="form-group">
                                <label for="datacenter_code">Datacenter Code</label>
                                <input type="text" class="form-control" id="datacenter_code" name="datacenter_code" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mt-2">Add Datacenter Code</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Datacenter Codes</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                           $connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");

                            if (!$connection) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $fetchQuery = "SELECT * FROM datacenters";
                            $fetchResult = mysqli_query($connection, $fetchQuery);

                            if (!$fetchResult) {
                                echo '<div class="alert alert-danger">Error fetching datacenter codes: ' . mysqli_error($connection) . '</div>';
                            } else {
                               while ($row = mysqli_fetch_assoc($fetchResult)) {
    echo '<li class="list-group-item d-flex justify-content-between align-items-center">' . $row['datacentercodes'] . '
        <form method="post" action="deletedatacenter.php">
            <input type="hidden" name="deleteCode" value="' . $row['datacentercodes'] . '">
            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
        </form>
    </li>';
}
                            }
                            
                            mysqli_close($connection);
                            ?>
                            
                            
                        </ul>
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
