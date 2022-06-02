<?php
    session_start();

    include 'config.php';

    if(isset($_SESSION['email'])) {
        header("location:homepage.php");
    } elseif(isset($_SESSION['club'])) {
        header("location:CMT_Homepage.php");
    }elseif(isset($_SESSION['admin'])) {
        header("location:A_Homepage.php");
    }

    // error_reporting(0);

?>

<!DOCTYPE html>
<html>

<head>
    <link href="login_and_register.css?v=<?php echo time(); ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <title>APU Club and Society</title>
    <link rel="stylesheet" href="NavBar1.css?v=<?php echo time(); ?>">
    <style>
    body {
        background: #f0f0f0;
    }
    </style>

    <script>
    function pop_up() {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'You have entered the wrong email or password.',
            showCancelButton: true,
            confirmButtonText: 'Retry again'
        })
    }
    </script>

</head>

<body>

    <div class="form_container">
        <form action="" method="POST" class="login">
            <p class="login_word" style="font-size: 2rem; font-weight: 100;">Login</p>
            <div class="input-field">
                <input type="email" placeholder="Email Address" name="email" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-field">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register_exchange">Can't Login? &nbsp<a class="account_a" href="ContactUs.php"> Contact
                    Admin</a></p>
            <p class="home"><a href="homepage.php">Back to Home Page</a></p>
        </form>
    </div>

</body>

</html>

<?php 
    if (isset($_POST['submit'])) {
        
        /* Collect inputted form data */
        $email = $_POST['email'];
        $password =$_POST['password'];
    
        /* Check to see if existing email and password combination exists in database*/
        $sql = "SELECT * FROM student_acc WHERE S_Email='$email' AND S_Password='$password'";
        $sql1 = "SELECT * FROM club WHERE C_Email='$email' AND C_Password='$password'";
        $sql2 = "SELECT * FROM admin WHERE A_Email='$email' AND A_Pass='$password'";

        
        /* Query between variable 'con' and 'sql'*/
        $result = mysqli_query($con, $sql);
        $result1 = mysqli_query($con, $sql1);
        $result2 = mysqli_query($con, $sql2);
        
        if (mysqli_num_rows($result)==1) {
            $_SESSION['email']= $email; 
            $url= "homepage.php";
            header("Location:" .$url);
            exit;
        } else if (mysqli_num_rows($result2)==1) {
            $_SESSION['admin']= $email; 
            $url= "A_Homepage.php";
            header("Location:" .$url);
            exit;
            exit;
        } else if (mysqli_num_rows($result1)==1) {
            $_SESSION['club']= $email; 
            $url= "CMT_Homepage.php";
            header("Location:" .$url);
            exit;
          }else {
            echo "<script>pop_up()</script>";
        }
    }  
?>