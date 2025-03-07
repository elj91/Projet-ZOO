<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Animal</title>
    <link rel="shortcut icon" href="../../../public/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../public/css/dashboard_animal.css">
</head>
<body>
<div class="container">
    <div class="menu">
        <div class="logo">
            <img src="../../../public/images/logo.png" alt="Logo">
        </div>
        <a href="dashboard_animal.php" class="menu-btn">Dashboard</a>
        <a href="dashboard_add_animal.php" class="menu-btn">Ajouter</a>
        <a href="dashboard_edit_animal.php" class="menu-btn">Modifier</a>
        <a href="dashboard_search_animal.php" class="menu-btn">Rechercher</a>
        <a href="../dashboard.php" class="menu-btn btn-deconnexion">Retour</a>
    </div>
    <div class="animal-form-cont">
        <h2>Formulaire de recherche</h2>
        <form id="search-animal-form" action="#" method="post">
            <div>
                <label for="type">Que souhaitez-vous rechercher ?</label>
                <select id="type" name="type" onchange="afficherForm(this.value)">
                    <option value="">Un animal ou une espèce ?</option>
                    <option value="animal">Animal</option>
                    <option value="espece">Espèce</option>
                </select>
            </div>
            <div id="animal-form" style="display:none;">
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo">
            </div>
            <div id="espece-form" style="display:none;">
                <label for="nom_race">Nom de la race :</label>
                <input type="text" id="nom_race" name="nom_race">
            </div>
        </form>
        <div id="bouton" style="display: none">
            <button type="submit" id="submit-btn" onclick="rechercherAnimal()">Rechercher</button>
        </div>
        <div id="resultat"></div>
    </div>
</div>
<script src="../../../public/js/dashboard_animal.js"></script>
<script>
    function rechercherAnimal() {
        //Récup le type du select
        let type = document.getElementById("type").value;
        let recherche = '';

        //Récup la valeur du pseudo ou de l'espèce
        if (type === 'animal') {
            recherche = document.getElementById("pseudo").value;
        } else if (type === 'espece') {
            recherche = document.getElementById("nom_race").value;
        }

        //créer objet XMLHttpRequest
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() { //Appel la fonction lorsqu'il y a un changement d'état
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) { //Si la requête est terminée et que le statut est OK
                    document.getElementById("resultat").innerHTML = xhr.responseText; //Affiche le résultat dans le div
                } else {
                    console.error('Erreur lors de la recherche d\'animal ou d\'espèce.');
                }
            }
        };
        xhr.open('POST', 'search_animal.php', true); //Ouvre la requête
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //En-tête de la requête
        xhr.send('type=' + type + '&recherche=' + recherche); //Envoie la requête
    }
</script>
</body>
</html>

