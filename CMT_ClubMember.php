<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society</title>

    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="table.css">
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
</head>

<body>
    <?php include 'Nav.php'?>
    <br>
    <table style="width:80%; margin:auto;">
        <tr>
            <th style="width:50px;"></th>
            <th style="width:650px;"><h1 style="text-align:center">Member</h1></th>
            <th style="width:50px;"><button class="button">Request</button></th>
        </tr>
    </table>
   <br>
    <table style="width:80%; margin:auto;" class="styled-table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Intake</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>TP061505</td>
                <td>Ong Cheng Wei</td>
                <td>UCDF2007ICT</td>
                <td>ongchengwei@gmail.com</td>
                <td>M</td>
                <td><button class="button">Remove</button></td>
            </tr>

        </tbody>
    </table>

</body>

</html>