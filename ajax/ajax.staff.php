<?php

require_once "../core/config/DBconnector.php";
use \core\config\DB;


class AjaxStaff extends DB
{
    public static function getDoctors(){

      $pdo = self::connect();
      $pdo2= $pdo->query("SELECT d.id, d.first_name, d.last_name,d.third_name,p.name as prof
                            FROM doctors d LEFT JOIN proffesionals p ON d.id_prof=p.id");
      if($pdo2->execute())
      {
          $arrDoctors = $pdo2->fetchAll(PDO::FETCH_ASSOC);

         return json_encode($arrDoctors);
      }

    }
}

if(isset($_POST['get_doctors']) && $_POST['get_doctors']==true)
{
   echo AjaxStaff::getDoctors();
}
