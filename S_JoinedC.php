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
    $tp=$row['TP'];

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
    <link rel="stylesheet" href="footer.css">

    <link rel="shortcut icon" href="photo/UNICLUBb1.png">

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
         function pop_up_success() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Are Your Sure To Leave This Club ! If Yes Please Click On Continue',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<a href="S_JoinedC.php" style="text-decoration:none; color:white; ">Continue</a>',
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
    <?php
        if(isset($email)){
            require_once ('nav_login.php');
        }else{
            require_once ('Nav.php');
        }
    ?>
    <div class="container  mt-5 mb-5" style=" background-color: #FFE8D4; border-radius:5%;">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center  p-3 py-5">
                    <img class="rounded-circle mt-5" style="width:250px; height:300px; border-radius: 50%;"
                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['S_PP']); ?>"><br>
                    <h4>----- Profile -----</h4>
                    <button class="button3"><a href="S_profile.php" style=" color:black;"><span>My
                                Profile</span></a></button>
                    <button class="button2"><a href="S_JoinedC.php"><span>Joined Club</span></a></button>
                    <button class="button3"><a href="S_JoinedE.php" style=" color:black;"><span>Joined
                                Event</span></a></button>
                </div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5"><br><br><br><br>
                    <div class="row mt-2">
                        <div class="col-md-7">
                            <h1 class="text-right">Joined Club</h1>
                        </div>
                    </div>
                    <br><br><br>
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Club ID</th>
                                <th style="width:300px;">Club Name</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                       
                        <tbody>
                        <?php $sql="SELECT a.*, c.* FROM club_member c, club a WHERE c.TP='$tp' AND c.C_ID = a.C_ID ";
        $result = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($result)) { 
            ?>
                            <tr>
                                <td><input type="hidden" name="cid" 
                                            value="<?php echo $data['C_ID'];?>"><?php echo $data["C_ID"]; ?></td>
                                <td><?php echo $data["C_Name"]; ?></td>
                                <th><a href="S_ClubInfo.php?link=<?php echo $data['C_ID'] ?>"><button name = "leave" class="button">View</button></a></th>
                            </tr>
                            <?php }?>
                        </tbody>
                    
                    </table>
                </div>
            </div>

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
</body>

</html>

<?php 


?>