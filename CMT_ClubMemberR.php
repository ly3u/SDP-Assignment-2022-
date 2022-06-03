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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society</title>
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">
    <link rel="stylesheet" href="footer.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>

    <link rel="stylesheet" href="main.css">
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
            text: 'Are Your Sure To Accept This Request ! If Yes Please Click On Continue',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<a href="CMT_ClubMemberR.php" style="text-decoration:none; color:white; ">Continue</a>',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    };

    function pop_up_success_1() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Are Your Sure To Reject This Request ! If Yes Please Click On Continue',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<a href="CMT_ClubMemberR.php" style="text-decoration:none; color:white; ">Continue</a>',
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
    <?php include 'nav_club.php'?>
    <br>
    <table style="width:80%; margin:auto;">
        <tr>
            <th style="width:50px;"></th>
            <th style="width:650px;">
                <h1 style="text-align:center">Request</h1>
            </th>
            <th style="width:50px;">
                <div class="wrapper">
                    <div class="link_wrapper">
                        <a href="CMT_ClubMember.php" class="a">Member</a>
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
    <table style="width:80%; margin:auto;" class="styled-table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Intake</th>
                <th>Email</th>
                <th>Gender</th>
                <th style="padding-left:50px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $sql1="SELECT a.*, c.* FROM p_club_member c, student_acc a WHERE c.C_ID = '$c_id' AND c.TP = a.TP ";
              $result1 = mysqli_query($con, $sql1);
            while ($data = mysqli_fetch_array($result1)) { 
            ?>
            <tr>
                <form action="" method="POST">
                    <td><input type="hidden" name="tp" value="<?php echo $data['TP'];?>"><?php echo $data["TP"]; ?></td>
                    <td><?php echo $data["S_Name"]; ?></td>
                    <td><?php echo $data["Intake"]; ?></td>
                    <td><?php echo $data["S_Email"]; ?></td>
                    <td><?php echo $data["S_Gender"]; ?></td>
                    <td><button class="button" name="accept">Accept</button><button class="button"
                            name="reject">Reject</button></td>
                </form>
            </tr>
            <?php } ?>
        </tbody>
    </table><br>
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


if(isset($_POST['accept'])) {
    $TP=$_POST['tp'];
    echo  "<script>pop_up_success()</script>";
    $sql1 = "DELETE FROM p_club_member WHERE C_ID='$c_id' AND TP='$TP'";
    $result1 = mysqli_query($con, $sql1);
    $sql2 = "INSERT INTO `club_member`(`No`, `C_ID`, `TP`) VALUES ('','$c_id','$TP')";
    $result2 = mysqli_query($con, $sql2);
    }

    if(isset($_POST['reject'])) {
        $TP=$_POST['tp'];
        echo  "<script>pop_up_success_1()</script>";
        $sql1 = "DELETE FROM p_club_member WHERE C_ID='$c_id' AND TP='$TP'";
        $result1 = mysqli_query($con, $sql1);
        }
        ?>