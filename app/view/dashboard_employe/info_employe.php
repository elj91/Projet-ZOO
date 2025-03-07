<?php
include_once(dirname(__DIR__, 3) . '/app/controller/EmployeController.php');

if (isset($_GET['employe_id'])) {
    $employeId = $_GET['employe_id'];

    $employeData = EmployeController::getEmployeById($employeId); //recup info employé(e)

    $data = array( //formate en JSON pour la requête AJAX
        'type' => 'employe',  //type de données : employé
        'employe' => $employeData
    );
    echo json_encode($data);
}


