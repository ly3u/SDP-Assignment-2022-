<?php
    session_start();
    include 'config.php';
    // error_reporting(0);
    ob_start(); 
    $cid=$_SESSION['club'];

    $sql="SELECT * FROM club WHERE C_Email='$cid'";
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $c_id = $row['C_ID'];

?>

<!DOCTYPE html>
<html lang="en">

<?php
    include 'nav_club.php'; 
?>

<head>
    <title>Events</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="b.css">
    <link rel="stylesheet" href="popup.css">

    <style>
    #img {

        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .left {
        padding-left: 30px;
    }

    .right {
        padding-left: 60px;
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
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    function openForm() {
        var EID = document.getElementById("Eid").value;
        <?php $ID = "<script>document.write(EID)
    </script>"?>
    document.getElementById("myText").value = EID;
    document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
    document.getElementById("myForm").style.display = "none";
    }

    function pop_up_success_c() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Report Submitted Successfully!',
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: '<a href="CMT_Event.php" style="text-decoration:none; color:white; ">Continue</a>',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    };
    </script>
</head>

<body>
    <div class="container my-5">
        <table style="width:90%; margin:auto;">
            <tr>
                <th style="width:50px;"></th>
                <th style="width:650px;">
                    <h1 style="text-align:center">Ongoing Event</h1>
                </th>
                <th style="width:40px;">
                    <div class="wrapper">
                        <div class="link_wrapper">
                            <a href="CMT_AddEvent.php" class="a">Add Event</a>
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
                                    <path
                                        d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                </th>
            </tr>
        </table>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">

                    <div class="col">
                        <?php $sql1="SELECT c.*, e.* FROM event e, club c WHERE e.C_ID = '$c_id' AND e.E_Status ='ongoing' AND e.C_ID=c.C_ID   ";
        $result1 = mysqli_query($con, $sql1);
        while ($data = mysqli_fetch_array($result1)) { 
            ?>
                        <div
                            style="border-style:solid white; background-color:white; border-spacing: 15px; border-radius: 25px;">
                            <img id="img"
                                src="data:image/jpg;charset=utf8;base64,<?php  echo base64_encode($data['E_Banner']); ?>"
                                alt="music" style="height:400px; width:1068px; border-radius: 25px 25px 0px 0px;"><br>

                            <table>
                                <tr>
                                    <th style="width:60%;">
                                        <h3 class="left"><?php echo $data["E_Name"]; ?></h3>
                                    </th>
                                    <th></th>
                                    <td style="float:right; padding-left:200px;">
                                        <input type="hidden" name="eid" id="Eid" value="<?php echo $data['E_ID'];?>">
                                        <form method="POST"><button class="button" name="join"
                                                onclick="openForm(); event.preventDefault(); ">&nbsp; Submit Report
                                                &nbsp;
                                            </button><button class="button" name="join"><a
                                                    href="CMT_EventEdit.php?Eid=<?php echo $data['E_ID'] ?>"
                                                    style="text-decoration: none; color:black;">&nbsp; Edit &nbsp;
                                                </a></button></form>
                                    </td>
                                </tr>
                            </table><br>
                            <div class="left">
                                <h6><?php echo $data["E_Description"]; ?></h6>
                                <h6>🏫 Organizer: &nbsp;<?php echo $data["C_Name"]; ?></h6>
                                <h6>📅 Date: &nbsp;<?php echo $data["E_Day"]; ?></h6>
                                <h6>🕐 Time: &nbsp;<?php echo $data["E_Time"]; ?></h6>
                                <h6>⌛ Duration:&nbsp; <?php echo $data["E_Duration"]; ?></h6>
                            </div><br>
                        </div>
                    </div><br>
                    <?php } ?>
                </div>

            </div>
        </div>

    </div>
    <div class="container my-5">
        <div class="d-flex p-5 mb-4 rounded-3">
            <div class="container-fluid py-3 ">
                <center>
                    <h1 class="display-5 fw-bold">Past Events</h1>
                </center>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">

                    <div class="col">
                        <?php $sql1="SELECT c.*, e.* FROM event e, club c WHERE e.C_ID = '$c_id' AND e.E_Status ='Ended' AND e.C_ID=c.C_ID   ";
        $result1 = mysqli_query($con, $sql1);
        while ($data = mysqli_fetch_array($result1)) { 
            ?>
                        <div
                            style="border-style:solid white; background-color:white; border-spacing: 15px; border-radius: 25px;">
                            <img id="img"
                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['E_Banner']); ?>"
                                alt="music" style="height:400px; width:1068px; border-radius: 25px 25px 0px 0px;"><br>

                            <table>
                                <tr>
                                    <th style="width:80%;">
                                        <h3 class="left"><?php echo $data["E_Name"]; ?></h3>
                                    </th>
                                    <th></th>
                                    <td class="right">
                                        <form method="POST"><button class="button" name="join"><a
                                                    href="CMT_EventFeedback.php?Eid=<?php echo $data['E_ID'] ?>"
                                                    style="text-decoration: none; color:black;">&nbsp; View Feedback
                                                    &nbsp;
                                                </a></button></form>
                                    </td>
                                </tr>
                            </table><br>
                            <div class="left">
                                <h6><?php echo $data["E_Description"]; ?></h6>
                                <h6>🏫 Organizer: &nbsp;<?php echo $data["C_Name"]; ?></h6>
                                <h6>📅 Date: &nbsp;<?php echo $data["E_Day"]; ?></h6>
                                <h6>🕐 Time: &nbsp;<?php echo $data["E_Time"]; ?></h6>
                                <h6>⌛ Duration: &nbsp;<?php echo $data["E_Duration"]; ?></h6>
                            </div><br>
                        </div>
                    </div><br>
                    <?php } ?>
                </div>
                <br>
            </div>
        </div>

    </div>
    <div class="form-popup" id="myForm">
        <form action="" method="post" class="form-container">
            <h1>Report</h1>
            <input type="hidden" id='myText' name='id'>
            <table>
                <tr>
                    <th style="width:250px;">Number of Applicants: </th>
                    <td><input type="number" name="participant" style="width:50%;"></td>
                </tr>
                <tr>
                    <th style="width:250px;">Number of Attendees: </th>
                    <td><input type="number" name="attend" style="width:50%;"></td>
                </tr>
            </table><br>
            <h5>Comment</h5>
            <textarea type="text" placeholder="Enter Comment" rows="4" name="comment" required></textarea>

            <button type="submit" class="btn" name="submit">Confirm</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
</body>

<?php 

    if(isset($_POST['submit'])) {   
        $EID=$_POST['id'];
        $participant = $_POST['participant'];
        $attend = $_POST['attend'];
        $review = $_POST['comment'];

       
        echo  "<script>pop_up_success_c()</script>";
        $feedbackSQL = "INSERT INTO `event_report`(`E_ID`, `No`, `participant`, `attend`, `Comment`) VALUES ('$EID','','$participant','$attend','$review')";
        $feedbackResult = mysqli_query($con, $feedbackSQL);
        $feedbackSQL1 = "UPDATE `event` SET `E_Status`='Ended' WHERE E_ID = '$EID'";
        $feedbackResult1 = mysqli_query($con, $feedbackSQL1);
        
        }
?>
<script>