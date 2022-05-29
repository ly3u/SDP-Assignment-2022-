<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    include 'config.php';
    // error_reporting(0);

    if (isset($_SESSION['club'])){
        $cEmail=$_SESSION['club'];
        $sql="SELECT * FROM club WHERE C_Email='$cEmail'";
        $result=mysqli_query($con, $sql);
        $row=mysqli_fetch_assoc($result);
        $c_id = $row['C_ID'];
        $description = $row['C_Description'];
    }

    $sql1=$con->prepare("SELECT * FROM announcement WHERE C_ID=?");
    $sql1->bind_param("s", $c_id);
    $sql1->execute();
    $result1 = $sql1->get_result();

    $sql2=$con->prepare("SELECT * FROM event WHERE C_ID=? and E_Status = 'ongoing' ORDER BY E_Day");
    $sql2->bind_param("s", $c_id);
    $sql2->execute();
    $result2 = $sql2->get_result();

?>

<style>
.swal-wide {
    width: 1000px !important;
}
</style>

<head>
    <title>Club Information </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    function pop_up_success() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Updated Successfully!',
            className: 'swal-wide',
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: '<a href="" style="text-decoration:none; color:white; ">Confirm</a>',
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
                <h1 class="display-5 fw-bold"><?php echo $row['C_Name']; $CID=$row['C_ID'];?></h1>
                <form method="POST">
                    <textarea class="col-md-11 fs-4" type="text" name="description" rows="7"
                        class="form-control"><?php echo $description; ?></textarea>
                    <br>
                    <button class="btn btn-secondary btn-lg" name="Save">Save</button>
                </form>
            </div>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['C_Logo']); ?>" alt=""
                style="width:250px; height:250px; margin-top: 25px;">
        </div><br>
        <div class="bd-example">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" style=" border-radius: 25px;">
                        <div class="carousel-item active">
                            <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="425"
                                role="img" aria-label="Placeholder: First slide" preserveAspectRatio="xMidYMid slice"
                                focusable="false">
                                <rect width="100%" height="100%" fill="#1982c4" />
                                <text class="display-2 fw-bold" x="22.5%" y="50%" dy=".3em">
                                    Edit Annoucement</text>
                            </svg>
                        </div>
                        <?php
                        while ($row1 = mysqli_fetch_array($result1)) { ?>
                        <div class="carousel-item">
                            <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800"
                                height="425">
                                <rect width="100%" height="100%" fill="#bbd6ed" />
                                <text class="display-7" x="15%" y="20%" fill="#111" dy=".3em">Date
                                    Posted: <?php echo $row1["Date_Post"] ?>
                                </text>
                                <text class="display-6" x="15%" y="35%" fill="#111"
                                    dy=".3em"><?php echo $row1["Announcement"] ?>
                                </text>
                                <a href=" CMT_EventEdit.php?Eid=<?php echo $row2['E_ID'] ?>"
                                    style=" color:black;"><button type="button"
                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                </a>

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
                                    <div class="btn-group" style="position: absolute; bottom: 2%;">
                                        <a href=" CMT_EventEdit.php?Eid=<?php echo $row2['E_ID'] ?>"
                                            style=" color:black;"><button type="button"
                                                class="btn btn-sm btn-outline-secondary">Edit</button></a>
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

<?php 
    if(isset($_POST['Save'])) {
        $description = $_POST['description'];
        $sql2 ="UPDATE club SET C_Description = '$description' WHERE C_ID='$CID'";
        $result2 = mysqli_query($con, $sql2);  
        echo  "<script>window.location.reload();</script>"; 
    }
?>