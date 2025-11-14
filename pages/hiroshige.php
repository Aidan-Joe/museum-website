
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiroshige</title>
    <link rel="stylesheet" href="../assets/css/hiroshige.css">

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
                        <h1>Hiroshige</h1>
                        <h3>Join Hiroshige on a lyrical journey through Edo Japan, exploring the natural beauty of the landscape and the pleasures of urban life.</h3>

                        <p>   The first exhibition on Hiroshige to be held at the British Museum, and the first on the artist in London for more than a quarter of a century, this is a visually stunning portrait of a country about to change forever. Born during an unsettled time in Japan's history, Utagawa Hiroshige (1797–1858) went on to become one of the country's most talented, prolific and popular artists. As Japan confronted the encroaching outside world, Hiroshige's calm artistic vision connected with – and reassured – people at every level of society.
                            
                            From fashionable figures and energetic city views to remote landscapes and impressions of the natural world, Hiroshige captured many aspects of life in the Japan of his time. Stunning bird-and-flower prints reveal his poetic feeling for nature while his evocative landscapes reflected the growing interest in travel across Japan. Hiroshige portrayed his world sometimes as it was, but often the way he imagined it could be. 
                            
                            Possessed of remarkable technical skills, both as a colourist and draftsman, Hiroshige had a sympathetic regard for people from all walks of life. Unlike most other print designers of his day, he came from a samurai family, but crossed social boundaries to devote himself to depicting popular customs. His work was affordable, too – along with celebrated landscape prints, he also designed hundreds of hand-held, disposable fans that were available to all.
                            
                            The exhibition features prints, drawings, illustrated books and paintings from the British Museum collection, as well as a significant gift and loan of prints from Alan Medaugh, a major US collector of Hiroshige's work, and other important loans. As well as exploring Hiroshige's incredible body of work, this show considers his global legacy, which spans from Japan's Edo period (1615–1868) through to Vincent van Gogh and contemporary artists such as Julian Opie.</p>
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
                    <h3>Exhibitions</h3>
                    <ul>
                        <li><a href="#">Museum map</a></li>
                        <li><a href="#">Visit</a></li>
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

