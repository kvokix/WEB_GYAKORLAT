<!DOCTYPE html>
<html lang="HU">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/jpg" href="assets/images/Logo_nagy.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Vaszilij EDC</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    <?php session_start(); ?>


    <?php include 'header.php'; ?>


    <div class="container py-5" >
    <h3 class="mb-4" style="padding-top: 100px;">Ha üzenetet szeretnél küldeni nekem, itt megteheted:</h3>
    <form action="#" method="post" class="shadow p-4 rounded bg-light">
        <div class="mb-3">
            <label for="name" class="form-label">Név <span class="text-danger">(kötelező)</span></label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email cím <span class="text-danger">(kötelező)</span></label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Tárgy</label>
            <input type="text" class="form-control" id="subject" name="subject">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Üzenet</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>

        <div class="mb-3 d-flex align-items-center">
            <label class="me-2">28 - 9 =</label>
            <input type="text" class="form-control w-auto" name="captcha" required>
        </div>

        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" id="dataConsent" required>
            <label class="form-check-label" for="dataConsent">
                Elfogadom az <a href="#">Adatkezelési tájékoztatót</a>
            </label>
        </div>

        <button type="submit" class="btn btn-primary px-4">Küldés</button>
    </form>
</div>

    
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
