<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yobalema</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
    rel="stylesheet">
</head>

<body>

  <!--
    - #HEADER
  -->

  <header class="header" data-header>

    <div class="container">

      <div class="overlay" data-overlay></div>

     <!-- <a href="#" class="logo">
        <img src="./assets/images/logo.svg" alt="Ridex logo">
      </a> -->

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li>
            <a href="#home" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li>
            <a href="#featured-car" class="navbar-link" data-nav-link>Explore cars</a>
          </li>

          <li>
            <a href="#about" class="navbar-link" data-nav-link>About us</a>
          </li>

          <li>
            <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
          </li>

        </ul>
      </nav>

      <div class="header-actions">

        <div class="header-contact">
          <a href="tel:88002345678" class="contact-link">+221 77 419 19 26</a>

          <span class="contact-time">Mon - Sat: 9:00 am - 6:00 pm</span>
        </div>

        <a href="#featured-car" class="btn" aria-labelledby="aria-label-txt">
          <ion-icon name="car-outline"></ion-icon>

          <span id="aria-label-txt">Explorer les voitures</span>
        </a>

        <a href="/login" class="btn user-btn" aria-label="Profile">
          <ion-icon name="person-outline"></ion-icon>
        </a>


        <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
          <span class="one"></span>
          <span class="two"></span>
          <span class="three"></span>
        </button>

      </div>

    </div>
  </header>





  <main>
    <article>

      <!--
        - #HERO
      -->

      <section class="section hero" id="home">
        <div class="container">

          <div class="hero-content">
            <h2 class="h1 hero-title">Yobalema</h2>

            <p class="hero-text">
                Profitez de nos services dans tous les 14 régions du Sénegal !!!
            </p>
          </div>

          <div class="hero-banner"> </div>

         <!-- <form action="" class="hero-form">

            <div class="input-wrapper">
              <label for="input-1" class="input-label">Car, model, or brand</label>

              <input type="text" name="car-model" id="input-1" class="input-field"
                placeholder="What car are you looking?">
            </div>

            <div class="input-wrapper">
              <label for="input-2" class="input-label">Max. monthly payment</label>

              <input type="text" name="monthly-pay" id="input-2" class="input-field" placeholder="Add an amount in $">
            </div>

            <div class="input-wrapper">
              <label for="input-3" class="input-label">Make Year</label>

              <input type="text" name="year" id="input-3" class="input-field" placeholder="Add a minimal make year">
            </div>

            <button type="submit" class="btn">Search</button>

          </form> -->

        </div>
      </section>





      <!--
        - #FEATURED CAR
      -->

      <section class="section featured-car" id="featured-car">
    <div class="container">
        <div class="title-wrapper">
            <h2 class="h2 section-title">Nos Voitures</h2>
        </div>

        <ul class="featured-car-list">
            @foreach ($vehicules as $vehicule)
            <li>
                <div class="featured-car-card">
                    <figure class="card-banner">
                        <img src="{{ asset('uploads/vehicules/' . $vehicule->photo) }}" alt="{{ $vehicule->marque }}" loading="lazy" width="440" height="300" class="w-100">
                    </figure>
                    <div class="card-content">
                        <div class="card-title-wrapper">
                            <h3 class="h3 card-title">
                                <a href="#">{{ $vehicule->marque }}</a>
                            </h3>
                        </div>
                        <ul class="card-list">
                            <li class="card-list-item">
                                <ion-icon name="car-outline"></ion-icon>
                                <span class="card-item-text">{{ $vehicule->place }} places</span>
                            </li>
                            <li class="card-list-item">
                                <ion-icon name="calendar-outline"></ion-icon>
                                <span class="card-item-text">Date achat: {{ $vehicule->date }}</span>
                            </li>
                            <li class="card-list-item">
                                <ion-icon name="speedometer-outline"></ion-icon>
                                <span class="card-item-text">{{ $vehicule->kilometre }}km / 1-litre</span>
                            </li>
                            <li class="card-list-item">
                                <ion-icon name="hardware-chip-outline"></ion-icon>
                                <span class="card-item-text">{{ $vehicule->etat }}</span>
                            </li>
                            <li class="card-list-item">
                                <ion-icon name="person-outline"></ion-icon>
                                <span class="card-item-text">chauffeur: {{ $vehicule->chauffeur->nom }}</span>
                            </li>
                            <li class="card-list-item">
                                <ion-icon name="car-outline"></ion-icon>
                                <span class="card-item-text">{{ $vehicule->matricule }}</span>
                            </li>
                        </ul>
                        <div class="card-price-wrapper">
                            <p class="card-price">
                                <strong>{{ $vehicule->prix }}fCFA / heure</strong>
                            </p>
                            <button class="btn"><a href="/client">Location</a></button>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>






      <!--
        - #GET START
      -->
      <section class="section get-start" id="about">
        <div class="container">

          <h2 class="h2 section-title">Commencez en 4 étapes simples</h2>

          <ul class="get-start-list">

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-1">
                  <ion-icon name="car-outline"></ion-icon>
                </div>

                <h3 class="card-title">Consultez notre flotte de voitures</h3>

                <p class="card-text">
                  Parcourez notre sélection de voitures disponibles avec chauffeur et choisissez celle qui correspond le mieux à vos besoins.
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-2">
                  <ion-icon name="person-outline"></ion-icon>
                </div>

                <h3 class="card-title">Réservez votre chauffeur</h3>

                <p class="card-text">
                  Choisissez votre voiture et réservez-le pour la date et l'heure de votre choix.
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-3">
                  <ion-icon name="card-outline"></ion-icon>
                </div>

                <h3 class="card-title">Finalisez votre réservation</h3>

                <p class="card-text">
                  Finalisez votre réservation et préparez-vous à profiter d'un voyage confortable et sécurisé avec nos chauffeurs professionnels.
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-4">
                  <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                </div>

                <h3 class="card-title">Besoin d'aide?</h3>

                <p class="card-text">
                  Si vous avez des questions ou avez besoin d'aide pour votre réservation, n'hésitez pas à nous contacter. Notre équipe est là pour vous aider.
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>


    </article>
  </main>





  <!--
    - #FOOTER
  -->

  <footer class="footer" >
    <div class="container">

      <div class="footer-top">


      </div>

      <div class="footer-bottom">

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-skype"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="mail-outline"></ion-icon>
            </a>
          </li>

        </ul>

        <p class="copyright">
          &copy; 2022 <a href="#">codewithsadee</a>. All Rights Reserved
        </p>

      </div>

    </div>
  </footer>





  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
