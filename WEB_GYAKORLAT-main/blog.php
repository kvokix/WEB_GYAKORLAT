<!DOCTYPE html>
<html lang="HU">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/jpg" href="assets/images/Logo_nagy.jpg">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Vaszilij EDC</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    
    <?php session_start(); ?>
    
    <?php include 'header.php'; ?>
    
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>We Banter -Újratöltve</h4>
                                <span>ápr 20, 2025 | We knives, We knives, WE Knives, WE Knives</span>
                                <div class="main-border-button">
                                    <a href="#">Elolvasom!</a>
                                </div>
                            </div>
                            <img src="assets/images/we_banter.jpeg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Lali szamurájkardja</h4>
                                            <span>ápr 6, 2025 | Egyéb</span>
                                            <div class="main-border-button">
                                                <a href="#">Elolvasom!</a>
                                            </div>
                                        </div>
                                        <img src="assets/images/lali.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Olcsó János túrázni megy!</h4>
                                            <span>márc 23, 2025 | Egyéb</span>
                                            <div class="main-border-button">
                                                <a href="#">Elolvasom!</a>
                                            </div>
                                        </div>
                                        <img src="assets/images/olcso_janos.jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Modern slip jointok-régi nóta újra hangszerelve</h4>
                                            <span>márc 8, 2025 | Egyéb</span>
                                            <div class="main-border-button">
                                                <a href="#">Elolvasom!</a>
                                            </div>
                                        </div>
                                        <img src="assets/images/modern_slip.jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Olfa CK-2 Kés helyett sniccer?</h4>
                                            <span>jan 12, 2025 | Egyéb</span>
                                            <div class="main-border-button">
                                                <a href="#">Elolvasom!</a>
                                            </div>
                                        </div>
                                        <img src="assets/images/olfa.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    
    <?php include 'footer.php'; ?>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>