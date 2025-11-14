<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals</title>
    <link rel="stylesheet" href="../assets/css/animalstyle.css">

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
                        <h1>Animals</h1>
                        <p>The British Museum houses a fascinating array of animal depictions, each with its own unique story and cultural significance. Among them, the Gayer-Anderson Cat stands out as one of the most iconic artifacts. This elegant bronze statue, dating back to ancient Egypt, represents the revered feline deity Bastet, symbolizing protection, fertility, and grace. The statue’s finely crafted details, including intricate gold inlays and a protective amulet, highlight the Egyptians' deep admiration for cats and their connection to the divine.<br>  

                            <br>Cats held a special place in Egyptian society, often associated with the goddess Bastet, who was worshipped as a protector of homes and families. The South Cat, a name sometimes used for feline figures discovered in southern Egypt, embodies these sacred qualities. Many such statues were placed in temples or tombs as offerings to gain favor from the gods. Their presence in burial sites also suggests that ancient Egyptians believed cats could serve as guardians in the afterlife, guiding spirits on their journey.<br> 
                            
                            <br>Beyond religious symbolism, these statues reflect the deep bond between humans and cats in daily Egyptian life. Cats were valued for their ability to control pests, making them indispensable companions in households and grain stores. Their loyalty and keen hunting skills elevated their status from practical helpers to divine creatures worthy of artistic representation and reverence.<br>  
                            
                            <br>Visitors to the museum can explore these remarkable feline artifacts and uncover the fascinating role of cats in ancient Egyptian culture. Whether as protective deities, beloved pets, or artistic inspirations, these statues serve as enduring symbols of the admiration and respect that ancient civilizations held for the animal kingdom.<br>
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
