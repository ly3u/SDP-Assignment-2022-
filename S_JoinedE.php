<?php
    session_start();
    include 'config.php';
    error_reporting(0);
    ob_start(); 
    
    if (isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $sql="SELECT * FROM student_acc WHERE S_Email='$email'";
        $result=mysqli_query($con, $sql);
        $row=mysqli_fetch_assoc($result);
        $name=$row['S_Name'];
        $tp=$row['TP'];
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel=”stylesheet” href="profile.css" crossorigin=”anonymous”>
    <link rel="stylesheet" href="anibutton.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="popup.css">
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">
    <link rel="stylesheet" href="footer.css">

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
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    function pop_up_success() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'You Have Leave The Event Successfully!',
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: '<a href="S_JoinedE.php" style="text-decoration:none; color:white; ">Continue</a>',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    };

    function pop_up_success_c() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Feedback Given Successfully!',
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: '<a href="S_JoinedE.php" style="text-decoration:none; color:white; ">Continue</a>',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    };

    function pop_up() {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'You Had Already Gives Feedback To This Event !',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    };

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
    <div class="container mt-5 mb-5" style="background-color: #FFE8D4; border-radius:5%;">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center  p-3 py-5">
                    <img class="rounded-circle mt-5" style="width:250px; height:300px; border-radius: 50%;"
                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['S_PP']); ?>"><br>
                    <h4>----- Profile -----</h4>
                    <button class="button3"><a href="S_profile.php" style=" color:black;"><span>My
                                Profile</span></a></button>
                    <button class="button3"><a href="S_JoinedC.php" style=" color:black;"><span>Joined
                                Club</span></a></button>
                    <button class="button2"><a href="S_JoinedE.php"><span>Joined
                                Event</span></a></button>
                </div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5"><br><br><br><br>
                    <div class="row mt-2">
                        <div class="col-md-7">
                            <h1 class="text-right">Joined Event</h1>
                        </div>
                    </div>
                    <br><br><br>
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Event ID</th>
                                <th style="width: 180px;">Event Name</th>
                                <th style="width: 120px;">Event Day</th>
                                <th style="width: 120px;">Event Time</th>
                                <th style="width: 120px;">Event Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $sql="SELECT e.*, p.* FROM event e, event_participant p WHERE p.TP='$tp' AND e.E_ID = p.E_ID ";
        $result = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($result)) {             
            ?>
                            <tr>
                                <form action="" method="POST">
                                    <td><input type="hidden" name="eid" id="Eid"
                                            value="<?php echo $data['E_ID'];?>"><?php echo $data["E_ID"];?>
                                    </td>
                                    <td><?php echo $data["E_Name"]; ?></td>
                                    <td><?php echo $data["E_Day"]; ?></td>
                                    <td><?php echo $data["E_Time"]; ?></td>
                                    <td><?php echo $data["E_Status"]; ?></td>
                                    <td><?php if($data["E_Status"]=='ongoing'){?><button class="button" name="leave"
                                            type="submit">Leave</button><?php } ?>
                                        <?php if($data["E_Status"]=='Ended'){?><button class="button" name="feedback"
                                            type="submit"
                                            onclick="openForm(); event.preventDefault(); ">Feedback</button><?php } ?>
                                </form>
                                </td>
                                </form>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    </div>
    </div>
    <div class="form-popup" id="myForm">
        <form action="" method="post" class="form-container">
            <h1>Feedback</h1>
            <input type="hidden" id='myText' name='id'>
            <textarea type="text" placeholder="Enter Feedback" rows="4" name="feedbackText" required></textarea>

            <button type="submit" class="btn" name="submit">Confirm</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
</body>
</body>

</html>

<?php 
    if(isset($_POST['leave'])) {
        $EID=$_POST['eid'];
        echo  "<script>pop_up_success()</script>";
        $sql1 = "DELETE FROM event_participant WHERE E_ID='$EID' AND TP='$tp'";
        $result1 = mysqli_query($con, $sql1);
        }

    if(isset($_POST['submit'])) {   
        $EID=$_POST['id'];
        $review = $_POST['feedbackText'];

        $sql11 = "SELECT * FROM event_feedback WHERE E_ID='$EID' AND TP='$tp'";
        $result11 = mysqli_query($con, $sql11);
        $X =mysqli_num_rows($result11);
        if($X > 0){
            echo  "<script>pop_up()</script>";
        }else{
            echo  "<script>pop_up_success_c()</script>";
        $feedbackSQL = "INSERT INTO event_feedback (`E_ID`, `TP`, `Review`) VALUES ('$EID', '$tp', '$review')";
        $feedbackResult = mysqli_query($con, $feedbackSQL);
        }
        }
?>
<script>