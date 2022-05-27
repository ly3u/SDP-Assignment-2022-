<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    include 'config.php';
    // error_reporting(0);

    $email=$_SESSION['email'];
    $sql5="SELECT * FROM student_acc WHERE S_Email='$email'";
    $result5=mysqli_query($con, $sql5);
    $row5=mysqli_fetch_assoc($result5);
    $name=$row5['S_Name'];
    $tp = $row5['TP'];

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
    <title>Club Information </title>
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
                <h1 class="display-5 fw-bold"><?php echo $row6['C_Name']; ?></h1>
                <p class="col-md-8 fs-4"><?php echo $row6['C_Description']; ?></p>
                <br>
                <button class="btn btn-primary btn-lg" type="button" name="join">Join Club</button>
            </div>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row6['C_Logo']); ?>" alt=""
                style="width:250px; height:250px; margin-top: 25px;">
        </div><br>
        <div class="bd-example">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" style=" border-radius: 25px;">
                        <div class="carousel-item active">
                            <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="425"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <rect width="100%" height="100%" fill="#1982c4" />
                                <text class="display-2 fw-bold" x="30%" y="50%" dy=".3em">
                                    Annoucement</text>
                            </svg>
                        </div>
                        <?php while ($row1 = mysqli_fetch_array($result1)) { ?>
                        <div class="carousel-item">
                            <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800"
                                height="425">
                                <rect width="100%" height="100%" fill="#bbd6ed" />
                                <text class="display-7" x="15%" y="20%" fill="#111" dy=".3em">Date
                                    Posted: <?php echo $row1['Date_Post']; ?>
                                </text>
                                <text class="display-6" x="15%" y="35%" fill="#111"
                                    dy=".3em"><?php echo $row1['Announcement']; ?>
                                </text>
                            </svg>
                        </div>
                        <?php } ?>
                    </div>
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
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="album py-5 " style="background-color: #fffaff ; border-radius: 25px;">
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
                                    <div class="btn-group">
                                   <button type="button" class="btn btn-sm btn-outline-secondary"><a href="S_EventDetail.php?Eid=<?php echo $row2['E_ID'] ?>" style=" color:black;">Details</a></button>
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
</body>

</html>