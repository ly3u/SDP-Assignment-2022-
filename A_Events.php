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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society</title>
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>  
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="b.css">
    <link rel="stylesheet" href="footer.css">
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
                <h1 style="text-align:center">Pending Events</h1>
            </th>
        </tr>
    </table>
    <br>
    <table style="width:90%; margin:auto;" class="styled-table">
        <thead>
            <tr>
            <th>Event ID</th>
                <th>Event Name</th>
                <th>Organizer</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $sql1="SELECT e.*, c.* FROM event e, club c WHERE e.E_Status ='Pending' AND e.C_ID = c.C_ID ";
              $result1 = mysqli_query($con, $sql1);
            while ($data = mysqli_fetch_array($result1)) { 
            ?>
            <tr>
                <form action="" method="POST">
                    <td><input type="hidden" name = "eid" value ="<?php echo $data['E_ID'];?>"><?php echo $data["E_ID"]; ?></td>
                <td><?php echo $data["E_Name"]; ?></td>
                <td><?php echo $data["C_Name"]; ?></td>
                <td><?php echo $data["E_Day"]; ?></td>
                <td><?php echo $data["E_Time"]; ?></td>
                <td><?php echo $data["E_Duration"]; ?></td>
                <td><button class="button" name="edit"><a href="A_EventP.php?eid=<?php echo $data['E_ID'] ?>" style="text-decoration: none; color:black;">View</a></button>
            </form>
            </tr>
                <?php }?>
        </tbody>
    </table>
    <br><br>
    <table style="width:80%; margin:auto;">
    <tr>
            <th style="width:50px;"></th>
            <th style="width:650px;">
                <h1 style="text-align:center">Ongoing Events</h1>
            </th>
        </tr>
    </table>
    <br>
    <table style="width:90%; margin:auto;" class="styled-table">
        <thead>
            <tr>
            <th>Event ID</th>
                <th>Event Name</th>
                <th>Organizer</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $sql1="SELECT e.*, c.* FROM event e, club c WHERE e.E_Status ='ongoing' AND e.C_ID = c.C_ID ";
              $result1 = mysqli_query($con, $sql1);
            while ($data = mysqli_fetch_array($result1)) { 
            ?>
            <tr>
                <form action="" method="POST">
                    <td><input type="hidden" name = "eid" value ="<?php echo $data['E_ID'];?>"><?php echo $data["E_ID"]; ?></td>
                <td><?php echo $data["E_Name"]; ?></td>
                <td><?php echo $data["C_Name"]; ?></td>
                <td><?php echo $data["E_Day"]; ?></td>
                <td><?php echo $data["E_Time"]; ?></td>
                <td><?php echo $data["E_Duration"]; ?></td>
                <td><button class="button" name="edit"><a href="A_EventO.php?eid=<?php echo $data['E_ID'] ?>" style="text-decoration: none; color:black;">Detail</a></button>
            </form>
            </tr>
                <?php }?>
        </tbody>
    </table>
    <br><br>
    <table style="width:80%; margin:auto;">
    <tr>
            <th style="width:50px;"></th>
            <th style="width:650px;">
                <h1 style="text-align:center">Ended Events</h1>
            </th>
        </tr>
    </table>
    <br>
    <table style="width:90%; margin:auto;" class="styled-table">
        <thead>
            <tr>
            <th>Event ID</th>
                <th>Event Name</th>
                <th>Organizer</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $sql1="SELECT e.*, c.* FROM event e, club c WHERE e.E_Status ='Ended' AND e.C_ID = c.C_ID ";
              $result1 = mysqli_query($con, $sql1);
            while ($data = mysqli_fetch_array($result1)) { 
            ?>
            <tr>
                <form action="" method="POST">
                    <td><input type="hidden" name = "eid" value ="<?php echo $data['E_ID'];?>"><?php echo $data["E_ID"]; ?></td>
                <td><?php echo $data["E_Name"]; ?></td>
                <td><?php echo $data["C_Name"]; ?></td>
                <td><?php echo $data["E_Day"]; ?></td>
                <td><?php echo $data["E_Time"]; ?></td>
                <td><?php echo $data["E_Duration"]; ?></td>
                <td><button class="button" name="edit"><a href="A_EventF.php?eid=<?php echo $data['E_ID'] ?>" style="text-decoration: none; color:black;">Feedback</a></button>
                <button class="button" name="edit"><a href="A_EventR.php?eid=<?php echo $data['E_ID'] ?>" style="text-decoration: none; color:black;">Report</a></button></td>
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



            // if(isset($_POST['remove'])) {
            //     $TP=$_POST['tp'];
            //     echo  "<script>pop_up_success()</script>";
            //     $sql1 = "DELETE FROM student_acc WHERE TP ='$TP'";
            //     $result1 = mysqli_query($con, $sql1);
            //     }

        ?>