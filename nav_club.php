<?php if (!isset($_SESSION['club'])) {
        header("location:login.php");
    } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="photo/UNICLUBb1.png">
    <style>
    * {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #7EB2DD;

    }

    .step {
        text-align: center;

        transition: all ease-in-out 0.3s;
        background: #bbd6ed;
        box-shadow: 0px 5px 50px 0px;
        color: white;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light step fs-10" style="background-color: #bbd6ed">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="photo/apu.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <h5><a class="nav-link active" aria-current="page" href="CMT_Homepage.php">Home</a></h5>
                    </li>
                    <h5>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="CMT_ClubMember.php">Member</a>
                        </li>
                    </h5>
                    <li class="nav-item">
                        <h5> <a class="nav-link" href="CMT_Event.php">Event</a></h5>
                    </li>
                    <li class="nav-item">
                        <h5> <a class="nav-link" href="CMT_ContactUs.php">Contact Us</a></h5>
                    </li>
                </ul>

                <button class="btn btn-outline-success" type="submit"><a href="logout.php"
                        style="text-decoration: none; color:black;">Log Out</a></button>&nbsp &nbsp
            </div>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>