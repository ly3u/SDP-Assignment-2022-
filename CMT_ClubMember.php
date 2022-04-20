<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society</title>

    <link rel="stylesheet" href="main.css">
    <style>
    button {
        text-align: middle;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }
    </style>
</head>

<body>
    <?php include 'Nav.php';?>
    <br>
    <div class="btn-group">
        <button>Member</button>
        <button>Request</button>
    </div><br><br>
    <table style="width:80%">
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Intake</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>TP061505</td>
            <td>Ong Cheng Wei</td>
            <td>UCDF2007ICT</td>
            <td>ongchengwei@gmail.com</td>
            <td>M</td>
            <td><button>Remove</button></td>
        </tr>
    </table>

</body>

</html>