<?php
    session_start();
    include 'config.php';
    // error_reporting(0);
    ob_start(); 
    $aid=$_SESSION['admin'];

    $sql="SELECT * FROM admin WHERE A_Email='$aid'";
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($result);
    $A_id = $row['A_ID']; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="footer.css">
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
            text: 'New Student Account Added ! Please Click On Continue',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<a href="A_Club.php" style="text-decoration:none; color:white; ">Continue</a>',
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
        <form action="" method="POST" enctype="multipart/form-data">
          
            <div class="row">
                <div class="col-md-4 border-right"><br><br><br>
                    <div class="d-flex flex-column align-items-center  p-3 py-5"
                        style="border-style:solid; border-spacing: 15px;">
                        <h4 class=" mt-5" style="text=align:left;">Club Logo</h4><br>
                        <input type="file" id="img" name="logo" accept="image/*" style="padding-left:70px;">
                        <!-- <input type="file" name="pp" accept="image/*" class=" mt-5" style="padding-left:70px;"><br><br> -->
                    </div>
                </div>
                <div class="col-md-7 border-right">
                    <div class="p-3 py-5"><br><br>
                        <div class="row mt-2">
                            <div class="col-md-7">
                                <h1 class="text-right">Add New Club</h1>
                            </div>
                            <div class="col-md-6"><button class="button" name="add">ADD</button></div>
                        </div>
                        <br>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6 class="labels">Club Email:</h6>
                                <input type="text" name="email" class="form-control" style="width:100%;" required>
                            </div>
                            <div class="col-md-6">
                                <h6 class="labels">Password:</h6>
                                <input type="text" name="pass" class="form-control" style="width:100%;" required>

                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-8">
                                <h6 class="labels">Club Name:</h6>
                                <input type="text" name="name" class="form-control" style="width:100%;"required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h6 class="labels">Club Categories</h6>
                                <select class="form-control" name="categories" required>
                                    <option disabled selected value> -- select categories --
                                    </option>
                                    <option>Sport</option>
                                    <option>Society</option>
                                    <option>Community</option>
                                </select>
       
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-8">
                                <h6 class="labels">Club Description:</h6>
                                <textarea id="w3review" name="description" rows="4" cols="50" required></textarea>                              
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-8">
                                <h6 class="labels">Advisor Name:</h6>
                                <input type="text" name="advicer" class="form-control" style="width:100%;" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                        <div class="col-md-6">
                                <h6 class="labels">President Name:</h6>
                                <input type="text" name="president" class="form-control" style="width:100%;" required>
                            </div>
                            <div class="col-md-6">
                                <h6 class="labels">Vice President Name:</h6>
                                <input type="text" name="vpresident" class="form-control" style="width:100%;" required>
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
</body>

</html>


<?php 



            if(isset($_POST['add'])) {
                $email=$_POST['email'];
                $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
                $password=$_POST['pass'];
                $name=$_POST['name'];
                $categories=$_POST['categories'];
                $advicer=$_POST['advicer'];
                $president=$_POST['president'];
                $vpresident=$_POST['vpresident'];
                $description=$_POST['description'];

                $sql11 = "SELECT * FROM club";
                $result11 = mysqli_query($con, $sql11);
                $X =mysqli_num_rows($result11);
                $id= 'C'.sprintf("%'04d", $X+1);

                if (strlen($password) < 8){
                    echo  "<script>pop_up()</script>";

                }else{
                echo  "<script>pop_up_success()</script>";
                $sql11 = "INSERT INTO `club`(`C_ID`, `C_Logo`, `C_Name`, `C_Email`, `C_Password`, `C_Description`, `C_CoverP`, `C_Advicer`, `Categories`, `P_Name`, `VP_Name`) VALUES 
                ('$id','$logo','$name','$email','$password','$description','','$advicer','$categories','$president','$vpresident')";
                $result11 = mysqli_query($con, $sql11);}
                }

        ?>