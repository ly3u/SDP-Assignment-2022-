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
    $EID = $_GET['eid']; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society</title>
    <link rel="stylesheet" href="footer.css">
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        padding-left: 30px;
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
            text: 'Event Approved !  Please Click On Continue',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<a href="A_Events.php" style="text-decoration:none; color:white; ">Continue</a>',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }

    function pop_up_successs() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Event Rejected !  Please Click On Continue',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<a href="A_Events.php" style="text-decoration:none; color:white; ">Continue</a>',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }

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
    }
    </script>
</head>

<body>

    <?php include 'nav_admin.php'?>

    <b><br>
        <h1 align="center">Event</h1><br>
        <hr>
    </b>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">

                    <div class="col">
                        <?php $sql="SELECT e.*, c.* FROM event e, club c WHERE e.E_ID = '$EID' AND e.C_ID = c.C_ID";
        $result = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_array($result)) { 
            ?>
                        <div
                            style="border-style:solid white; background-color:white; border-spacing: 15px; border-radius: 25px;">
                            <img id="img"
                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['E_Banner']); ?>"
                                alt="music" style="height:400px; width:1068px; border-radius: 25px 25px 0px 0px;"><br>

                            <table>
                                <tr>
                                    <th class="left" style="width:80%;">
                                        <h3><?php echo $data["E_Name"]; ?></h3>
                                    </th>
                                    <th></th>
                                    <td class="right">
                                        <form method="POST"><button class="button" name="accept">&nbsp; Accept &nbsp;
                                            </button><button class="button" name="reject">&nbsp; Reject &nbsp;
                                            </button></form>
                                    </td>
                                </tr>
                            </table><br>
                            <div class="left">
                                <h6><?php echo $data["E_Description"]; ?></h6>
                                <h6>🏫 Organizer: &nbsp; <?php echo $data["C_Name"]; ?></h6>
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
            if(isset($_POST['accept'])) {

                        echo  "<script>pop_up_success()</script>";
                        $sql2 ="UPDATE `event` SET `E_Status`='ongoing' WHERE E_ID = '$EID'";
                        $result2 = mysqli_query($con, $sql2);
            }
                    if(isset($_POST['reject'])) {

                        echo  "<script>pop_up_successs()</script>";
                        $sql2 ="UPDATE `event` SET `E_Status`='Rejected' WHERE E_ID = '$EID'";
                        $result2 = mysqli_query($con, $sql2);
                    
                }

        ?>