<?php
// Start the session to handle user authentication
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
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Beta Admin Records</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th scope="col">Role</th>
                                    <th scope="col">Datacenter</th>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Name Admin</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $connection = mysqli_connect("localhost", "rectubmx_customer", "Rakesh@2023", "rectubmx_customerquery");
                                
                                if (!$connection) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $query = "SELECT `role`, `datacenter`, `sno`, `nameSubadmin`, `Email`, `mobileno`, `password`, `status`
          FROM `addnewadmin`
          WHERE `role` = 'Beta Admin'
          ORDER BY `datacenter` ASC";
                                $result = mysqli_query($connection, $query);

                                if (!$result) {
                                    die("Query error: " . mysqli_error($connection));
                                }

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        
                                        echo '<td>' . $row['role'] . '</td>';
                                        echo '<td>' . $row['datacenter'] . '</td>';
                                        echo '<td>' . $row['sno'] . '</td>';
                                        echo '<td>' . $row['nameSubadmin'] . '</td>';
                                        echo '<td>' . $row['Email'] . '</td>';
                                        echo '<td>' . $row['mobileno'] . '</td>';
                                        echo '<td>' . $row['password'] . '</td>';
                                        echo '<td>' . $row['status'] . '</td>';
                                        
                                         echo '<td>';
                                        echo '<a href="activatebetauser.php?id=' . $row['sno'] . '" class="btn btn-success">Activate</a> ';
                                        echo '<a href="deactivatebetauser.php?id=' . $row['sno'] . '" class="btn btn-danger mt-2">Deactivate</a>';
                                        echo '<a href="#" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#changePasswordModal' . $row['sno'] . '">Change Password</a>';
                                         echo '<a href="deleteuser.php?sno=' . $row['sno'] . '" class="btn btn-danger mt-2">Delete</a>'; // Removed the PHP tags here
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<div class="modal fade" id="changePasswordModal' . $row['sno'] . '" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">';
echo '<div class="modal-dialog">';
echo '<div class="modal-content">';
echo '<div class="modal-header">';
echo '<h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>';
echo '<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">';
echo '<span aria-hidden="true">&times;</span>';
echo '</button>';
echo '</div>';
echo '<div class="modal-body">';
echo '<form action="changepassword.php" method="post">';
echo '<input type="hidden" name="sno" value="' . $row['sno'] . '">';
echo '<div class="mb-3">';
echo '<label for="newPassword" class="form-label">New Password</label>';
echo '<input type="password" class="form-control" id="newPassword" name="newPassword" required>';
echo '</div>';
echo '<button type="submit" class="btn btn-primary">Change Password</button>';
echo '</form>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

                                    }
                                } else {
                                    echo '<tr><td colspan="8">No Record Found</td></tr>';
                                }

                                mysqli_close($connection);
                                ?>
                            </tbody>
                        </table>
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
