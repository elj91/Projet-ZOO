<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Animal</title>
    <link rel="shortcut icon" href="../../../public/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../public/css/dashboard_employe.css">
</head>
<body>
<div class="container">
    <div class="menu">
        <div class="logo">
            <img src="../../../public/images/logo.png" alt="Logo">
        </div>
        <a href="dashboard_employe.php" class="menu-btn">Dashboard</a>
        <a href="dashboard_add_employe.php" class="menu-btn">Ajouter</a>
        <a href="dashboard_edit_employe.php" class="menu-btn">Modifier</a>
        <a href="dashboard_search_employe.php" class="menu-btn">Rechercher</a>
        <a href="../dashboard.php" class="menu-btn btn-deconnexion">Retour</a>
    </div>
    <div class="employe-form-cont">
        <h2>Formulaire de recherche</h2>
        <form id="search-employe-form" action="#" method="post">
            <div id="employe-form">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom">
            </div>
        </form>
        <div id="bouton">
            <button type="submit" id="submit-btn" onclick="rechercherAnimal()">Rechercher</button>
        </div>
        <div id="resultat"></div>
    </div>
</div>
<script src="../../../public/js/dashboard_animal.js"></script>
<script>
    function rechercherAnimal() {
        //Récup le type du select
        let prenom = document.getElementById("prenom").value;


        //créer objet XMLHttpRequest
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() { //Appel la fonction lorsqu'il y a un changement d'état
            if (xhr.readyState === XMLHttpRequest.DONE) { // Requête terminée
                if (xhr.status === 200) { //Si la requête est terminée et que le statut est OK
                    document.getElementById("resultat").innerHTML = xhr.responseText; //Affiche le résultat dans le div
                } else {
                    console.error('Erreur lors de la recherche d\'animal ou d\'espèce.');
                }
            }
        };
        xhr.open('POST', 'search_employe.php', true); //Ouvre la requête
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //En-tête de la requête
        xhr.send('prenom=' + prenom); //Envoie la requête
    }
</script>
</body>
</html>

