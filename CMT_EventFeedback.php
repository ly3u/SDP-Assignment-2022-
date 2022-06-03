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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="table.css">
    <style>
    #img {

        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .left {
        padding-left: 110px;
    }

    .right {
        padding-left: 115px;
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
            text: 'Are Your Sure To Join This Event ! If Yes Please Click On Continue',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<a href="CMT_Event.php" style="text-decoration:none; color:white; ">Continue</a>',
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
    <?php
        include 'nav_club.php'; 
    ?>
    <b><br>
        <h1 align="center">Event Feedback</h1><br>
        <hr>
    </b>

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    <div class="container">
                        <div class="col">
                            <?php $sql1="SELECT *  FROM event e WHERE e.E_ID = '$EID' ";
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
                                        <th style="width:80%;">
                                            <h3 class="left"><?php echo $data["E_Name"]; ?> Feedback</h3>
                                        </th>
                                        <th></th>
                                        <td class="right">
                                            <form method="POST"><button class="button" name="join"><a
                                                        href="CMT_Event.php"
                                                        style="text-decoration: none; color:black;">&nbsp; Back
                                                        &nbsp;
                                                    </a></button></form>
                                        </td>
                                    </tr>
                                </table><br>
                                <?php } ?>
                                <table style="width:80%; margin:auto;" class="styled-table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>TP</th>
                                            <th>Feedback</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sql11="SELECT * FROM event_feedback WHERE E_ID = '$EID' ";
              $result11 = mysqli_query($con, $sql11);
            while ($show = mysqli_fetch_array($result11)) { 
            ?>
                                        <tr>

                                                <td><?php echo $show["No"]; ?></td>
                                                <td><?php echo $show["TP"]; ?></td>
                                                <td><?php echo $show["Review"]; ?></td>
                                  
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                       
                                            </tr>
                                        </thead>
                                        <tbody>
                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><br>
                      
                    </div>
                </form>
                <br>
            </div><br>
        </div><br>
<br>
    </div>
</body>

</html>

<?php 
            if(isset($_POST['save'])) {
                $ename = $_POST['ename'];
                $cname = $_POST['cname'];
                $description = $_POST['description'];
                $day = $_POST['day'];
                $time = $_POST['time'];
                $duration = $_POST['duration'];
                $query2 = "UPDATE `event` SET `E_Name`='$ename',`E_Day`='$day',`E_Time`='$time',`E_Duration`='$duration',`E_Description`='$description' WHERE E_ID='$EID'";
                $result = mysqli_query($con, $query2);
                echo "<script>pop_up_success()</script>";
                }
            

        ?>