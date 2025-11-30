<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Africa</title>
    <link rel="stylesheet" href="../assets/css/africastyle.css">

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
                <a href="#">MUSEUM-BEKASI</a>
            </li>
            <li class="toggle" id="toggle-menu">
                <img src="assets/img/burger-menu.png" alt="Bars">
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
                        <h1>Africa</h1>
                        <p>Africa's rich and diverse history is beautifully reflected in the British Museum’s extensive collection. Spanning thousands of years, the artifacts showcase the continent’s deep cultural heritage, artistic mastery, and historical complexity. From ancient kingdoms to contemporary traditions, these objects tell powerful stories of resilience, innovation, and artistic excellence.<br> 

                            <br>Among the highlights of the collection are the exquisite bronze castings from Igbo-Ukwu, Ife, and Benin. These remarkable works of art demonstrate the skill and craftsmanship of African metalworkers, who used advanced techniques long before similar practices emerged in Europe. Additionally, the collection includes artifacts related to the ritual of masquerade, a cultural performance deeply rooted in African traditions. These ceremonies are not merely theatrical displays but are also sacred rituals that convey hidden knowledge, honor ancestors, and reinforce social values.<br>  
                            
                            <br>Visitors can explore these fascinating objects and stories through the museum’s galleries, exhibitions, and digital content. Whether examining intricate carvings, textiles, or ceremonial masks, each artifact provides a window into Africa’s dynamic past and evolving present. By engaging with these collections, visitors gain a deeper appreciation for the artistic and cultural contributions of African civilizations throughout history.<br>
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
