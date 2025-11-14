<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galleries</title>
    <link rel="stylesheet" href="../assets/css/galleries.css">

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
                        <h1>Galleries</h1>
                        <p>Explore more than 60 galleries at the British Museum from home.

                            Our gallery pages feature a range of exciting resources, including virtual tours with Google
                            Street View, object highlights, timelines, family activities and facts.

                            Below you'll find a list of galleries on the lower floor, ground floor and upper floors,
                            together with two galleries created especially for our online audience, Oceania and Prints
                            and Drawings.

                            Please note that galleries in the Museum may be closed for maintenance, refurbishment or
                            private events. All planned closures will be listed on the Visit page. Occasionally we may
                            need to close galleries at short notice for safety reasons. We regret that in these cases
                            we're not always able to alert the public in advance.</p>
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