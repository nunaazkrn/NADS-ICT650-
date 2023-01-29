<?php
 include_once("config.php");

  session_start();
  if (!isset($_SESSION['id'])) {
      header("Location:login.php");
  }

 ?>
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Hazard</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['admin_username'] ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Hazard List
            </div>

            
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="table_hazard.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>List of Reports</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="add_hazard.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add New Reports</span></a>
            </li>

            <!-- Divider -->
         
		
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="logout.php" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="images/icon/avatar-01.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

                    <!-- DataTales Example -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add New Reports</h6>
                        </div>
                         <!-- Editable table -->

                         <form action="add_hazard.php" name="btnSave" method="post">
                          <table class="table text-center">
                            <thead>
                              <tr>
                                <td class="text-center">Location</td>
                                <td><input type="text" id="hz_location" name="hz_location" class="form-control validate" required></td>
                              </tr>
								<tr>
                                <td class="text-center">State</td>
                                <td>
									<div class="rs-select2 js-select-simple select--no-search">
                                <select name="hz_state" class="form-control validate" >
                                    <option disabled="disabled" selected="selected" >Choose option</option>
          <option>JOHOR</option>
          <option>KEDAH</option>
          <option>KELANTAN</option>
		<option>KUALA LUMPUR</option>
		  <option>MELAKA</option>
		  <option>NEGERI SEMBILAN</option>
		<option>PAHANG</option>
			<option>PENANG</option>
			<option>PERAK</option>
			<option>PERLIS</option>
			<option>SABAH</option>
			<option>SARAWAK</option>
			<option>SELANGOR</option>
			<option>TERENGGANU</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
									
									</td>
                              </tr>
                              <tr>
                                 <td class="text-center">Report's name </td>
                                 <td><input type="text" id="hz_repname" name="hz_repname" class="form-control validate" required></td>
                              </tr>
                              <tr>
                                 <td class="text-center">Type of Hazard</td>
                                 <td><div class="rs-select2 js-select-simple select--no-search">
                                <select name="hz_type" class="form-control validate" >
                                    <option disabled="disabled" selected="selected" >Choose option</option>
          <option>Physical hazards</option>
          <option>Ergonomic hazards</option>
          <option>Psychological hazards</option>
		  <option>Environmental hazards</option>
		  <option>Hazardous substances</option>
			<option>Biological hazards</option>
			<option>Radiation hazards</option>
			
                                </select>
                                <div class="select-dropdown"></div>
                            </div></td>
                              </tr>
                              <tr>
                                 <td class="text-center">Description</td>
                                 <td><textarea id="hz_desc" name="hz_desc" class="form-control validate" required rows="4" cols="50"></textarea></td>
                              </tr>
								 <tr>
                                 <td class="text-center">Time</td>
                                 <td><input type="time" id="hz_time" name="hz_time" class="form-control validate" required></td>
					
                              </tr>
								<tr>
								 <td class="text-center">Date</td>
                                 <td><input type="date" id="hz_date" name="hz_date" class="form-control validate" required></td>
								</tr>
								<tr>
								 <td class="text-center">Latitude</td>
                                 <td><input type="text" id="hz_lat" name="hz_lat" class="form-control validate" required></td>
								</tr>
								<tr>
								 <td class="text-center">Longitude</td>
                                 <td><input type="text" id="hz_lng" name="hz_lng" class="form-control validate" required></td>
								</tr>
                              <tr>
                                <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-save"></span> Add
                                </button>
                                
                                <a class="btn btn-danger" href="table_hazard.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
                                
                                </td>
                              </tr>

                            </thead>
                          </table>
                        </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; NSA 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
</html>
<?php

if (isset($_POST['submit'])) {

    $hz_location=$_POST	['hz_location'];
	$hz_state=$_POST	['hz_state'];
    $hz_repname=$_POST	['hz_repname'];
    $hz_type=$_POST		['hz_type'];
    $hz_desc=$_POST	['hz_desc'];
	$hz_time=$_POST	['hz_time'];
	$hz_date=$_POST	['hz_date'];
	$hz_lat=$_POST	['hz_lat'];
	$hz_lng=$_POST	['hz_lng'];

	
    $add_query=mysqli_query($conn,"INSERT INTO information (hz_location, hz_state,hz_repname,hz_type,hz_desc,hz_time,hz_date,hz_lat,hz_lng) VALUES ('$hz_location' ,'$hz_state', '$hz_repname','$hz_type','$hz_desc','$hz_time','$hz_date','$hz_lat','$hz_lng')");
	
	
	
    if ($add_query) {
        echo '<script>alert("Data Updated"); </script>';
        echo '<script type="text/javascript">
           window.location = "table_hazard.php"
      </script>';
    }
    else
    {
        echo '<script>alert("Data Not Updated"); </script>';
        echo '<script type="text/javascript">
           window.location = "table_hazard.php"
      </script>';
    }
    
}
?>
