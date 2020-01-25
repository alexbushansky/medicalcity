<?php


require_once "../core/config/DBconnector.php";

use \core\config\DB;


class AjaxAppointment extends DB
{

    public static function sendAppointment()
    {
        $appointment = json_decode($_POST['info'], true);

       $pdo = self::connect();
       $pdo2 = $pdo -> prepare("SELECT * FROM registration WHERE (id_doctor=? AND date=? AND time =?) OR (id_patient=? AND date=? AND time =?)");
       $pdo2->bindParam(1,$appointment['idDoctor']);
       $pdo2->bindParam(2,$appointment['date']);
       $pdo2->bindParam(3,$appointment['time']);
       $pdo2->bindParam(4,$appointment['idPatient']);
       $pdo2->bindParam(5,$appointment['date']);
       $pdo2->bindParam(6,$appointment['time']);
       if($pdo2->execute())
       {
           $rows=$pdo2->rowCount();

           if($rows==0){
               $pdo3 = $pdo->prepare("INSERT INTO registration (id_patient,id_doctor,date,time,complaint) VALUES (?,?,?,?,?)");
               $pdo3->bindParam(1, $appointment['idPatient']);
               $pdo3->bindParam(2, $appointment['idDoctor']);
               $pdo3->bindParam(3, $appointment['date']);
               $pdo3->bindParam(4, $appointment['time']);
               $pdo3->bindParam(5, $appointment['complaint']);
               if ($pdo3->execute()) {
                   return true;
               }
           }
           else
           {
               return false;
           }
       }
       else
       {
           return false;
       }



    }

}

if (isset($_POST['info']))
{


    if(AjaxAppointment::sendAppointment())
    {
        echo true;
    }
    else
    {
        echo false;
    }

}

