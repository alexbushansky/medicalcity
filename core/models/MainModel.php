<?php


namespace core\models;
use \core\config\DB;


class MainModel extends DB
{
    public static function authorization($login, $password)
    {
        $pdo = self::connect();
        $pdo2 = $pdo->prepare("SELECT * FROM user WHERE login = ?");
        $pdo2->bindParam(1,$login);
        if($pdo2->execute())
        {
            $arr  = $pdo2->fetch(\PDO::FETCH_ASSOC);
            if(!empty($arr['login']))
            {
                if(password_verify($password,$arr['password']))
                {
                   switch($arr["role"]) {
                       case 1:
                            $pdo3 = $pdo->prepare("SELECT * FROM doctors WHERE id = ?");
                            $pdo3->bindParam(1,$arr["id_user"]);
                            $pdo3->execute();
                            $arrUser = $pdo3->fetch(\PDO::FETCH_ASSOC);

                           break;

                       case 2:
                           $pdo3 = $pdo->prepare("SELECT * FROM staff WHERE id = ?");
                           $pdo3->bindParam(1,$arr["id_user"]);
                           $pdo3->execute();
                           $arrUser = $pdo3->fetch(\PDO::FETCH_ASSOC);
                           break;

                       case 3:
                           $pdo3 = $pdo->prepare("SELECT * FROM patients WHERE id = ?");
                           $pdo3->bindParam(1,$arr["id_user"]);
                           $pdo3->execute();
                           $arrUser = $pdo3->fetch(\PDO::FETCH_ASSOC);
                           break;
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
}