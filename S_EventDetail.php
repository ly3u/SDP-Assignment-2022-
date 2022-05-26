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
        padding-right: 35px;
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
        <h1 align="center">Event</h1><br>
        <hr>
    </b>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">

                    <div class="col">
                        <div
                            style="border-style:solid white; background-color:white; border-spacing: 15px; border-radius: 25px;">
                            <img id="img"
                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['E_Banner']); ?>"
                                alt="music" style="height:400px; width:1068px; border-radius: 25px 25px 0px 0px;"><br>

                            <table>
                                <tr>
                                <th style="width:90%;">
                                            <h3 class="left">name</h3>
                                        </th>
                                    <th></th>
                                    <td class="right"><button class="button">&nbsp;  Join &nbsp; </button></td>
                                </tr>
                            </table><br>
                           <div class="left">
                                <h6 >HEh hahah jajaj joj jojdbahsvda gdybehjdvw gyegfgagsfu hfhaiufoiahd</h6>
                                <h6>🏫 Organizer: Badmiuton</h6>
                                <h6>📅 Date: 17-6</h6>
                                <h6>🕐 Time: </h6>
                                <h6>⌛ Duration: 2hr</h6>
                           </div><br>   
                        </div>
                    </div><br>

                </div>
                <br>
            </div>
        </div>

    </div>
</body>

</html>