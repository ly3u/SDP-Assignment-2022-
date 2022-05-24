<?php
    session_start();

    include 'config.php';

    error_reporting(0);

?>

<!DOCTYPE html>
<html>
    <head>
        <link href="login_and_register.css?v=<?php echo time(); ?>" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
        <title>FixThat</title>
        <link rel="stylesheet" href="NavBar1.css?v=<?php echo time(); ?>">
        <style>
            body {
                background: #f0f0f0;
            }
        </style>

        <script>
            function pop_up(){
                Swal.fire({
                    icon:'error',
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
                <p class="login_word" style="font-size: 2rem; font-weight: 100;">Change Password</p>
                <div class="input-field">
                    <input type="email" placeholder="New Password" name="email" required>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="New Password Confirmation" name="password" required>
                </div>
                <div class="input-field">
                    <button name="submit" class="btn">Confirm</button>
                </div>
  
                <p class="home"><a href="S_profile.php" >Back</a></p>
            </form>
        </div>

    </body>
</html>