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

    $EID = $_GET['Eid']; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society</title>
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">

    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="footer.css">
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
        padding-right: 50px;
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
        if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    function pop_up_success() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Event Information Saved Sucessfully!',
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: '<a href="CMT_Event.php" style="text-decoration:none; color:white; ">Continue</a>',
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
    <?php
        include 'nav_club.php'; 
    ?>
    <b><br>
        <h1 align="center">Edit Event</h1><br>
        <hr>
    </b>

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    <div class="container">
                        <div class="col">
                            <?php $sql1="SELECT c.*, e.* FROM event e, club c WHERE e.E_ID = '$EID' AND e.E_Status ='ongoing' AND e.C_ID=c.C_ID   ";
        $result1 = mysqli_query($con, $sql1);
        while ($data = mysqli_fetch_array($result1)) { 
            ?>
                            <div
                                style="border-style:solid white; background-color:white; border-spacing: 15px; border-radius: 25px;">
                                <img id="img"
                                    src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['E_Banner']); ?>"
                                    alt="music"
                                    style="height:400px; width:1068px; border-radius: 25px 25px 0px 0px;"><br>

                                <table>
                                    <tr>
                                        <th style="width:90%;">
                                            <h3 class="left">
                                               <?php echo $data['E_Name'] ?>
                                            </h3>
                                        </th>
                                        <th></th>
                                        <td style="float:right; padding-left:30px;">
                                        <form method="POST"><button class="button" name="join"><a
                                                        href="CMT_Event.php"
                                                        style="text-decoration: none; color:black;">&nbsp; Back
                                                        &nbsp;
                                                    </a></button></form>
                                        </td>
                                    </tr>
                                </table><br>
                                <?php } ?>
                                <table style="width:90%; margin:auto;" class="styled-table">
                                    <thead>
                                        <tr>
                                            <th>TP</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sql11="SELECT a.*, c.* FROM event_participant c, student_acc a WHERE c.E_ID = '$EID' AND c.TP = a.TP  ";
              $result11 = mysqli_query($con, $sql11);
            while ($show = mysqli_fetch_array($result11)) { 
            ?>
                                        <tr>

                                                <td><?php echo $show["TP"]; ?></td>
                                                <td><?php echo $show["S_Name"]; ?></td>
                                                <td><?php echo $show["S_Email"]; ?></td>
                                                <td><?php if($show["attend"]=='Absent'){?><button class="button" name="attend"
                                            type="submit">✅</button><?php } ?>
                                            <?php if($show["attend"]=='Present'){?>Attended  <?php } ?></td>
                                  
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </div><br>
                
                    </div>
                </form>
                <br>
            </div>
        </div>

    </div>
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
            if(isset($_POST['attend'])) {
              
                $query2 = "UPDATE `event_participant` SET `attend`='Present' WHERE E_ID='$EID'";
                $result = mysqli_query($con, $query2);
                echo  "<script>window.location.reload(true);</script>"; 
            
                }
            

        ?>