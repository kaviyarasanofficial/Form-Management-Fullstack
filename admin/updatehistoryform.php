<?php

session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['admin_email'])) {
    header("Location: logginSubAdmin.php"); // Redirect to login page
    exit();
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
              <a href="Index.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Super Admin</span>
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
              </li>
              
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
            <!--  <a href="logginSubAdmin.php" class="nav-link px-3">-->
            <!--    <span class="me-2"><i class="bi bi-table"></i></span>-->
            <!--    <span>Logout</span>-->
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

                    <table class="table table-bordered mt-1">
    <thead>
        <tr>
            <th scope="col">S.No</th>
            <th scope="col">Last Updates</th>
            <th scope="col">Sub/Beta Admin Email</th>
            <th scope="col">Admin Role</th>
            <th scope="col">Admin Name</th>
            <th scope="col">Center_Code</th>
            <th scope="col">First_Name</th>
            <th scope="col">DOB</th>
            <th scope="col">Phone_Number</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Zip</th>
            <th scope="col">Income</th>
            <th scope="col">Social_Security</th>
            <th scope="col">Email</th>
            <th scope="col">Bank_Name</th>
            <th scope="col">Account_Number</th>
            <th scope="col">Phone_Number</th>
            <th scope="col">IsAbleToSpend</th>
             <th scope="col">IsInterested</th>
           
        </tr>
    </thead>
    <tbody>
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

        // Query to retrieve data from the database
        $query = "SELECT * FROM updateformhistory ORDER BY historyid DESC"; // Replace with your actual table name

        // Execute the query
        $result = $conn->query($query);

  

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $email = $row['email'];
        $form_id = $row['form_id'];

        // Query to retrieve data from addnewadmin table based on email
        $addnewadminQuery = "SELECT * FROM addnewadmin WHERE email = '$email'";
        $addnewadminResult = $conn->query($addnewadminQuery);

        // Query to retrieve data from formcliant table based on sno (form_id)
        $formclaintQuery = "SELECT * FROM formcliant WHERE sno = $form_id";
        $formclaintResult = $conn->query($formclaintQuery);

        if (!$addnewadminResult || !$formclaintResult) {
            echo "Error in query: " . $conn->error;
        } else {
            $role = 'Form Edited'; // Default message
            $nameSubadmin = '';

            if ($addnewadminResult->num_rows > 0) {
                $addnewadminRow = $addnewadminResult->fetch_assoc();
                $role = htmlspecialchars($addnewadminRow['role']);
                $nameSubadmin = htmlspecialchars($addnewadminRow['nameSubadmin']);
            }

            // Display data from both tables
            echo "<tr>";
            echo "<td>" . $form_id . "</td>";
            
            
            
            
            echo "<td>" . $row['td'] . "</td>";
            echo "<td>" . $email . "</td>";
            echo "<td>" . $role . "</td>";
            echo "<td>" . $nameSubadmin . "</td>";

            // Display data from formcliant table
            if ($formclaintResult->num_rows > 0) {
                $formclaintRow = $formclaintResult->fetch_assoc();
                echo "<td>" . htmlspecialchars($formclaintRow['Center_Code']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['First_Name']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['Last_Name']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['DOB']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['Phone_Number']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['Address']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['City']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['State']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['Zip']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['Income']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['Social_Security']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['Email']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['Bank_Name']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['Account_Number']) . "</td>";
                // echo "<td>" . htmlspecialchars($formclaintRow['dt']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['IsAbleToSpend']) . "</td>";
                echo "<td>" . htmlspecialchars($formclaintRow['IsInterested']) . "</td>";
            } else {
                // If there is no data in formcliant table for the given sno (form_id)
                echo "<td colspan='17'>No formcliant data found</td>";
            }

            echo "</tr>";
        }
    }
} else {
    echo "<tr><td colspan='22'>No records found</td></tr>";
}

$conn->close();
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
