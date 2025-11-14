<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit</title>
    <link rel="stylesheet" href="../assets/css/visit.css">

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
                        <h1>Plan your visit</h1>
                        <p>Immerse yourself in two million years of human history, art, and culture. The museum offers a
                            vast collection that showcases the richness of civilizations from around the world. From
                            ancient artifacts to contemporary masterpieces, each exhibit tells a unique story of human
                            creativity and innovation. Visitors can engage with interactive displays, historical
                            documents, and rare objects that provide insights into the evolution of societies over time.

                            Book your free ticket in advance to ensure a seamless experience. By reserving ahead, you
                            will receive key updates before your visit, as well as priority entry during peak hours.
                            Once inside, explore iconic displays such as the Sutton Hoo ship burial, admire the
                            treasures of the Islamic world, and uncover the mysteries of Egyptian mummies. A carefully
                            curated selection of galleries awaits, each offering a distinct journey into different
                            periods and cultures. Please check the list of available galleries to plan your visit
                            accordingly.

                            For those interested in special exhibitions, tickets are now available for exclusive
                            showcases. Experience Picasso: Printmaker until 30 March 2025, dive into Hiroshige: Artist
                            of the Open Road from 1 May to 7 September 2025, and discover Ancient India: Living
                            Traditions from 22 May to 19 October 2025. While every effort is made to keep all galleries
                            accessible, occasional closures may occur at short notice. We appreciate your understanding
                            and look forward to welcoming you for an unforgettable cultural experience.</p>
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