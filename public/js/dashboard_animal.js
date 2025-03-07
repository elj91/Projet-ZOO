function afficherForm(type) {
    // Sélectionnez les champs de formulaire d'animal et d'espèce
    var animalFields = document.querySelectorAll('#animal-form input');
    var especeFields = document.querySelectorAll('#espece-form input');

    if (type === 'animal') {
        document.getElementById('animal-form').style.display = 'block';
        document.getElementById('espece-form').style.display = 'none';
        document.getElementById('bouton').style.display = 'block';
        // Ajoutez ou supprimez l'attribut required pour les champs de formulaire appropriés
        animalFields.forEach(function(field) {
            field.setAttribute('required', 'required');
        });
        especeFields.forEach(function(field) {
            field.removeAttribute('required');
        });
    } else if (type === 'espece') {
        document.getElementById('espece-form').style.display = 'block';
        document.getElementById('animal-form').style.display = 'none';
        document.getElementById('bouton').style.display = 'block';
        // Ajoutez ou supprimez l'attribut required pour les champs de formulaire appropriés
        especeFields.forEach(function(field) {
            field.setAttribute('required', 'required');
        });
        animalFields.forEach(function(field) {
            field.removeAttribute('required');
        });
    } else {
        document.getElementById('animal-form').style.display = 'none';
        document.getElementById('espece-form').style.display = 'none';
        document.getElementById('bouton').style.display = 'none';
        // Supprimez l'attribut required pour tous les champs de formulaire
        animalFields.forEach(function(field) {
            field.removeAttribute('required');
        });
        especeFields.forEach(function(field) {
            field.removeAttribute('required');
        });
    }
}
