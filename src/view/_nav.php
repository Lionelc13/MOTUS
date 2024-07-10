<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <!-- Bouton toggle pour le menu burger -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/index">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/reglement">Règles du jeu</a>
          </li>
          <?php
          // Utilisateur non connecté
            if (!isset($_SESSION['email'])) {
                echo '<li class="nav-item">
                        <a class="nav-link" href="/connexion">Connexion</a>
                      </li>';
                echo '<li class="nav-item">
                          <a class="nav-link" href="/inscription">Inscription</a>
                      </li>';

            } 
            // Utilisateur connecté
            else {
                echo '<li class="nav-item">
                        <a class="nav-link" href="/jouer">Jouer</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/classement">Classement</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/deconnexion">Déconnexion</a>
                      </li>';
            }
            ?>
        </ul>
      </div>
    </div>
  </nav>
