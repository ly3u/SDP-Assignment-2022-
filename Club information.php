<!DOCTYPE html>
<html lang="en">

<?php
    include 'nav.php'; 
?>

<head>

</head>

<body>
    <div class="container py-4">
        <div class="d-flex p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one
                    in
                    previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to
                    your liking.</p>
                <button class="btn btn-primary btn-lg" type="button">Example button</button>
            </div>

            <img src="data:image/jpeg;base64,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"
                alt="" style="width:250px; height:250px;">
        </div>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777" />
                    </svg>

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p>Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777" />
                    </svg>

                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#777" />
                    </svg>

                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</body>

</html>