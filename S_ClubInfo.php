<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    include 'config.php';
    // error_reporting(0);

    if (isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $sql5="SELECT * FROM student_acc WHERE S_Email='$email'";
        $result5=mysqli_query($con, $sql5);
        $row5=mysqli_fetch_assoc($result5);
        $name=$row5['S_Name'];
        $tp = $row5['TP'];
    }

    $sql6=$con->prepare("SELECT C_ID, C_Name, C_Description, C_Logo,C_CoverP FROM club WHERE C_ID=?");
    $sql6->bind_param("s", $_GET['link']);
    $sql6->execute();
    $result6 = $sql6->get_result();
    $row6 = mysqli_fetch_array($result6);

    $sql1=$con->prepare("SELECT * FROM announcement WHERE C_ID=?");
    $sql1->bind_param("s", $_GET['link']);
    $sql1->execute();
    $result1 = $sql1->get_result();

    $sql2=$con->prepare("SELECT * FROM event WHERE C_ID=? and E_Status = 'ongoing' ORDER BY E_Day");
    $sql2->bind_param("s", $_GET['link']);
    $sql2->execute();
    $result2 = $sql2->get_result();

?>

<head>
    <title>APU Club and Society </title>
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">
    <link rel="stylesheet" href="footer.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script>
    function pop_up_success() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Your Request To Join The Club Is Sended !  Please Click On Continue',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<a href="" style="text-decoration:none; color:white; ">Continue</a>',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }

    function pop_up() {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'You Are Already A Member of This Club !',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }

    function pop_up_c() {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'You Had Already Sended A Request To Join! Please Wait For Confirmation !',
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
    <?php
        if(isset($email)){
            require_once ('nav_login.php');
        }else{
            require_once ('Nav.php');
        }
    ?>
    <div class="container py-4">
        <div class="d-flex p-5 mb-4 bg-light rounded-3" style=" border-radius: 25px;">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold"><?php echo $row6['C_Name']; $CID=$row6['C_ID'];?></h1>
                <p class="col-md-11 fs-4"><?php echo $row6['C_Description']; ?></p>
                <br>
                <form method="POST">
                    <button class="btn btn-primary btn-lg" name="join">Join Club</button>
                </form>
            </div>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row6['C_Logo']); ?>" alt=""
                style="width:250px; height:250px; margin-top: 25px;">
        </div><br>
        <div class="bd-example">
            <?php
            $sql101 = "SELECT * FROM club_member WHERE C_ID='$CID' AND TP='$tp'";
            $result101 = mysqli_query($con, $sql101);
            $X =mysqli_num_rows($result101); 
            if($X > 1){ 
                    echo '<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" style=" border-radius: 25px;">
                                    <div class="carousel-item active">
                                        <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="425"
                                            role="img" aria-label="Placeholder: First slide"
                                            preserveAspectRatio="xMidYMid slice" focusable="false">
                                            <rect width="100%" height="100%" fill="#1982c4" />
                                            <text class="display-2 fw-bold" x="30%" y="50%" dy=".3em">
                                                Annoucement</text>
                                        </svg>
                                    </div>';                
                        while ($row1 = mysqli_fetch_array($result1)) {                       
                            echo '<div class="carousel-item">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800"height="425">
                                <rect width="100%" height="100%" fill="#bbd6ed" />
                                <text class="display-7" x="15%" y="20%" fill="#111" dy=".3em">Date
                                Posted: ' . $row1["Date_Post"] .
                                '</text>
                                <text class="display-6" x="15%" y="35%" fill="#111"
                                dy=".3em">'. $row1["Announcement"] .
                                '</text>
                                </svg>
                            </div>';
                        }   echo '</div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                </div></div>
                                </div>';
                            } ?>
            <br>
            <br>
            <div class="album py-5 " style="background-color: #fffaff ; border-radius: 25px; min-height:600px;">
                <div class="container">
                    <center>
                        <h1 class="display-5 fw-bold">Events</h1>
                    </center>
                    <br>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php while ($row2 = mysqli_fetch_array($result2)) { ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img id="img" height="225"
                                    src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['E_Banner']); ?>"
                                    alt="banner">
                                <div class="card-body" style="height:150px;">
                                    <h3 class="card-text fw-bold"><?php echo $row2['E_Name']; ?></h3>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group" style="position: absolute; bottom: 2%;>
                                            <a href=" S_EventDetail.php?Eid=<?php echo $row2['E_ID'] ?>"
                                            style=" color:black;"><button type="button"
                                                class="btn btn-sm btn-outline-secondary">Details</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <footer>
        <div class="footer-basic">
            <a href="homepage.php">Home</a>&emsp;&emsp;&emsp;<a href="S_ClubSport.php">Club</a>&emsp;&emsp;&emsp;<a
                href="S_Event.php">Event</a>&emsp;&emsp;&emsp;<a href="ContactUs.php">Contact Us</a>
        </div>
        <center>
            <p class="copyright">UniClub © 2022</p>
        </center>
    </footer>
</body>

</html>

<?php 
            if(isset($_POST['join'])) {
                $sql10 = "SELECT * FROM club_member WHERE C_ID='$CID' AND TP='$tp'";
                $result10 = mysqli_query($con, $sql10);
                $X =mysqli_num_rows($result10);
                $sql11 = "SELECT * FROM p_club_member WHERE C_ID='$CID' AND TP='$tp'";
                $result11 = mysqli_query($con, $sql11);
                $y =mysqli_num_rows($result11);
                if(isset($email)){
                  if($X > 0){
                     /* Collect all inputted form data */
                        echo  "<script>pop_up()</script>";
                    }else if($y > 0){
                        echo  "<script>pop_up_c()</script>";
                    }else{
                        
                        $tp = $row['TP'];
                        echo  "<script>pop_up_success()</script>";
                        $sql2 ="INSERT INTO `p_club_member`(`C_ID`, `TP`) VALUES ('$CID','$tp')";
                        $result2 = mysqli_query($con, $sql2);
                    }
                }else{
                    $url= "login.php";
                    header("Location:" .$url);
                }
                }
            

        ?>