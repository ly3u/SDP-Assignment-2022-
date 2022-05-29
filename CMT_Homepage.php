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

<head>
    <title>Club Information </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="popup.css">
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
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
    <div class="container py-4" style="overflow-anchor: none;">
        <div class="d-flex p-4 mb-4 bg-light rounded-3" style=" border-radius: 25px;">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold"><?php echo $row['C_Name']; $CID=$row['C_ID'];?></h1>
                <form method="POST">
                    <textarea class="col-md-11 fs-4" type="text" name="description"
                        rows="7"><?php echo $description; ?></textarea>
                    <br>
                    <button class="btn btn-secondary btn-lg" name="dUpdate">Update</button>
                </form>
            </div>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['C_Logo']); ?>" alt=""
                style="width:250px; height:250px; margin-top: 25px;">
        </div><br>
        <div class="d-flex p-5 mb-4 bg-light rounded-3" style=" border-radius: 25px;">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Announcement</h1>
                <?php while ($row1 = mysqli_fetch_array($result1)) { ?>
                <h4 class="display-9 fw-bold">Date Posted: <?php echo $row1["Date_Post"]?></h4>
                <form method="POST">
                    <textarea class="col-md-11 fs-4" type="text" name="a<?php echo $row1["A_ID"]?>" rows="7"
                        class="form-control"><?php echo $row1["Announcement"]; ?></textarea>
                    <br>
                    <?php aUpdate($row1["A_ID"]); ?>
                    <button class="btn btn-danger btn-lg" name="aDelete<?php echo $row1["A_ID"]?>">Delete</button>
                    <br>
                    <br>
                </form>
                <?php } ?>
            </div>
        </div>
        <br>
        <div class="d-flex p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Club Committees</h1>
                <form method="POST">
                    <h3 class="display-9 fw-bold">Club Advisor</h3>
                    <input class="col-md-7 fs-4" type="text" name="cAdvisor"
                        value="<?php echo $row['C_Advicer']?>"></input>
                    <br>
                    <br>
                    <h3 class="display-9 fw-bold">President</h3>
                    <input class="col-md-7 fs-4" type="text" name="cPresident"
                        value="<?php echo $row['P_Name']?>"></input>
                    <br>
                    <br>
                    <h3 class="display-9 fw-bold">Vice President</h3>
                    <input class=" col-md-7 fs-4" type="text" name="cVPresident"
                        value="<?php echo $row['VP_Name']?>"></input>
                    <br>
                    <br>
                    <button class=" btn btn-info btn-lg" name="cmtUpdate">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
    if(isset($_POST['dUpdate'])) {
        $description = $_POST['description'];
        $sql2 ="UPDATE club SET C_Description = '$description' WHERE C_ID='$CID'";
        $result2 = mysqli_query($con, $sql2);  
        echo  "<script>window.location.reload();</script>"; 
    }
    function aUpdate($A_ID) {
        echo '<button class="btn btn-primary btn-lg" name="'.$A_ID.'">Update</button>';
        if (isset($_POST[$A_ID])) {
            $announcement = $_POST['a'.$A_ID];
            $aSQL ="UPDATE announcement SET Announcement = '$announcement' WHERE A_ID='$A_ID'";
            $_SESSION['aID'] = $aSQL; 
            echo  '<script>window.location.reload();</script>'; 
        }
    }
    
    if (isset($_SESSION['aID'])) {
        $result2 = mysqli_query($con, $_SESSION['aID']);        
    }

    if(isset($_POST['cmtUpdate'])) {
        $cAdvisor = $_POST["cAdvisor"];
        $cPresident = $_POST["cPresident"];
        $cVPresident = $_POST["cVPresident"];
        $cmtSQL ="UPDATE club SET C_Advicer = '$cAdvisor', P_Name = '$cPresident', VP_Name = '$cVPresident' WHERE C_ID='$CID'";
        $cmtResult = mysqli_query($con, $cmtSQL);  
        echo  "<script>window.location.reload();</script>"; 
    }
?>