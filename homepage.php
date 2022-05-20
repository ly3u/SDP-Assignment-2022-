<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="homepage and event css.css">

    <style>
    .carousel-item {
        height: 15cm;
        background: #777;
        color: white;
    }

    .step {
        text-align: center;
        padding: 80px 30px 80px 30px;
        transition: all ease-in-out 0.3s;
        background: #bbd6ed;
        box-shadow: 0px 5px 90px 0px;
        color: white;
    }

    .left {
        padding-left: 30px;
    }
    </style>
</head>

<body>

    <!-- navbar start -->
    <?php include 'Nav.php';?>
    <!-- carousel start -->
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" style="border-radius: 25px;">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" style="height:567px; width:1000px;"
                                            src="photo\cp.jpeg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" style="height:567px; width:1000px;"
                                            src="140548725_178957774006596_574755887635104435_n.jpg" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" style="height:567px; width:1000px;"
                                            src="photo\apu.png" alt="Third slide">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <br>
    <section class="step">
        <div class="container">
            <div class="section-title">
                <div class="container">
                    <div class="row">

                        <div class="col-3">
                            <img src="photo\UNICLUBb.png" alt=""
                                style="height:300px; width:300px; border-radius: 25px; ">
                        </div>
                        <div class="col">

                        </div>
                        <div class="col-8">
                            <h1 align="left">About Us</h1><br>
                            <h4 align="left">collaboration with Uniclub ..........</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col"
                style="border-style:solid white; background-color:#bbd6ed; border-spacing: 15px; border-radius: 25px; ">
                <br>
                <h2 class="left">Upcoming Event</h2>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div
                                style="border-style:solid white; background-color:white; border-spacing: 15px; border-radius: 25px;">
                                <img src="photo\cp.jpeg" alt=""
                                    style="height:250px; width: 476px; object-fit: fill; border-radius: 25px 25px 0px 0px;"><br>
                                <br>
                                <h4>
                                    <center>Online Chess Competition</center>
                                </h4><br>
                            </div>
                        </div>

                        <div class="col-1">

                        </div>
                        <div class="col">
                            <div
                                style="border-style:solid white; background-color:white; border-spacing: 15px; border-radius: 25px;">
                                <img src="photo\cp.jpeg" alt=""
                                    style="height:250px; width: 476px; object-fit: fill; border-radius: 25px 25px 0px 0px;"><br>
                                <br>
                                <h4>
                                    <center>Online Chess Competition</center>
                                </h4><br>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <center><h4>See More</h4></center><br>
            </div>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>