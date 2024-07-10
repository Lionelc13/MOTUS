<?php
    $myTitle = 'classement';
    $myDescription='Classement des joueurs de Motus';
    $myEntete='Classement des joueurs';
    require "header.php";
?>
        <div class="affichage" id="app">
            <div>
                <table class="tableau-classement">
                <tbody>
                <tr .tableau-classement>
                    <th>Pseudo</th>
                    <th>Score</th>
                    <th>Rang</th>
                </tr>
                <tr  class="tableau-classement" @load="chargerClassement()" v-for="(obj, index) in classement" :key="obj.id">
                    <td class="tableau-classement">{{ obj.nickname }}</td>
                    <td class="tableau-classement">{{ obj.total }}</td>
                    <td class="tableau-classement">{{ index+1 }}</td>
                </tr>
            </tbody>
                </table>
            </div>
        </div>
        <script this.$session.start()></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script type="module" src="../../public/classement.js"></script>
    </body>
</html>
