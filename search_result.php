<?php
session_start();

// Keresett kifejezés
$keresett = isset($_GET['q']) ? trim($_GET['q']) : '';

if (empty($keresett)) {
    echo "Nincs megadva keresési kifejezés!";
    exit;
}

// A vizsgálandó fájlok listája és a hozzájuk tartozó adatok
$oldalak = [
    'we-banter-ujratoltve.php' => [
        'cim' => 'We Banter - Újratöltve',
        'datum' => 'ápr 20, 2025 | Novella',
        'kep' => 'assets/images/we_banter.jpeg',
        'link' => 'we-banter-ujratoltve.php'
    ],
    'lali-szamurajkardja.php' => [
        'cim' => 'Lali szamurájkardja',
        'datum' => 'ápr 6, 2025 | Egyéb',
        'kep' => 'assets/images/lali.jpg',
        'link' => 'lali-szamurajkardja.php'
    ],
    'olcso-janos-turazni-megy.php' => [
        'cim' => 'Olcsó János túrázni megy!',
        'datum' => 'márc 23, 2025 | Egyéb',
        'kep' => 'assets/images/olcso_janos.jpeg',
        'link' => 'olcso-janos-turazni-megy.php'
    ],
    'modern-slip.php' => [
        'cim' => 'Modern slip jointok-régi nóta újra hangszerelve',
        'datum' => 'márc 8, 2025 | Egyéb',
        'kep' => 'assets/images/modern_slip.jpeg',
        'link' => 'modern-slip.php'
    ],
    'olfa-ck-2.php' => [
        'cim' => 'Olfa CK-2 Kés helyett sniccer?',
        'datum' => 'jan 12, 2025 | Egyéb',
        'kep' => 'assets/images/olfa.jpg',
        'link' => 'olfa-ck-2.php'
    ]
];

// Találatok
$talalatok = [];

foreach ($oldalak as $fajl => $adatok) {
    if (file_exists($fajl)) {
        $tartalom = file_get_contents($fajl);

        if (stripos($tartalom, $keresett) !== false) {
            $talalatok[] = $adatok;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <title>Vaszilij EDC</title>
    <link rel="icon" type="image/jpg" href="assets/images/Logo_nagy.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <section class="section" style="padding-top: 120px; padding-bottom: 60px;">
        <div class="container">
            <h1 class="mb-5">Keresési eredmények: "<?php echo htmlspecialchars($keresett); ?>"</h1>

            <?php if (!empty($talalatok)): ?>
            <div class="row">
                <?php foreach ($talalatok as $talalat): ?>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="<?php echo $talalat['kep']; ?>" class="card-img-top"
                            alt="<?php echo htmlspecialchars($talalat['cim']); ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo htmlspecialchars($talalat['cim']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($talalat['datum']); ?></p>
                            <a href="<?php echo $talalat['link']; ?>" class="btn mt-auto"
                                style="background: linear-gradient(135deg, #666666, #999999); border: none; color: white; font-weight: bold; padding: 10px 20px; border-radius: 50px; transition: all 0.3s ease;">
                                Elolvasom!
                            </a>

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="alert alert-warning mt-4">
                Nem található eredmény a keresett kifejezésre.
            </div>
            <?php endif; ?>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>