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
    <title>APU Club and Society</title>
    <script src="animation.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="homepage and event css.css">
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">

    <style>
    .carousel-item {
        height: 15cm;
        background: #777;
        color: white;
    }

    .step {
        text-align: center;
        padding: 80px 30px 80px 30px;
        transition: all ease-in-out 0.3s;
        background: #bbd6ed;
        box-shadow: 0px 5px 90px 0px;
        color: white;
    }

    .left {
        padding-left: 30px;
    }

    .footer-basic {
        position: relative;
        padding: 10px 10px 0px 10px;
        bottom: 0;
        color: #4b4c4d;
        width: 100%;
        list-style: none;
        text-align: center;
        font-size: 18px !important;
        line-height: 1.6;
        margin-bottom: 0;
    }

    .footer-basic a {
        color: inherit;
        text-decoration: none;
        opacity: 0.8;
    }

    .footer-basic :hover {
        background-color: #b9b9b9;
        opacity: 1;
    }

    .copyright {
        font-size: 13px;
        color: black;
        width: 110px;
    }

    * {
        box-sizing: border-box
    }
    </style>
</head>

<body>

    <!-- navbar start -->
    <?php
        if(isset($email)){
            require_once ('nav_login.php');
        }else{
            require_once ('Nav.php');
        }
    ?>
    <!-- carousel start -->
    <br>
    <center>
        <h1><a href="" class="typewrite" data-period="2000"
                data-type='[ "Asia Pacific University", "Club and Society Management System","UniClub"]'
                style="text-decoration: none; color:white;">
                <span class="wrap"></span>
            </a></h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" style="border-radius: 25px;">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" style="height:567px; width:1000px;"
                                            src="photo\apu1.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" style="height:567px; width:1000px;"
                                            src="photo\apu3.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" style="height:567px; width:1000px;"
                                            src="photo\apu2.jpg" alt="Third slide">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <br>
    <section class="step">
        <div class="container">
            <div class="section-title">
                <div class="container">
                    <div class="row">

                        <div class="col-3">
                            <img src="photo\UNICLUBb.png" alt=""
                                style="height:300px; width:300px; border-radius: 25px; ">
                        </div>
                        <div class="col">

                        </div>
                        <div class="col-8">
                            <h1 align="left">About Us</h1><br>
                            <h4 align="left">The APU Club and Society Management System is designed by the UniClub sdn
                                bhd.
                                Uniclub provide a user friendly platform to every user in the organization. We aim to
                                assist the university to manage the clubs and societies efficiently. </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col"
                style="border-style:solid white; background-color:#bbd6ed; border-spacing: 15px; border-radius: 25px; ">
                <br>
                <h2 class="left">Upcoming Event</h2>
                <br>
                <div class="container">
                    <div class="row">
                        <?php
            $sql="SELECT * FROM event WHERE E_Status='ongoing'LIMIT 2 ";
            $result = mysqli_query($con, $sql);
            $sportRow = mysqli_num_rows($result) > 0;

            if ($sportRow) {
                while ($row = mysqli_fetch_array($result)) {
        ?>
                        <div class="col">
                            <div
                                style="border-style:solid white; background-color:white; border-spacing: 15px; border-radius: 25px;">
                                <a href="S_EventDetail.php?Eid=<?php echo $row['E_ID'] ?>"
                                    style="text-decoration: none; color:black;"><img
                                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['E_Banner']); ?>"
                                        alt=""
                                        style="height:250px; width: 522px; object-fit: fill; border-radius: 25px 25px 0px 0px;"><br>
                                    <br>
                                    <h4>
                                        <center><?php echo $row["E_Name"]; ?></center>
                                    </h4>
                                </a><br>
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                    <br>
                </div>

                <center>
                    <a href="S_Event.php" style=" color:black;">
                        <h4>See More</h4>
                    </a>
                </center><br>
            </div>

        </div>
    </div>
    <br><br>
    <hr>
    <footer>
        <div class="footer-basic">
            <a href="homepage.php">Home</a>&emsp;&emsp;&emsp;<a href="S_ClubSport.php">Club</a>&emsp;&emsp;&emsp;<a
                href="S_Event.php">Event</a>&emsp;&emsp;&emsp;<a href="ContactUs.php">Contact Us</a>
        </div>
        <center>
            <p class="copyright">UniClub © 2022</p>
        </center>
    </footer>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>