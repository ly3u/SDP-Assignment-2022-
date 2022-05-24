<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel=”stylesheet” href="profile.css" crossorigin=”anonymous”>
    <link rel="stylesheet" href="anibutton.css">
    <link rel="stylesheet" href="table.css">
    <style>
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
    <?php include 'Nav.php';?>
    <div class="container bg-white mt-5 mb-5" style="border-radius:5%;">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center  p-3 py-5">
                    <img class="rounded-circle mt-5" style="width:250px; height:300px; border-radius: 50%;"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><br>
                    <h4>----- Profile -----</h4>
                    <button class="button3"><span>My Profile</span></button>
                    <button class="button2"><span>Joined Club</span></button>
                    <button class="button3"><span>Joined Event</span></button>
                </div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5"><br><br><br><br>
                    <div class="row mt-2">
                        <div class="col-md-7">
                            <h1 class="text-right">Joined Club</h1>
                        </div>
                    </div>
                    <br><br><br>
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Club ID</th>
                                <th style="width:300px;">Club Name</th>
                                <th>Action</th>
                    
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>TP061505</td>
                                <td>Ong Cheng Wei</td>
                                <th>Leave</th>
                            </tr>
                            <tr>
                                <td>TP061505</td>
                                <td>Ong Cheng Wei</td>
                                <th>Leave</th>
                            </tr>
                            <tr>
                                <td>TP061505</td>
                                <td>Ong Cheng Wei</td>
                                <th>Leave</th>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>
</body>

</html>