<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$message = "";
$message_type = ""; // success vagy danger

if (isset($_SESSION['success_message'])) {
    $message = $_SESSION['success_message'];
    $message_type = 'success';
    unset($_SESSION['success_message']);
}

if (isset($_SESSION['error_message'])) {
    $message = $_SESSION['error_message'];
    $message_type = 'danger';
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>

<html lang="HU">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/jpg" href="assets/images/Logo_nagy.jpg">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Vaszilij EDC</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>

    <?php if (!empty($message)): ?>
    <div id="flash-message" class="alert alert-<?= $message_type ?> text-center"
        style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050; width: auto; max-width: 500px;">
        <?= htmlspecialchars($message) ?>
    </div>
    <?php endif; ?>

    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <?php include 'header.php'; ?>


    <section class="section" id="explore" style="padding-top: 120px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Naplónak indult. <br>Bemutató bloggá vált.</h2>
                        <p>
                            Egy angol betűszó, amely kibontva az every day carry kifejezést takarja. Ez szó szerinti
                            fordításban azokat a holmikat jelenti, amelyeket nap mint nap magunknál hordunk.
                            A közkeletű tévhittel ellentétben nem szükséges az, hogy mindig minden nap nálunk legyen:
                            inkább egyfajta készletről, gyűjteményről van szó, amelynek elemeit az adott
                            szituációnak megfelelően váltogathatjuk. Más holmikat pakolunk el, ha egy irodába megyünk
                            dolgozni, mást, ha egy építkezésen melózunk, és akkor is, amikor hétvégén
                            rokonlátogatóba megyünk. <br><br>Ezen a blogon főképp késekről olvashatsz, mert hozzám ezek
                            az eszközök állnak legközelebb, de szó esik néha másról is. Multiszerszámokról,
                            táskákról, egyéb kiegészítőkről. És nem csak bemutatókat készítek: ahogy már írtam, sokféle
                            aspektusa érdekel ennek a világnak. <br><br> Az every day carry tehát sok minden lehet.
                            Életmód, filozófia, hobbi, vagy akár egy gyűjtőszenvedély alapja. Mindegy, hogy téged melyik
                            része érdekel, remélem, találsz itt értékes olvasnivalót.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 text-end">
                    <img src="assets/images/vaszilij.jpg" alt="Vaszilij"
                        style="width: 80%; height: 60%; border-radius: 8px;">
                </div>
            </div>
        </div>
    </section>


    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>„Ezeket a dolgokat cipelem.”</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <a href="we-banter-ujratoltve.php" target="_blank">
                                        <img src="assets/images/we_banter.jpeg">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <h4>We Banter -Újratöltve</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <a href="lali-szamurajkardja.php" target="_blank">
                                        <img src="assets/images/lali.jpg">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <h4>Lali szamurájkardja</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <a href="olcso-janos-turazni-megy.php" target="_blank">
                                        <img src="assets/images/olcso_janos.jpeg">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <h4>Olcsó János túrázni megy!</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <a href="modern-slip.php" target="_blank">
                                        <img src="assets/images/modern_slip.jpeg">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <h4>Modern slip jointok-régi nóta újra hangszerelve</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <a href="olfa-ck-2.php" target="_blank">
                                        <img src="assets/images/olfa.jpg">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <h4>Olfa CK-2 Kés helyett sniccer?</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Csekkold ezeket is!</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="https://www.bladeshop.hu/"><i class="fa fa-globe"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/bladeshop.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Bladeshop</h4>
                            <span>Késes webshop gyakori akciókkal és vevőbarát hozzáállással. Ha új kés kell, ne hagyd
                                ki!</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="https://elemlampablog.hu/"><i class="fa fa-globe"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/elemlampa.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Elemlámpa blog</h4>
                            <span>Minden, amit az elemlámpákról tudni szeretnél. Cikkek, bemutatók, illetve kuponok
                                gyűjtőhelye.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="https://www.kesvilag.hu/"><i class="fa fa-globe"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/Kesvilag.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Késvilág</h4>
                            <span>Hazai bolt és webáruház, rendkívül széles termékválasztékkal. Debrecenben személyesen
                                is válogathatsz!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="https://www.magyarkesek.hu/"><i class="fa fa-globe"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/mkszoveglogo.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Magyar kések</h4>
                            <span>Webshop és közösség. Elsősorban a hazai készítők termékeivel foglalkozik, de nyitott
                                egyéb irányokba is.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="https://kesportal.hu/"><i class="fa fa-globe"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/kesportal.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Késportál</h4>
                            <span>Magyarország legnagyobb késes tudásbázisa. Érdemes csatlakoznod a fórumhoz is!</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="https://www.zboss.hu/"><i class="fa fa-globe"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/zboss.jpg">
                        </div>
                        <div class="down-content">
                            <h4>ZBOSS</h4>
                            <span>Kések, edc felszerelések, túra és sok egyéb. Hazai webáruház, ahol a vevők
                                elégedettsége a legfontosabb.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>De mi az az EDC?</h2>
                        <p>Egy angol betűszó, amely kibontva az every day carry kifejezést takarja. Ez szó szerinti
                            fordításban azokat a holmikat jelenti, amelyeket nap mint nap magunknál hordunk.
                            A közkeletű tévhittel ellentétben nem szükséges az, hogy mindig minden nap nálunk legyen:
                            inkább egyfajta készletről, gyűjteményről van szó, amelynek elemeit az adott
                            szituációnak megfelelően váltogathatjuk. Más holmikat pakolunk el, ha egy irodába megyünk
                            dolgozni, mást, ha egy építkezésen melózunk, és akkor is, amikor hétvégén
                            rokonlátogatóba megyünk. <br><br>Ezen a blogon főképp késekről olvashatsz, mert hozzám ezek
                            az eszközök állnak legközelebb, de szó esik néha másról is. Multiszerszámokról,
                            táskákról, egyéb kiegészítőkről. És nem csak bemutatókat készítek: ahogy már írtam, sokféle
                            aspektusa érdekel ennek a világnak. <br><br> Az every day carry tehát sok minden lehet.
                            Életmód, filozófia, hobbi, vagy akár egy gyűjtőszenvedély alapja. Mindegy, hogy téged melyik
                            része érdekel, remélem, találsz itt értékes olvasnivalót.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    <img src="assets/images/miazedc.jpeg" alt="Vaszilij"
                        style="width: 80%; height: 90%; border-radius: 8px;">
                </div>
            </div>
        </div>
    </section>

    

    

    <section class="section" id="explore">
    <div class="container" style="text-align: center;">
        <h2 style="text-align: center;"><b>Legutóbbi videónk</b></h2>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/0VRhcXBykbs?si=eSPX0UlabTHMXR3J" title="YouTube lejátszó" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="container" style="text-align: center;">
        <h2><b>Látogasd meg a YouTube <br>csatornánkat is!</b></h2>
        <a href="https://www.youtube.com/@vaszilijedc6737" target="_blank">YouTube csatorna megtekintése</a>
    </div>
</section>




    <section class="section" id="explore">
    <h2 style="text-align: center;">Elérhetőségeink</h2>
    <div class="container">
        
        
        <div class="row" style="display: flex; justify-content: space-around; align-items: center;">
            <div class="col-lg-3" style="text-align: center;">
                <div class="inner-content">
                    <ul>
                        <li><a href="https://www.facebook.com/VaszilijEdc/?locale=hu_HU"><img src="assets/images/facebook.png"></a></li>
                    </ul>
                    <div class="down-content">
                        <h4>Facebook</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" style="text-align: center;">
                <div class="inner-content">
                    <ul>
                        <li><a href="https://hu.pinterest.com/vaszilijedc/"><img src="assets/images/Pinterest.png"></a></li>
                    </ul>
                    <div class="down-content">
                        <h4>Pinterest</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





    <?php include 'footer.php'; ?>

    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
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
    <script src="assets/js/custom.js"></script>

    <script>
    $(function() {
        var selectedClass = "";
        $("p").click(function() {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("." + selectedClass).fadeOut();
            setTimeout(function() {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });
    </script>
<script>
// Flash üzenet eltüntetése pár másodperc után
document.addEventListener("DOMContentLoaded", function() {
    var flashMessage = document.getElementById('flash-message');
    if (flashMessage) {
        setTimeout(function() {
            flashMessage.style.transition = "opacity 0.5s ease";
            flashMessage.style.opacity = 0;
            setTimeout(function() {
                flashMessage.remove();
            }, 500);
        }, 3000);
    }
});
</script>

</body>

</html>
