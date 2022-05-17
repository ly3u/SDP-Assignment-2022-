<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society</title>

    <link rel="stylesheet" href="main.css">
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
</head>

<body>
    <?php include 'Nav.php'?>
    <br>
    <table style="width:80%; margin:auto;">
        <tr>
            <th style="width:50px;"></th>
            <th style="width:650px;">
                <h1 style="text-align:center">Request</h1>
            </th>
            <th style="width:50px;">
                <div class="wrapper">
                    <div class="link_wrapper">
                        <a href="#" class="a">Member</a>
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
    <table style="width:80%; margin:auto;" class="styled-table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Intake</th>
                <th>Email</th>
                <th>Gender</th>
                <th style="padding-left:50px">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>TP061505</td>
                <td>Ong Cheng Wei</td>
                <td>UCDF2007ICT</td>
                <td>ongchengwei@gmail.com</td>
                <td>M</td>
                <td><button class="button">Accept</button><button class="button">Reject</button></td>
            </tr>

        </tbody>
    </table>

</body>

</html>