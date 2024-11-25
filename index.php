<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <a href="./" class="logo" id="logo-text">
            <i class="fa fa-server"></i> IT atbalsts
        </a>
        <div class="apply">
            <a class="btn" id="create-ticket-btn" data-target="#modal-ticket">Izveidot pieteikumu</a>
            <a class="btn active" id="buy-pro-btn" data-target="#modal-pro">Iegādāties PRO</a>
            
        </div>
    </header>
    
    <section class="info" id="home">
        <div class="content">
            <h1 id="main-title">Uzticams IT atbalsts</h1>
            <p id="main-description">Sniedzam kvalitatīvu IT atbalstu privātpersonām un uzņēmumiem dažādās problēmsituācijās ar datoru, tā perifērijas ierīcēm, programmatūru un internetu gan attālināti, gan dodoties pie klienta klātuienē. Iesniedz savu pieteikumu un mēs ar Jums sazināsimies!</p>
            <a class="btn active" data-target="#modal-ticket" id="create-ticket-link">
                <i class="fa fa-check-circle"></i> Izveidot pieteikumu
            </a>
        </div>
        <div class="image">
            <img src="images/main.png" alt="">
        </div>
    </section>
    
    <section class="services">
        <h1 id="services-title">Mūsu piedāvātie <span>pakalpojumi</span></h1>
        <div class="box-container">
            <div class="box">
                <i class="fa fa-desktop"></i>
                <h2 id="service-1">Pakalpojums 1</h2>
                <p id="service-1-desc">Apraksts par konkrēto pakalpojumu</p>
            </div>
            <div class="box">
                <i class="fa fa-download"></i>
                <h2 id="service-2">Pakalpojums 2</h2>
                <p id="service-2-desc">Apraksts par konkrēto pakalpojumu</p>
            </div>
            <div class="box">
                <i class="fa fa-wifi"></i>
                <h2 id="service-3">Pakalpojums 3</h2>
                <p id="service-3-desc">Apraksts par konkrēto pakalpojumu</p>
            </div>
            <div class="box">
                <i class="fa fa-server"></i>
                <h2 id="service-4">Pakalpojums 4</h2>
                <p id="service-4-desc">Apraksts par konkrēto pakalpojumu</p>
            </div>
        </div>
    </section>
    
    <section class="info" id="pro">
        <div class="image">
            <img src="images/pro.png" alt="">
        </div>
        <div class="content">
            <h1 id="pro-plan-title">Iegādājies <span>PRO</span> plānu</h1>
            <p id="pro-plan-description">Izvēlies maksas plānu PRO, mūsu speciālisti ar Jums sazināsies daudz ātrāk nekā tas ir bezmaksas versijā! Turklāt visiem klātienes pakalpojumiem tiks piešķirta 50% atlaide.</p>
            <a class="btn active" id="buy-pro-link" data-target="#modal-pro">
                <i class="fa fa-check-circle"></i> Iegādāties PRO tikai par 99<sup>99</sup> EUR/gadā
            </a>
        </div>
    </section>

    <section class="review">
        <h1 id="reviews-title">Klientu <span>atsauksmes</span></h1>
        <div class="box-container">
            <div class="box">
                <i class="fa-solid fa-quote-left quote-icon"></i>
                <p id="review-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore sint vitae corporis impedit ducimus doloremque exercitationem modi eum magnam laboriosam? Ea ipsa quasi similique minus, modi non voluptatum. Necessitatibus, ipsam?</p>
                <hr>
                <div class="profile">
                    <div class="name-rating">
                        <h2 id="reviewer-1-name">Andrejs Zariņš</h2>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <img src="images/team/team-2.jpg" alt="">
                </div>
            </div>
            <div class="box">
                <i class="fa-solid fa-quote-left"></i>
                <p id="review-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?</p>
                <hr>
                <div class="profile">
                    <div class="name-rating">
                        <h2 id="reviewer-2-name">Jānis Kļaviņš</h2>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <img src="images/team/team-3.jpg" alt="">
                </div>
            </div>
            <div class="box">
                <i class="fa-solid fa-quote-left"></i>
                <p id="review-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?</p>
                <hr>
                <div class="profile">
                    <div class="name-rating">
                        <h2 id="reviewer-3-name">Agnese Lapiņa</h2>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <img src="images/team/team-4.jpg" alt="">
                </div>
            </div>
            <div class="box">
                <i class="fa-solid fa-quote-left"></i>
                <p id="review-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit deserunt, corrupti natus voluptatem animi minima quidem officia voluptatum enim et corporis dolorum explicabo magnam placeat?</p>
                <hr>
                <div class="profile">
                    <div class="name-rating">
                        <h2 id="reviewer-4-name">Kārlis Liepiņš</h2>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half"></i>
                        </div>
                    </div>
                    <img src="images/team/team-5.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section languages">
                <h3 id="languages-title">Valodas</h3>
                <ul>
                    <li><a href="#" class="language-option" data-lang="lv"><i class="fa-solid fa-location-dot"></i>Latviešu</a></li>
                    <li><a href="#" class="language-option" data-lang="en"><i class="fa-solid fa-location-dot"></i>Angļu</a></li>
                    <li><a href="#" class="language-option" data-lang="ru"><i class="fa-solid fa-location-dot"></i>Krievu</a></li>
                </ul>
            </div>            
            <div class="footer-section contact">
                <h3 id="contact-title">Kontakti</h3>
                <ul>
                    <li><i class="fa-solid fa-phone"></i><span id="contact-phone">+371 29 999 999</span></li>
                    <li><i class="fa-solid fa-envelope"></i><span id="contact-email">it@atbalsts.lv</span></li>
                    <li><i class="fa-solid fa-location-dot"></i><span id="contact-address">Ventspils iela 51, Liepāja</span></li>
                </ul>
                <button class="contact-button" id="contact-button">Kontaktforma saziņai</button>
            </div>
            <div class="footer-section social">
                <h3 id="social-title">Seko mums</h3>
                <ul class="social-icons">
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p id="footer-copyright">Visas autortiesības aizsargātas - IT atbalsts © 2024</p>
        </div>
    </footer>

    <!-- Modal for ticket creation -->
    <div class="modal" id="modal-ticket">
        <div class="modal-box">
            <div class="close-modal" data-target="#modal-ticket">
                <i class="fa fa-times"></i>
            </div>
            <h2 id="modal-title">Izveidot jaunu pieteikumu</h2>
            <form action="pieteikumi.php" method="POST">
                <label for="name" id="modal-vards">Vārds:</label>
                <input type="text" id="name" name="vards" required>
                <label for="surname" id="modal-uzvards">Uzvārds:</label>
                <input type="text" id="surname" name="uzvards" required>
                <label for="email" id="modal-epasts">E-pasta adrese:</label>
                <input type="email" id="email" name="epasts" required>
                <label for="phone" id="modal-tel">Tālruņa numurs:</label>
                <input type="tel" id="phone" pattern="[0-9]{8}" name="talrunis" required>
                <label for="description" id="modal-desc">Problēmas / veicamā uzdevuma apraksts:</label>
                <textarea id="description" name="apraksts" rows="4" required></textarea>
                <button type="submit" name="nosutit" class="btn active" id="submit-button">Nosūtīt</button>
            </form>
        </div>
     </div>
         <!-- Modal for ticket creation -->
    <div class="modal" id="modal-pro">
        <div class="modal-box">
            <div class="close-modal" data-target="#modal-pro">
                <i class="fa fa-times"></i>
            </div>
            <h2>Iegādājies <span>PRO</span> plānu!</h2>
            <div class="buy-pro">
                <p>Ieguvumi iegādājoties PRO versiju:</p>
                <ul>
                    <li><i class="fa-solid fa-check"></i>Komunikācija ar klientudažu minūsu laikā!</li>
                    <li><i class="fa-solid fa-check"></i>50% atlade visiem klatienes pakalpojumiem</li>
                    <li><i class="fa-solid fa-check"></i>Pieteikumu statusa un vēstures aplūkošana</li>
                </ul>
            </div>
            <div class="buy-pro">
                Cena 99.99 EUR/gadā
            </div>

            <a href="" class="btn-active">Iegādājies jau tagad!</a>
        </div>
     </div>

     <?php
        if(isset($_SESSION['pazinojums'])):
     ?>

     <div class="modal modal-active" id="modal-message">
        <div class="modal-box">
            <div class="close-modal" data-target="#modal-message">
                <i class="fa fa-times"></i>
            </div>
            <div id="">
                <?php
                    echo $_SESSION['pazinojums'];
                    unset($_SESSION['pazinojums']);
                ?>

        </div>
        </div>
     </div>
     <?php
        endif;
        ?>
</body>
</html>
