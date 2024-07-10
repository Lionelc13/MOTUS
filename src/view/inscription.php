<?php
$myTitle = 'inscription';
$myDescription='Inscription des joueurs du jeu Motus';
$myEntete='Formulaire d\'inscription';
require "header.php";
?>  
    <form action="/inscription" method="post" enctype="multipart/form-data">
    <section>
        <div class="entete mx-auto">
        </div>
        <div class="inscription">
            <div class="champs-form">
                <label class="label-formulaire" for="lastname">Nom : </label><input type="text" id="lastname" name="lastname" <?php if (isset($lastname)){ ?>value="<?= $lastname ?>"<?php ;} ?> >
            </div>
            <div class="champs-form">   
                <label class="label-formulaire" for="firstname">Prénom : </label><input type="text" id="firstname" name="firstname" <?php if (isset($firstname)){ ?>value="<?= $firstname ?>"<?php ;} ?> >
            </div>
            <div class="champs-form">   
                <label class="label-formulaire" for="nickname">Surnom : </label><input type="text" id="nickname" name="nickname" <?php if (isset($nickname)){ ?>value="<?= $nickname ?>"<?php ;} ?> >
            </div>
            <div class="champs-form">    
                <label class="label-formulaire" for="email">Email : </label><input type="text" id="email" name="email" <?php if (isset($email)){ ?>value="<?= $email ?>"<?php ;} ?>>
            </div>
            <div class="champs-form">
                <label class="label-formulaire" for="password">Mot de passe : </label><input type="password" id="password" name="password"  <?php if (isset($password)){ ?>value="<?= $password ?>"<?php ;} ?>>
            </div>
            <div>
            <button  class="btn btn-primary" type="submit" id="envoyer">Inscription</button>
        </div>
        </div>
    </section>
    <?php
        if (isset($messageErr)) {
            foreach( $messageErr as $err){
            ?>
                <div class="alert alert-danger mt-50"  role="alert"><?= $err ?></div>
            <?php 
            }
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
