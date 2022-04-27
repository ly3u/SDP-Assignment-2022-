<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APU Club and Society </title>
    <!-- CSS Style -->
    <script src="animation.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Font Awesome -->

    <script>
    function pop_up_success() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'We had recive your problem and will reply u ASAP ! Please Click On Continue',
            showDenyButton: false,
            showCancelButton: false,
            confirmButtonText: '<a href="#" style="text-decoration:none; color:white; ">Continue</a>',
            showClass: {
                popup: 'animate_animated animate_fadeInDown'
            },
            hideClass: {
                popup: 'animate_animated animate_fadeOutUp'
            }
        })
    }
   
    </script>
</head>

<body class="bg">
    <?php include 'Nav.php';?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-8.5">
                <h1><a href="" class="typewrite" data-period="2000"
                    data-type='[ "   Contact Us", "   APU Help Center"]'style="text-decoration: none; color:black;">
                    <span class="wrap"></span>
                </a></h1>
            </div>
            <div class="col-3">
               
            </div>
        </div>
    </div>


    <br>
    <div class="container bg1"
        style="border-style:solid; background-color:white; border-spacing: 15px; border-radius: 25px;">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <br>
                            <h1>Let's Chat</h1>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4>Phone</h4>
                        </div>
                        <div class="col">
                            <h4>Email</h4>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h5>03-8727932</h5>
                        </div>
                        <div class="col">
                            <h5>APUHelpCenter@mail.apu.edu.my</h5>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h6>Full Name</h6>
                        </div>
                        <div class="col">
                            <h6>Email</h6>
                        </div>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Full Name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="name@example.com" name="email"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h6>Message</h6>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <textarea class="form-control" placeholder="Enter Your Message Here." name="address"
                                    required rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-10">
                                <br>
                                <h5>Thanks for Submitting!</h5>
                            </div>
                            <div class="col">
                                <br><button name="send" class="button">Send Message</button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>

    <footer class="pt-4 my-md-5 pt-md-5 border-top container">
        <small class="d-block mb-3 text-muted text-center">Copyright &copy; 2022 UniClub. All Rights Reserved.</small>
    </footer>


    <!-- jQuery and Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>

<?php 
    //let's check if your submit button has been clicked
if(isset($_POST['send'])){
    echo "<script>pop_up_success()</script>";
}  
        ?>