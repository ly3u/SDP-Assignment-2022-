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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>  
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
            text: 'Are You Sure To Remove This Student Account ?  If Yes Please Click On Continue',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: '<a href="A_Student.php" style="text-decoration:none; color:white; ">Continue</a>',
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
                <h1 style="text-align:center">Student Account</h1>
            </th>
            <th style="width:50px;">
                <div class="wrapper">
                    <div class="link_wrapper">
                        <a href="A_AddStudent.php" class="a">Add New</a>
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
    <table style="width:90%; margin:auto;" class="styled-table">
        <thead>
            <tr>
            <th>TP</th>
                <th>Name</th>
                <th>Gender</th>
                <th>D.O.B</th>
                <th>Intake</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $sql1="SELECT * FROM student_acc ";
              $result1 = mysqli_query($con, $sql1);
            while ($data = mysqli_fetch_array($result1)) { 
            ?>
            <tr>
                <form action="" method="POST">
                    <td><input type="hidden" name = "tp" value ="<?php echo $data['TP'];?>"><?php echo $data["TP"]; ?></td>
                <td><?php echo $data["S_Name"]; ?></td>
                <td><?php echo $data["S_Gender"]; ?></td>
                <td><?php echo $data["D.O.B"]; ?></td>
                <td><?php echo $data["Intake"]; ?></td>
                <td><?php echo $data["S_Email"]; ?></td>
                <td><?php echo $data["S_Password"]; ?></td>
                <td><button class="button" name="edit"><a href="A_StudentEdit.php?tp=<?php echo $data['TP'] ?>" style="text-decoration: none; color:black;">Edit</a></button><button class="button" name="remove">Remove</button></td>
            </form>
            </tr>
                <?php }?>
        </tbody>
    </table>

</body>
</html>

<?php 



            if(isset($_POST['remove'])) {
                $TP=$_POST['tp'];
                echo  "<script>pop_up_success()</script>";
                $sql1 = "DELETE FROM student_acc WHERE TP ='$TP'";
                $result1 = mysqli_query($con, $sql1);
                $sql2 = "DELETE FROM club_member WHERE TP ='$TP'";
                $result2 = mysqli_query($con, $sql2);
                $sql3 = "DELETE FROM event_participant WHERE TP ='$TP'";
                $result3 = mysqli_query($con, $sql3);
                $sql4 = "DELETE FROM event_feedback WHERE TP ='$TP'";
                $result4 = mysqli_query($con, $sql4);
                $sql5 = "DELETE FROM p_club_member WHERE TP ='$TP'";
                $result5 = mysqli_query($con, $sql5);
                }

        ?>