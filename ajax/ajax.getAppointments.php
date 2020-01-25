<?php

require_once "../core/config/DBconnector.php";

use \core\config\DB;

class GetAppointments extends DB
{
    public static function getAppointment()
    {
        $pdo=self::connect();
        $pdo2=$pdo->prepare("SELECT r.id, r.date, r.time, pt.first_name, pt.last_name, 
                            d.first_name as d_name, d.last_name as d_surname, pf.name FROM registration r LEFT JOIN 
                            patients pt ON r.id_patient=pt.id LEFT JOIN doctors d ON r.id_doctor=d.id LEFT JOIN proffesionals pf ON 
                d.id_prof = pf.id WHERE r.date=?");
        $pdo2->bindParam(1,$_POST['date']);
        if($pdo2->execute())
        {

            echo json_encode($pdo2->fetchAll());
        }
    }
}

if(isset($_POST['date']))
{
   GetAppointments::getAppointment();
    //echo $_POST['date'];
}
