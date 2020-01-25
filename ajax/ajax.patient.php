<?php


require_once "../core/config/DBconnector.php";

use \core\config\DB;


class AjaxStaff extends DB
{

    public static function getClient()
    {

       // $likeString = $numb . '%';
        $pdo = self::connect();
        $pdo2 = $pdo->query("SELECT p.id,p.first_name,p.last_name, pn.number FROM patients p LEFT JOIN patients_phone_numbers pn 
                                ON p.id = pn.id_patient WHERE pn.number 
                                ");

        if ($pdo2->execute()) {
            $arrPatient = $pdo2->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($arrPatient);
        }


    }

}



if (isset($_POST['get_patient'])) {

    echo AjaxStaff::getClient();

}