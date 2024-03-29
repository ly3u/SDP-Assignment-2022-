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
    <title>APU Club and Society </title>
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="footer.css">

    <script>
    // Stop sending sql on browser refresh
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    // for pop up in add announcement
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
    include 'nav_club.php';
    ?>
    <!-- Update Club's Description -->
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
        <!-- Add and Remove Club's Announcement -->
        <div class="d-flex p-5 mb-4 bg-light rounded-3" style=" border-radius: 25px;">
            <div class="container-fluid py-5">
                <div style="display: flex; padding-bottom: 10px;">
                    <h1 class="display-5 fw-bold">Announcement</h1><br>
                    <button class=" btn btn-info btn-lg" onclick="openForm(); event.preventDefault();"
                        style="width: 10%; margin-left: auto;">Add</button>
                </div>
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
        <!-- Update Club's Committees -->
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
                    <button class=" btn btn-secondary btn-lg" name="cmtUpdate">Update</button>
                </form>
            </div>
        </div>
    </div>
    <!-- add announcement pop up -->
    <div class="form-popup" id="myForm">
        <form action="" method="post" class="form-container">
            <h1>New Annoucement</h1>
            <input type="hidden" id='myText' name='id'>
            <textarea type="text" placeholder="Enter New Announcement..." rows="4" name="anmText" required></textarea>

            <button type="submit" class="btn" name="submitAnm">Confirm</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
    <footer>
        <div class="footer-basic">
            <a href="CMT_Homepage.php">Home</a>&emsp;&emsp;&emsp;<a href="CMT_ClubMember.php">Member</a>&emsp;&emsp;&emsp;<a
                href="CMT_Event.php">Event</a>&emsp;&emsp;&emsp;<a href="CMT_ContactUs.php">Contact Us</a>
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

    if(isset($_POST['submitAnm'])) {
        $date = date('Y/m/d', time());
        $anm = $_POST['anmText'];
        $anmSQL = "INSERT INTO announcement (`Announcement`, `C_ID`, `Date_Post`) VALUES ('$anm', '$CID', '$date')";
        $anmResult = mysqli_query($con, $anmSQL);        
        echo  "<script>window.location.reload(true);</script>"; 
        }
        
?>