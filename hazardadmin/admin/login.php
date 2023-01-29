<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script>
            function show()
            {
                var password=document.loginForm.password.value;
                var x = document.getElementById("password");
                
                if (x.type === "password") {
                x.type = "text";
                } 
                else {
                x.type = "password";
                }
            }
        </script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" name="loginForm" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username"
                                                placeholder="Enter Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Enter Password" required><br>
                                            <input type="checkbox" onclick="show()"> Show Password
                                        </div>
                                        <center>
                                        <input type="submit" name="submit" class="button" value="Login" class="btn btn-primary btn-user btn-block"></center>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
<?php
include_once('config.php');


if (isset($_POST['submit']))
{  
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (!empty($username) || !empty($password)) 
  {
    $query  = "SELECT * FROM admin WHERE admin_username = '$username'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1)
    {
      while ($row = mysqli_fetch_assoc($result)) 
      {

        if (password_verify($password, $row['admin_pass'])) 
        {
            $_SESSION['admin_username'] = $row['admin_username'];
            $_SESSION['id'] = $row['admin_id'];
            echo '<script>alert("'.$username.' Success"); </script>';
                header("Location:index.php");
            
        }else
        {
            echo '<script>alert("'.$username.' Email or Password is invalid"); </script>';
        }    
      }
    }
    else
    {
          $errorMsg = "No user found on this email";
          echo '<script>alert("'.$username.' No user found on this email"); </script>';

    } 
    }
    else
    {
      echo '<script>alert("'.$username.' Email and Password is required"); </script>';
    }
}
 ?>