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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel=”stylesheet” href="profile.css" crossorigin=”anonymous”>
    <link rel="stylesheet" href="anibutton.css">
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
                    <button class="button2"><a href="S_profile.php"><span>My Profile</span></a></button>
                    <button class="button3" ><a href="S_JoinedC.php" style=" color:black;"><span>Joined Club</span></a></button>
                    <button class="button3"><a href="S_JoinedE.php" style=" color:black;"><span>Joined Event</span></a></button>
                </div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5"><br><br>
                    <div class="row mt-2">
                        <div class="col-md-7">
                            <h1 class="text-right">My Profile</h1>
                        </div>
                        <div class="col-md-6"><a href="changepass.php"><button class="button">Change Password</button></div></a>
                    </div>
                    <br>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <h6 class="labels">TP no:</h6>
                            <h4 class="labels" style="color:blue;"><?php echo $row["TP"]; ?></h4>
                        </div>
                        <div class="col-md-6">
                            <h6 class="labels">D.O.B:</h6>
                            <h4 class="labels" style="color:blue;"><?php echo $row["D.O.B"]; ?></h4>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-8">
                            <h6 class="labels">Name:</h6>
                            <h4 class="labels" style="color:blue;"><?php echo $row["S_Name"]; ?></h4>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <h6 class="labels">Gender:</h6>
                            <h4 class="labels" style="color:blue;"><?php echo $row["S_Gender"]; ?></h4>
                        </div>
                        <div class="col-md-6">
                            <h6 class="labels">Intake:</h6>
                            <h4 class="labels" style="color:blue;"><?php echo $row["Intake"]; ?></h4>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-8">
                            <h6 class="labels">Email:</h6>
                            <h4 class="labels" style="color:blue;"><?php echo $row["S_Email"]; ?></h4>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-8">
                            <h6 class="labels">Password:</h6>
                            <h4 class="labels" style="color:blue;"><?php echo $row["S_Password"]; ?></h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
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