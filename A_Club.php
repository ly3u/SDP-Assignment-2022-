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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>  
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="b.css">
    <style>
    button {
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
    <script>
        function pop_up_success() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Are You Sure To Remove This Student Account ?  If Yes Please Click On Continue',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<a href="A_Help.php" style="text-decoration:none; color:white; ">Continue</a>',
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
            text: 'You Had Already Joined This Event !',
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
    <br>
    <table style="width:80%; margin:auto;">
    <tr>
            <th style="width:50px;"></th>
            <th style="width:650px;">
                <h1 style="text-align:center">Clubs</h1>
            </th>
            <th style="width:50px;">
                <div class="wrapper">
                    <div class="link_wrapper">
                        <a href="A_AddClub.php" class="a">Add New</a>
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
    <br>
    <table style="width:90%; margin:auto;" class="styled-table">
        <thead>
            <tr>
            <th>Club ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Categories</th>
                <th>Advisor</th>
                <th>President</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $sql1="SELECT * FROM club ";
              $result1 = mysqli_query($con, $sql1);
            while ($data = mysqli_fetch_array($result1)) { 
            ?>
            <tr>
                <form action="" method="POST">
                    <td><input type="hidden" name = "tp" value ="<?php echo $data['C_ID'];?>"><?php echo $data["C_ID"]; ?></td>
                <td><?php echo $data["C_Name"]; ?></td>
                <td><?php echo $data["C_Email"]; ?></td>
                <td><?php echo $data["C_Password"]; ?></td>
                <td><?php echo $data["Categories"]; ?></td>
                <td><?php echo $data["C_Advicer"]; ?></td>
                <td><?php echo $data["P_Name"]; ?></td>
                <td><button class="button" name="edit"><a href="A_ClubV.php?cid=<?php echo $data['C_ID'] ?>" style="text-decoration: none; color:black;">View</a></button>
            </form>
            </tr>
                <?php }?>
        </tbody>
    </table>
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



            if(isset($_POST['remove'])) {
                $TP=$_POST['tp'];
                echo  "<script>pop_up_success()</script>";
                $sql1 = "DELETE FROM student_acc WHERE TP ='$TP'";
                $result1 = mysqli_query($con, $sql1);
                }

        ?>