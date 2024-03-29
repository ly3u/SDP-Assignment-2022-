<?php
    session_start();
    include 'config.php';
    error_reporting(0);
    ob_start(); 
    $email=$_SESSION['email'];

    $sql="SELECT * FROM student_acc WHERE S_Email='$email'";
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['Name'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society </title>
    <link rel="stylesheet" href="footer.css">

    <!-- CSS Style -->
    <script src="animation.js"></script>
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Font Awesome -->

    <script>
    function pop_up_success() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'We had recive your problem and will reply u ASAP ! Please Click On Continue',
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: '<a href="homepage.php" style="text-decoration:none; color:white; ">Continue</a>',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }
    </script>

    <style>
    .button {
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: white;
        color: black;
        border: 2px solid #4CAF50;
        border-radius: 1em;
    }
    </style>
</head>

<body class="bg">
    <?php
        if(isset($email)){
            require_once ('nav_login.php');
        }else{
            require_once ('Nav.php');
        }
    ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-8.5">
                <h1><a href="" class="typewrite" data-period="2000" data-type='[ "   Contact Us", "   APU Help Center"]'
                        style="text-decoration: none; color:black;">
                        <span class="wrap"></span>
                    </a></h1>
            </div>
            <div class="col-3">

            </div>
        </div>
    </div>


    <br>
    <div class="container bg1"
        style="border-style:solid; background-color:white; border-spacing: 15px; border-radius: 25px;">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <br>
                            <h1>Let's Chat</h1>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4>Phone</h4>
                        </div>
                        <div class="col">
                            <h4>Email</h4>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h5>03-8727932</h5>
                        </div>
                        <div class="col">
                            <h5>APUHelpCenter@mail.apu.edu.my</h5>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h6>Full Name</h6>
                        </div>
                        <div class="col">
                            <h6>Email</h6>
                        </div>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Full Name" required
                                        name="name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="name@example.com" name="email"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h6>Message</h6>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <textarea class="form-control" placeholder="Enter Your Message Here." name="message"
                                    required rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-10">
                                <br><br>
                                <h5>Thanks for Submitting!</h5>
                            </div>
                            <div class="col"><br>
                                <br><button name="send" class="button">Send Message</button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
    <br>
    <footer>
        <div class="footer-basic">
            <a href="homepage.php">Home</a>&emsp;&emsp;&emsp;<a href="S_ClubSport.php">Club</a>&emsp;&emsp;&emsp;<a
                href="S_Event.php">Event</a>&emsp;&emsp;&emsp;<a href="ContactUs.php">Contact Us</a>
        </div>
        <center>
            <p class="copyright">UniClub © 2022</p>
        </center>
    </footer>


    <!-- jQuery and Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>

<?php 
    //let's check if your submit button has been clicked
if(isset($_POST['send'])){
    echo "<script>pop_up_success()</script>";
}  
        ?>

<?php 
    if (isset($_POST['send'])) {
        /* Collect all inputted form data */
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql="INSERT INTO `help`(`No`, `Name`, `Email`, `Message`) VALUES ('','$name','$email','$message')";
        $result = mysqli_query($con, $sql);
        echo "<script>pop_up_success()</script>";
    }  
        ?>