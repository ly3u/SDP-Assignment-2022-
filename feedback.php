<?php
// session_start();
// include 'config.php';

// $email ="tp061305@gmail.com";
// $sql11="SELECT * FROM student_acc WHERE S_Email='$email'";
// $result11=mysqli_query($con, $sql11);
// $row11=mysqli_fetch_assoc($result11);
// $tp=$row11['TP'];

// // $sql12="SELECT e.*, p.* FROM event e, event_participant p WHERE p.TP='$tp' AND e.E_ID = p.E_ID ";
// $review=$_POST['feedbackText'];
// $feedbackSQL =
// "INSERT INTO event_feedback (`E_ID`, `TP`, `Review`) VALUES ('E0003', 'TP061505', '$review')";
// $feedbackResult = mysqli_query($con, $feedbackSQL);
if(isset($_POST['feedback'])) {
    $EID=$_POST['eid'];
    $review = $_POST['review'];
    $feedbackSQL =
    "INSERT INTO event_feedback (`E_ID`, `TP`, `Review`) VALUES ('E0003', 'TP061305', '$review')";
    $feedbackResult = mysqli_query($con, $feedbackSQL);
    };
?>