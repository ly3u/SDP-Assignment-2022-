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
    function pop_up_success() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Your Event Proposal is Sended Please Wait For Confirmation !  Please Click On Continue',
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
        <h1 align="center">Add Event</h1><br>
        <hr>
    </b>

    <div class="container">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">
                <h4>Proposal Submission</h4>
                <form style="border-style:solid; border-spacing: 15px; border-radius: 25px; background-color:white;"
                    method='POST' class="bg1" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-group"><br>
                                    <label>Event Name</label><br>
                                    <h3><input type="text" name="ename" style="width:100%;"></h3>
                                </div>
                            </div><br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Event Day</label><br>
                                            <input type="Date" name="day">
                                        </div>
                                    </div>
                                    <div class="col order-12">
                                        <div class="form-group">
                                            <label>Event Time</label><br>
                                            <input type="time" name="time">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="form-group"><br>
                                                <label>Event Duration</label><br>
                                                <input type="text" name="duration" style="width:50%;">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Event Description</label>
                                            <textarea class="form-control" placeholder="" name="description" required
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Event Banner</label><br>
                                            <input type="file" id="img" name="banner" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col order-12">
                                        <div class="form-group">
                                            <label>Event Proposal</label><br>
                                            <input type="file" id="img" name="proposal" accept=".pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" align="right">
                                <button name="submit" class="button">Submit</button>
                            </div><br>
                        </div>
                    </div>
            </div><br>

        </div>

        </form>

    </div>
    </div>
</body>

</html>

<?php 
            if(isset($_POST['submit'])) {
                $ename = $_POST['ename'];
                $banner = addslashes(file_get_contents($_FILES['banner']['tmp_name']));
                $description = $_POST['description'];
                $day = $_POST['day'];
                $time = $_POST['time'];
                $duration = $_POST['duration'];
                // $proposal = addslashes(file_get_contents($_FILES['proposal']['tmp_name']));
                $pdf=$_FILES['proposal']['name'];
          $pdf_type=$_FILES['proposal']['type'];
          $pdf_size=$_FILES['proposal']['size'];
          $pdf_tem_loc=$_FILES['proposal']['tmp_name'];
          $pdf_store="pdf/".$pdf;

        //   move_uploaded_file($pdf_tem_loc,$pdf_store);


                $sql11 = "SELECT * FROM event";
                $result11 = mysqli_query($con, $sql11);
                $X =mysqli_num_rows($result11);
                $id= 'E'.sprintf("%'04d", $X+1);
                $query2 = "INSERT INTO `event`(`E_ID`, `E_Name`, `C_ID`, `E_Banner`, `E_Day`, `E_Time`, `E_Duration`, `E_Status`, `E_Description`, `E_Proposal`) VALUES
                 ('$id','$ename','$c_id','$banner','$day','$time','$duration','Pending','$description','$pdf')";
                $result2 = mysqli_query($con, $query2);
                echo "<script>pop_up_success()</script>";
                }
            

        ?>