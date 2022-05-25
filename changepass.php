<?php
    session_start();

    include 'config.php';

    error_reporting(0);

    $email=$_SESSION['email'];

    $sql="SELECT * FROM student_acc WHERE S_Email='$email'";
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['Name'];
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
            text: 'Try again - thats not your current password',
            showCancelButton: true,
            confirmButtonText: 'Retry again'
        })
    }
    function pop_up_c() {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'Try again - Please make sure your password is match',
            showCancelButton: true,
            confirmButtonText: 'Retry again'
        })
    }
    function pop_up_cc() {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'Try again - Your new password cannot be same with your old password',
            showCancelButton: true,
            confirmButtonText: 'Retry again'
        })
    }
    function pop_up_ccc() {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'Try again - Your new password length must be exist 8 character',
            showCancelButton: true,
            confirmButtonText: 'Retry again'
        })
    }
    function pop_up_success(){
                Swal.fire({
                    icon:'success',
                    title: 'Success', 
                    text: 'Password Changed Successfully ! Please Click On Continue',
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: '<a href="S_profile.php" style="text-decoration:none; color:white; ">Continue</a>',
                    showClass: {
                        popup: 'animate_animated animate_fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate_animated animate_fadeOutUp'
                    }
                })
            }
    </script>

</head>

<body>

    <div class="form_container">
        <form action="" method="POST" class="login">
            <p class="login_word" style="font-size: 2rem; font-weight: 100;">Change Password</p>
            <div class="input-field">
                <input type="password" placeholder="Current Password" name="opass" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="New Password" name="npass" required>
            </div>
            <div class="input-field">
                <input type="password" placeholder="New Password Confirmation" name="npass1" required>
            </div>
            <div class="input-field">
                <button name="submit" class="btn">Confirm</button>
            </div>

            <p class="home"><a href="S_profile.php">Back</a></p>
        </form>
    </div>

</body>

</html>

<?php 
    if (isset($_POST['submit'])) {
        
        /* Collect inputted form data */
        $oripassword = $row['S_Password'];
        $oldpassword = $_POST['opass'];
        $newpassword = $_POST['npass'];
        $cpassword = $_POST['npass1'];
    
        
        if($oldpassword != $oripassword){
            echo "<script>pop_up()</script>";
        }else if($newpassword != $cpassword){
            echo "<script>pop_up_c()</script>";
        }else if($newpassword == $oripassword){
            echo "<script>pop_up_cc()</script>";
        }else if(strlen($newpassword) < 8){
            echo "<script>pop_up_ccc()</script>";
        }else{
            $sql="UPDATE `student_acc` SET `S_Password`='$newpassword'WHERE S_Email='$email' ";
            $result = mysqli_query($con, $sql);
            echo "<script>pop_up_success()</script>";
        }
    }  
?>