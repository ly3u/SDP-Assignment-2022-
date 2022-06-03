<?php
    session_start();
    include 'config.php';
    error_reporting(0);
    ob_start(); 
    $aid=$_SESSION['admin'];

    $sql="SELECT * FROM admin WHERE A_Email='$aid'";
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $A_id = $row['A_ID'];

    $TP = $_GET['tp']; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society</title>
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
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
    <script>
        function pop_up_success() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Finish Editing ?  If Yes Please Click On Continue',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<a href="A_Student.php" style="text-decoration:none; color:white; ">Continue</a>',
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
            text: 'Password must at least 8 character !',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    };

    function pop_up_c() {
        Swal.fire({
            icon: 'error',
            title: 'Oops',
            text: 'TP number must exist 8 character !',
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

    <?php include 'nav_admin.php'?>

    <div class="container  mt-5 mb-5" style=" background-color: #FFE8D4; border-radius:5%;">
    <form action="" method="POST">
        <?php
     $sql2="SELECT * FROM student_acc WHERE TP='$TP'";
     $result2=mysqli_query($con, $sql2);
     $data=mysqli_fetch_assoc($result2);
    ?>
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center  p-3 py-5">
                    <img class="rounded-circle mt-5" style="width:250px; height:300px; border-radius: 50%;"
                        src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['S_PP']); ?>"><br>
                </div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5"><br><br>
                    <div class="row mt-2">
                        <div class="col-md-7">
                            <h1 class="text-right">Student Profile</h1>
                        </div>
                        <div class="col-md-6"><button class="button" name="save">Save</button></div>
                    </div>
                    <br>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <h6 class="labels">TP no:</h6>
                            <input type="text" name="tp" class="form-control" required
                                value="<?php echo $data['TP'] ?>" style="width:100%;">
                        </div>
                        <div class="col-md-6">
                            <h6 class="labels">D.O.B:</h6>
                            <input type="text" name="dob" class="form-control" required
                                value="<?php echo $data['D.O.B'] ?>" style="width:100%;">
                        
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-8">
                            <h6 class="labels">Name:</h6>
                            <input type="text" name="name" class="form-control"
                                value="<?php echo $data['S_Name'] ?>" style="width:100%;" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <h6 class="labels">Gender:</h6>
                            <select class="form-control" name="gender" required  value="<?php echo $data['S_Gender'] ?>">
                                    <option> <?php echo $data['S_Gender'] ?>
                                    </option>
                                    <option>M</option>
                                    <option>F</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                            <h6 class="labels">Intake:</h6>
                            <input type="text" name="intake" class="form-control"
                                value="<?php echo $data['Intake'] ?>" style="width:100%;" required>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-8">
                            <h6 class="labels">Email:</h6>
                            <input type="text" name="email" class="form-control"
                                value="<?php echo $data['S_Email'] ?>" style="width:100%;" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-8">
                            <h6 class="labels">Password:</h6>
                            <input type="text" name="password" class="form-control"
                                value="<?php echo $data['S_Password'] ?>" style="width:100%;" required>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</form>
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


<?php 



            if(isset($_POST['save'])) {
                $TP=$_POST['tp'];
                $DOB=$_POST['dob'];
                $name=$_POST['name'];
                $gender=$_POST['gender'];
                $intake=$_POST['intake'];
                $email=$_POST['email'];
                $password=$_POST['password'];
                if (strlen($password) < 8){
                    echo  "<script>pop_up()</script>";
                }else{
                echo  "<script>pop_up_success()</script>";
                $sql11 = "UPDATE `student_acc` SET `TP`='$TP',`S_Name`='$name',`S_Gender`='$gender',`D.O.B`='$DOB',`Intake`='$intake',`S_Email`='$email',`S_Password`='$password' WHERE TP = '$TP'";
                $result11 = mysqli_query($con, $sql11);}
                }

        ?>