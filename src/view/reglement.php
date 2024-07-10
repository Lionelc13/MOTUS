<?php
$myTitle = 'regles';
$myDescription='Règles du jeu de Motus';
$myEntete='Jeu Motus';

require "header.php";
?>

        <main class="container mt-4">
            <section>
                <h2>Introduction</h2>
                <p>Motus est un jeu de lettres où l'objectif est de deviner un mot mystère en un nombre limité de tentatives. Le jeu est généralement joué avec des mots de six à huit lettres, mais peut être adapté à différents formats.</p>
            </section>
            <section>
                <h2>Règles du jeu</h2>
                <ol>
                    <li><strong>Objectif :</strong> Deviner le mot mystère en un nombre limité de tentatives (généralement 6).</li>
                    <li><strong>Déroulement :</strong></li>
                    <ul>
                        <li>Le joueur propose un mot de la même longueur que le mot mystère.</li>
                        <li>Après chaque proposition, des indications sont données :</li>
                        <ul>
                            <li>Les lettres bien placées sont indiquées en rouge.</li>
                            <li>Les lettres présentes dans le mot mais mal placées sont indiquées en jaune.</li>
                            <li>Les lettres absentes du mot mystère restent sur fond bleu.</li>
                        </ul>
                    </ul>
                    <li><strong>Fin de partie :</strong></li>
                    <ul>
                        <li>Le joueur gagne s'il découvre le mot mystère dans les tentatives imparties.</li>
                        <li>Le joueur perd s'il n'a pas deviné le mot après toutes les tentatives.</li>
                    </ul>
                </ol>
            </section>
            <section>
                <h2>Astuces pour jouer</h2>
                <ul>
                    <li>Commencez par proposer des mots contenant des voyelles fréquentes (A, E, I, O, U).</li>
                    <li>Observez les lettres en rouge pour fixer les bonnes lettres à leur position correcte.</li>
                    <li>Utilisez les lettres en jaune pour essayer différentes positions.</li>
                    <li>Évitez de répéter les lettres absentes lors de vos prochains essais.</li>
                </ul>
            </section>
        </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
