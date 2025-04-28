<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- Logo -->
                    <a href="index.php" class="logo">
                        <img src="assets/images/Logo_nagy_fehér.jpg" height="80px" width="80px" >
                    </a>
                    <ul class="nav">
                        
                    <?php if (isset($_SESSION['username'])): ?>
                            <li><a href="#">Bejelentkezve mint: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></a></li>
                            <li><a href="logout.php">Kijelentkezés</a></li>
                        <?php else: ?>
                            <li><a href="login_page.php">Bejelentkezés</a></li>
                            <li><a href="register_page.php">Regisztráció</a></li>
                        <?php endif; ?>
                    </ul>
                    <!-- Menü -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="index.php">Kezdőlap</a></li>
                        <li class="scroll-to-section"><a href="contact.php">Üzenetküldés</a></li>
                        <li class="scroll-to-section"><a href="support.php">Támogatás</a></li>
                        <li class="scroll-to-section"><a href="blog.php">Blog</a></li>


                        <li class="submenu">
                            <a href="javascript:;">Írások</a>
                            <ul>
                                <li><a href="#">Novella</a></li>
                                <li><a href="#">Egyéb</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>