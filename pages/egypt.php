<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Egypt</title>
    <link rel="stylesheet" href="../assets/css/egyptstyle.css">

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
                <a href="#">MUSEUM BEKASI</a>
            </li>
            <li class="toggle" id="toggle-menu">
                <img src="/img/burger-menu.png" alt="Bars">
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
                        <h1>Ancient Egypt</h1>
                        <p>Egypt's rich and captivating history continues to fascinate visitors from around the world. The British Museum houses some of the most significant artifacts from ancient Egypt, each telling a unique story of a civilization that thrived for thousands of years. From monumental statues to intricate jewelry, these objects offer a glimpse into the daily lives, beliefs, and artistic achievements of the ancient Egyptians.<br>

                            <br>One of the most famous artifacts in the museum’s collection is the Rosetta Stone, a crucial key in deciphering Egyptian hieroglyphs. This iconic tablet has drawn millions of visitors and remains one of the most studied pieces in the field of Egyptology. Its inscriptions in three different scripts—hieroglyphic, Demotic, and Greek—allowed scholars to unlock the secrets of the ancient Egyptian language, paving the way for a deeper understanding of their culture and history.<br>

                            <br>Beyond the Rosetta Stone, the museum provides numerous resources for those eager to learn more about Egypt’s past and present. Through videos, blog posts, and collection highlights, visitors can explore various aspects of Egyptian civilization, from the grandeur of the pharaohs to the everyday lives of ordinary citizens. Whether visiting in person or exploring online, there is always something new to discover about this extraordinary civilization.<br>
                        </p>
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
