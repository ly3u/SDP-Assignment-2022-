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
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">
    <link rel="stylesheet" href="footer.css">

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
        padding-right: 30px;
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
</head>

<body>
    <?php
        if(isset($email)){
            require_once ('nav_login.php');
        }else{
            require_once ('Nav.php');
        }
    ?>
    <b><br>
        <h1 align="center">Upcoming Event</h1><br>
        <hr>
    </b>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <?php $sql="SELECT * FROM event WHERE E_Status='ongoing'";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) { 
            ?>
                    <div class="col">
                        <div
                            style="border-style:solid white; background-color:white; border-spacing: 15px; border-radius: 25px;">
                            <img id="img" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['E_Banner']); ?>" alt="music"
                                style="height:400px; width:1068px; border-radius: 25px 25px 0px 0px;"><br>

                            <table>
                                <tr>
                                    <th style="width:100%;"><a href="" style="text-decoration: none; color:black;">
                                            <h3 class="left"><?php echo $row["E_Name"]; ?></h3>
                                        </a></th>
                                    <td class="right"><a href="S_EventDetail.php?Eid=<?php echo $row['E_ID'] ?>"><button class="button">Detail</button></a></td>
                                </tr>
                            </table><br>
                        </div>
                    </div><br>
        <?php }?>
                </div>
                <br>
            </div>
        </div>

    </div>
    <footer>
        <div class="footer-basic">
            <a href="homepage.php">Home</a>&emsp;&emsp;&emsp;<a href="S_ClubSport.php">Club</a>&emsp;&emsp;&emsp;<a
                href="S_Event.php">Event</a>&emsp;&emsp;&emsp;<a href="ContactUs.php">Contact Us</a>
        </div>
        <center>
            <p class="copyright">UniClub © 2022</p>
        </center>
    </footer>
</body>

</html>