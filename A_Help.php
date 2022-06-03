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
            text: 'Is The Problem Solved ?  If Yes Please Click On Continue',
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
                <h1 style="text-align:center">APU Help Center</h1>
            </th>
           
        </tr>
    </table>
    <br>
    <table style="width:80%; margin:auto;" class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th style = "width:50%;">Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $sql1="SELECT * FROM help ";
              $result1 = mysqli_query($con, $sql1);
            while ($data = mysqli_fetch_array($result1)) { 
            ?>
            <tr>
                <form action="" method="POST">
                    <input type="hidden" name = "no" value ="<?php echo $data['No'];?>">
                <td><?php echo $data["Name"]; ?></td>
                <td><?php echo $data["Email"]; ?></td>
                <td><?php echo $data["Message"]; ?></td>
                <td><button class="button" name="solved">Solved</button></td>
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



            if(isset($_POST['solved'])) {
                $no=$_POST['no'];
                echo  "<script>pop_up_success()</script>";
                $sql1 = "DELETE FROM help WHERE No ='$no'";
                $result1 = mysqli_query($con, $sql1);
                }

        ?>