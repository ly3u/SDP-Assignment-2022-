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
        border-radius: 50%;
        display: block;
        margin-left: auto;
        margin-right: auto;
        height:250px;
        weight:250px;
    }

    .center {
        text-align: center;
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
    ?><br>
    <b>
        <h1 class="center">International Communities</h1><br>
    </b>
    <div class="container">
        <div class="row">
            <?php
            $sql="SELECT * FROM club WHERE categories='Community' ";
            $result = mysqli_query($con, $sql);
            $sportRow = mysqli_num_rows($result) > 0;

            if ($sportRow) {
                while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="col">
                <div class="container">
                    <div class="row" style="margin-bottom: 10px;">
                        
                        <div class="col"
                            style="border-style:solid; background-color:white; border-spacing: 15px; border-radius: 25px;">
                            <br><a href="S_ClubInfo.php?link=<?php echo $row['C_ID'] ?>"
                                style="text-decoration: none; color:black;"><img id="img" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['C_Logo']); ?>"
                                    alt="music"><br>
                                <h3 class="center"><?php echo $row["C_Name"]; ?></h3>
                            </a><br>
                            <table>
                                <tr>
                                    <th style="width:150px;">President: </th>
                                    <td><?php echo $row["P_Name"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Vice  President: </th>
                                    <td><?php echo $row["VP_Name"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Email: </th>
                                    <td><?php echo $row["C_Email"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Advicer: </th>
                                    <td><?php echo $row["C_Advicer"]; ?></td>
                                </tr>
                            </table><br>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php }
        } ?>
        </div>
        <br>
    </div>
</body>

</html>