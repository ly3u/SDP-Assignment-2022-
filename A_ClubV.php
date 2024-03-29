<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    include 'config.php';
    // error_reporting(0);
$aid=$_SESSION['admin'];

    $sql="SELECT * FROM admin WHERE A_Email='$aid'";
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $A_id = $row['A_ID'];
    
        $cEmail=$_GET['cid'];
        $sql="SELECT * FROM club WHERE C_ID='$cEmail'";
        $result=mysqli_query($con, $sql);
        $row=mysqli_fetch_assoc($result);
        $c_id = $row['C_ID'];
        $description = $row['C_Description'];
    
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
    <title>APU Club and Society </title>
    <link rel="stylesheet" href="footer.css">
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="table.css">
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
    <style>
    <style>button {
        text-align: middle;
    }



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
    </style>
</head>

<body>
    <?php
    include 'nav_admin.php';
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
                <h1 class="display-5 fw-bold">Announcement</h1><br>
                <table style="width: 100%; margin:auto;" class="styled-table">
                    <thead>
                        <tr>
                            <th>Announcement</th>
                            <th>Date Posted</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row1 = mysqli_fetch_array($result1)) { ?>
                        <tr>
                            <form action="" method="POST">
                                <input type="hidden" name="aid" value="<?php echo $row1['A_ID'];?>">
                                <td><?php echo $row1["Announcement"]; ?></td>
                                <td><?php echo $row1["Date_Post"]; ?></td>
                                <td><button class="button" name="remove">Remove</button></td>
                            </form>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>

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
        <div class="d-flex p-5 mb-4 bg-light rounded-3" style=" border-radius: 25px;">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Member</h1><br>
                <table style="width: 100%; margin:auto;" class="styled-table">
                    <thead>
                        <tr>
                            <th>TP</th>
                            <th>Name</th>
                            <th>Intake</th>
                            <th>Email</th>
                            <th>Gender</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $sql1="SELECT a.*, c.* FROM club_member c, student_acc a WHERE c.C_ID = '$cEmail' AND c.TP = a.TP ";
              $result1 = mysqli_query($con, $sql1);
            while ($data = mysqli_fetch_array($result1)) { 
            ?>
                        <tr>
                            <form action="" method="POST">
                                <td><input type="hidden" name="tp"
                                        value="<?php echo $data['TP'];?>"><?php echo $data["TP"]; ?></td>
                                <td><?php echo $data["S_Name"]; ?></td>
                                <td><?php echo $data["Intake"]; ?></td>
                                <td><?php echo $data["S_Email"]; ?></td>
                                <td><?php echo $data["S_Gender"]; ?></td>
                               
                            </form>
                        </tr>
                        <?php }?>
                </table>

            </div>
        </div>
        <br>
    </div>
    <br><hr>
    <footer>
        <div class="footer-basic">
            <a href="A_Homepage.php">Home</a>&emsp;&emsp;&emsp;<a href="A_Club.php">Clubs</a>&emsp;&emsp;&emsp;<a
                href="A_Events.php">Events</a>&emsp;&emsp;&emsp;<a
                href="A_Student.php">Students</a>&emsp;&emsp;&emsp;<a href="A_Help.php">Help</a>
        </div>
        <center>
            <p class="copyright">UniClub © 2022</p>
        </center>
    </footer>
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

    if(isset($_POST['remove'])){
        $aid=$_POST['aid'];
                $sql1 = "DELETE FROM announcement WHERE A_ID='$aid'";
                $result1 = mysqli_query($con, $sql1);
                echo  "<script>window.location.reload();</script>"; 
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