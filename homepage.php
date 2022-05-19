<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="homepage and event css.css">
    <!-- carousel style -->
    <style>
        .carousel-item {
            height : 15cm;
            background: #777;
            color: white;
        }
    </style>
</head>
<body>
    
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </nav>
    <!-- carousel start -->
    <br>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="140548725_178957774006596_574755887635104435_n.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="140548725_178957774006596_574755887635104435_n.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="140548725_178957774006596_574755887635104435_n.jpg" alt="Third slide">
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="box">
        
        <center>
            <h1>About Us</h1>
            This website is open for every student in APU who wanted to spend some time with the clubs and societies during free time.
            <br>For students, you can join any clubs and societies from this website.
            <br>For admins, you can edit and manage club and societies with your creativity.
        <!-- Gonna put some link here -->
        </center>
    </div>
    <div class="box">
        Events
        <div class="right">
            <a href="">see more</a>
        </div>
        <div class="exbox">
            <div class="container">
                <div class="box1">
                    <img src="Yz.png" alt="fbox">
                    <br>
                    <br>
                    <div class="sbox">
                        This is the basic description of event
                    </div>
                    <button>Press here to enter selected event</button>
                    <!-- Gonna put some link here -->
                </div>
                <div class="box1">
                    <img src="Yz.png" alt="fbox">
                    <br>
                    <br>
                    <div class="sbox">
                        This is the basic description of event
                    </div>
                    
                    <button>Press here to enter selected event</button>
                    <!-- Gonna put some link here -->
                </div>
            </div>
        
            <div class="container">
                <div class="box1">
                    <img src="Yz.png" alt="fbox">
                    <br>
                    <br>
                    <div class="sbox">
                        This is the basic description of event
                    </div>
                    <button>Press here to enter selected event</button>
                    <!-- Gonna put some link here -->
                </div>
                <div class="box1">
                    <img src="Yz.png" alt="fbox">
                    <br>
                    <br>
                    <div class="sbox">
                        This is the basic description of event
                    </div>
                    <button>Press here to enter selected event</button>
                    <!-- Gonna put some link here -->
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>