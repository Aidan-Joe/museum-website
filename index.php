<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Javascript -->
    <script src="assets/js/javascript.js"></script>
</head>

<body>
    <!-- Navbar -->
    </head>

    <body>
        <nav>
            <ul class="navbar-list">
                <li class="logo">
                    <a href="#">MUSEUM BEKASI</a>
                </li>
                <li class="toggle" id="toggle-menu">
                    <img src="img/burger-menu.png" alt="Bars">
                </li>
                <div class="nav-items" id="nav-items">
                    <li class="navbar-item">
                        <a href="#exhibition" class="navbar-link">Exhibition</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#visit" class="navbar-link">Visit</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#collection" class="navbar-link">Collection</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#shop" class="navbar-link">Shop</a>
                    </li>
                    <li class="navbar-item">
                        <a href="login/login_member.php"
                            class="navbar-button" target="_blank">Book Ticket</a>
                    </li>
                </div>
            </ul>
        </nav>

        <script>
            document.getElementById('toggle-menu').addEventListener('click', function () {
                document.getElementById('nav-items').classList.toggle('active');
            });
        </script>
        <!-- End Navbar -->
        <!-- Header -->
        <header>
            <div class="video-container">
                <video autoplay loop muted playsinline>
                    <source src="assets/video/bg-video.mp4" type="video/mp4">
                </video>
            </div>
            <div class="container header__container">
                <div class="header__content">
                    <h1 class="header__title">WELCOME TO<br>MUSEUM EXHIBITION</h1>
                    <p class="header__text">Exhibition Every Rare Species in Bekasi</p>
                    <a href="#exhibition" class="btn_mulai">⬇ Start</a>
                </div>
            </div>
        </header>
        <main>
            <article>
                <div class="card-container">
                    <div class="text-container">
                        <div class="left-container">
                            <h1>Discover two million years if human<br>history and culture</h1>
                        </div>
                        <div class="right-container">
                            <div class="entry">
                                <i class="uil uil-ticket"></i>
                                Free entry - <a href="#" class="book-online">book online</a>
                            </div>
                            <div class="today">
                                <i class="uil uil-clock"></i>
                                Open today: 10.00 - 17.00
                            </div>
                            <div class="entry">
                                <i class="uil uil-clock"></i>
                                Last entry 16.45
                            </div>
                        </div>
                    </div>
                    <div class="horizontal-line"></div>
                </div>
            </article>
        </main>
        <!-- End Header -->

        <!-- British Shop -->

        <!-- Exhibitions -->
        <div id="exhibition"></div>
        <section class="exhibitions">
            <h2>Exhibitions</h2>
            <div class="exhibition-container">
                <a href="pages/picasso.php">
                    <div class="exhibition-item black">
                        <h3>Picasso</h3>
                        <p class="highlight">printmaker</p>
                        <p class="exhibition-info">Exhibition<br>7 November 2024 – 30 March 2025</p>
                        <span class="badge red">Final weeks</span>
                        <img class="exhibition-image" src="assets/img/img-picasso.jpg" alt="Picasso artwork">
                    </div>
                </a>
                <a href="pages/hiroshige.php">
                    <div class="exhibition-item dark-gray">
                        <h3>Hiroshige</h3>
                        <p class="highlight">artist of the open road</p>
                        <p class="exhibition-info">Exhibition<br>1 May – 7 September 2025</p>
                        <span class="badge dark-gray">Book now</span>
                        <img class="exhibition-image" src="assets/img/img-hiroshige.jpg" alt="Hiroshige artwork">
                    </div>
                </a>
                <a href="pages/ancient-india.php">
                    <div class="exhibition-item yellow">
                        <h3>Old India</h3>
                        <p class="highlight">living traditions</p>
                        <p class="exhibition-info">Exhibition<br>22 May – 19 October 2025</p>
                        <span class="badge yellow">Book now</span>
                        <img class="exhibition-image" src="assets/img/img-ancient-india.jpg" alt="Ancient India artwork">
                    </div>
                </a>
            </div>
        </section>
        <!-- End of exhibition -->

        <!-- Visit -->
        <div id="visit"></div>
        <section class="visit-section">
            <h2>Visit the Museum</h2>
            <div class="visit-container">
                <a href="pages/visit.php">
                    <div class="visit-card">
                        <img src="assets/img/img-plan-your-visit.jpg" alt="Plan your visit">
                        <div class="visit-content">
                            <h3>Plan your visit</h3>
                            <p>Book tickets and plan your day including exhibitions, facilities, access, food, and travel.
                            </p>
                        </div>
                    </div>
                </a>
                <a href="pages/museum-map.php">
                    <div class="visit-card">
                        <img src="assets/img/img-museum-map.jpg" alt="Museum map">
                        <div class="visit-content">
                            <h3>Museum map</h3>
                            <p>Navigate the Museum with ease, using our floor-by-floor plan and discover what not to miss.
                            </p>
                        </div>
                    </div>
                </a>
                <a href="pages/galleries.php">
                    <div class="visit-card">
                        <img src="assets/img/img-galleries.jpg" alt="Galleries">
                        <div class="visit-content">
                            <h3>Galleries</h3>
                            <p>Walk through two million years of history and culture across more than 50 galleries.</p>
                        </div>
                    </div>
                </a>
                <a href="pages/family-visit.php">
                    <div class="visit-card">
                        <img src="assets/img/img-family-visit.jpg" alt="Family visits">
                        <div class="visit-content">
                            <h3>Family visits</h3>
                            <p>From family facilities to activities and events, discover how to make the most of your day at
                                the Museum.</p>
                        </div>
                    </div>
                </a>
            </div>
        </section>
        <!-- End of Visit -->

        <!-- Collection -->
        <div id="collection"></div>
        <section class="collection">
            <h2>Explore the collection <a href="#" class="see-all">See all →</a></h2>
            <div class="carousel-container">
                <div class="carousel">
                    <button class="prev">&#10094;</button>
                    <div class="carousel-track">
                        <a href="pages/egypt.php">
                            <div class="carousel-item">
                                <h3>Egypt</h3>
                                <img src="assets/img/mummy.png" alt="Egyptian Mask">
                            </div>
                        </a>
                        <a href="pages/africa.php">
                            <div class="carousel-item">
                                <h3>Africa</h3>
                                <img src="assets/img/african.png" alt="African Container">
                            </div>
                        </a>
                        <a href="pages/animal.php">
                            <div class="carousel-item">
                                <h3>South Cat</h3>
                                <img src="assets/img/southcat.png" alt="Ceramic Cat">
                            </div>
                        </a>
                        <a href="pages/mummy.php">
                            <div class="carousel-item">
                                <h3>Inner Coffin</h3>
                                <img src="assets/img/inner-coffin.jpg" alt="Ceramic Cat">
                            </div>
                        </a>
                        <a href="pages/goblet.php">
                            <div class="carousel-item">
                                <h3>Goblet</h3>
                                <img src="assets/img/goblet.png" alt="Ceramic Cat">
                            </div>
                        </a>
                        <a href="pages/papua.php">
                            <div class="carousel-item">
                                <h3>Papua Shield</h3>
                                <img src="assets/img/shield.jpg" alt="Ceramic Cat">
                            </div>
                        </a>
                    </div>
                    <button class="next">&#10095;</button>
                </div>
            </div>
        </section>
        <!-- End Of Collectiom -->

        <!-- Museum Shop -->
        <div id="shop"></div>
        <section class="shop">
            <h2>Museum Bekasi Shop <a href="#" class="see-all">Shop now →</a></h2>
            <div class="carousel-shop">
                <div class="carousels">
                    <button class="prev">&#10094;</button>
                    <div class="carousel-tracks">
                        <div class="carousels-item" a href>
                            <h3>Inspired by the Museum</h3>
                            <img src="assets/img/inspire-british.jpg" alt="Inspired British">
                        </div>
                        <div class="carousels-item">
                            <h3>Inspired by Sutton Hoo</h3>
                            <img src="assets/img/helmet.jpg" alt="Helmet Sutton Hoo">
                        </div>
                        <div class="carousels-item">
                            <h3>Inspired by Cats</h3>
                            <img src="assets/img/japan-cat.png" alt="Inspired Cats">
                        </div>
                        <div class="carousels-item">
                            <h3>Inspired by Hokusai</h3>
                            <img src="assets/img/hokusai.jpg" alt="Inspired by Hokusai">
                        </div>
                        <div class="carousels-item">
                            <h3>Inspired by Ancient Egypt</h3>
                            <img src="assets/img/ancient.png" alt="Ancient Egypt">
                        </div>
                    </div>
                    <button class="next">&#10095;</button>
                </div>
            </div>
        </section>
        <!-- End Museum Shop -->

        <!-- Footer -->
        <footer>
            <div class="footer-container">

                <div class="upper-footer">
                    <h3 class="footer-title">Connect with us</h3>
                    <div class="social-links">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-youtube"></ion-icon></a>
                    </div>

                    <div class="newsletter">
                        <label for="email">Subscribe to receive our newsletter</label>
                        <input type="email" id="email" placeholder="Your email">
                        <button>Sign up</button>
                    </div>
                </div>

                <div class="footer-columns">
                    <div class="column">
                        <h3>Free entry</h3>
                        <p>Great Joe Street, Bekasi</p>
                        <p>+62 815-8675-6523</p>
                    </div>

                    <div class="column">
                        <h3>Opening hours</h3>
                        <p>Daily: 10.00–17.00 (Fridays: 20.30)</p>
                        <p>Last entry: 16.45 (Fridays: 20.15)</p>
                    </div>

                    <div class="column">
                        <h3>About us</h3>
                        <ul>
                            <li><a href="#">Governance</a></li>
                            <li><a href="#">The Bekasi Museum story</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>

                    <div class="column">
                        <h3>Visit</h3>
                        <ul>
                            <li><a href="#">Museum map</a></li>
                            <li><a href="#">Exhibitions and events</a></li>
                            <li><a href="#">Accessibility</a></li>
                            <li><a href="#">Food and drink</a></li>
                            <li><a href="#">Audio guide</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Of Footer -->
    </body>

</html>