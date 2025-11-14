<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goblet</title>
    <link rel="stylesheet" href="../assets/css/gobletstyle.css">

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
                        <h1>Ancient Goblets</h1>
                        <p>The British Museum's collection includes a fascinating variety of goblets from different cultures and historical periods, each telling a unique story of craftsmanship, luxury, and social customs. Goblets, often associated with feasting and ceremonial events, have been made from materials ranging from glass and clay to gold and silver. These drinking vessels were not just practical objects but also symbols of status and artistry.<br>  

                            <br>Ancient Egyptian goblets, for example, were often crafted from alabaster and decorated with intricate carvings of lotus flowers, a symbol of rebirth and the sun. These goblets were used in both daily life and religious rituals, reflecting the Egyptians' belief in the connection between the physical and spiritual worlds. In contrast, Roman goblets, particularly those made from blown glass, displayed remarkable advancements in glassmaking techniques, allowing for more elaborate designs and vibrant colors.<br>  
                            
                            <br>Medieval and Renaissance goblets found in the museum showcase the evolution of European craftsmanship. Many were adorned with enamel, precious stones, and detailed engravings, often featuring coats of arms or biblical scenes. These goblets were reserved for the wealthy and used in banquets or as diplomatic gifts, symbolizing power and prestige. Some even had lids or stemmed bases to prevent spillage, emphasizing their luxurious nature.<br>  
                            
                            <br>The goblets in the British Museum highlight the universal human tradition of communal drinking and celebration. Whether used in sacred rituals, royal feasts, or everyday gatherings, these vessels provide insight into the social and artistic values of past civilizations. Their enduring beauty and significance make them treasured artifacts that continue to captivate visitors.<br>  
                            
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
