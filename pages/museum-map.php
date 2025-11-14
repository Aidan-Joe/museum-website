<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum Map</title>
    <link rel="stylesheet" href="../assets/css/museum-map.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <nav>
        <ul class="navbar-list">
            <li class="logo">
                <a href="/view/index.html">MUSEUM BEKASI</a>
            </li>
            <li class="toggle" id="toggle-menu">
                <img src="/img/burger-menu.png" alt="Bars">
            </li>
            <div class="nav-items" id="nav-items">
                <li class="navbar-item">
                    <a href="/view/index.html#exhibition" class="navbar-link">Exhibition</a>
                </li>
                <li class="navbar-item">
                    <a href="/view/index.html#visit" class="navbar-link">Visit</a>
                </li>
                <li class="navbar-item">
                    <a href="/view/index.html#collection" class="navbar-link">Collection</a>
                </li>
                <li class="navbar-item">
                    <a href="/view/index.html#shop" class="navbar-link">Shop</a>
                </li>
                <li class="navbar-item">
                    <a href="https://wa.me/6281586756523?text=Halo+kamu+mau+order+tiket+museum+ya+?"
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

    </header>
    <main>
        <article>
            <div class="card-container">
                <div class="text-container">
                    <div class="left-container">
                        <h1>Museum Map</h1>
                        <p>Explore the Museum and enjoy incredible cultures from around the world.

                            Discover ancient Egypt, Assyria and the Mediterranean and connect with objects including the
                            Bust of Ramesses II, the Lewis Chessmen and the Oxus Treasure from ancient Iran. Experience
                            the rich and diverse history and cultures of Africa, before journeying across North America
                            to the ancient civilisations of Mexico.</p>
                    </div>

                </div>
            </div>
        </article>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">

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