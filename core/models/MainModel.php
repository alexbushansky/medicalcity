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
                    if(!is_array($_SESSION['user'])) {
                        $_SESSION['user'] = [];
                    }

                   switch($arr["role"]) {
                       case 1:
                            $pdo3 = $pdo->prepare("SELECT *,p.name as prof FROM doctors d LEFT JOIN 
                            proffesionals p ON d.id_prof=p.id WHERE d.id = ?");
                            $pdo3->bindParam(1,$arr["id_user"]);
                            $pdo3->execute();
                            $arrUser = $pdo3->fetch(\PDO::FETCH_ASSOC);
                              setcookie("auth",true,time()+3600,"/");
                              $_SESSION['user']['id'] = $arr['id'];
                              $_SESSION['user']['login'] = $arr['login'];
                              $_SESSION['user']['role'] = $arr['role'];
                              $_SESSION['user']['first_name'] = $arrUser['first_name'];
                              $_SESSION['user']['last_name'] = $arrUser['last_name'];
                              $_SESSION['user']['prof'] = $arrUser['prof'];
                              return true;

                           break;

                       case 2:
                           $pdo3 = $pdo->prepare("SELECT *, p.name as prof FROM staff s LEFT JOIN 
                            proffesionals p ON s.id_prof=p.id WHERE s.id = ? WHERE s.id=?");
                           $pdo3->bindParam(1,$arr["id_user"]);
                           $pdo3->execute();
                           $arrUser = $pdo3->fetch(\PDO::FETCH_ASSOC);
                           setcookie("auth",true,time()+3600,"/");
                           $_SESSION['user']['id'] = $arr['id'];
                           $_SESSION['user']['login'] = $arr['login'];
                           $_SESSION['user']['role'] = $arr['role'];
                           $_SESSION['user']['first_name'] = $arrUser['first_name'];
                           $_SESSION['user']['last_name'] = $arrUser['last_name'];
                           $_SESSION['user']['prof'] = $arrUser['prof'];
                           return true;
                           break;

                       case 3:
                           $pdo3 = $pdo->prepare("SELECT * FROM patients p
                            LEFT JOIN city c ON p.id_city=c.id WHERE p.id=?");
                           $pdo3->bindParam(1,$arr["id_user"]);
                           $pdo3->execute();
                           $arrUser = $pdo3->fetch(\PDO::FETCH_ASSOC);
                           setcookie("auth",true,time()+3600,"/");
                           $_SESSION['user']['id'] = $arr['id'];
                           $_SESSION['user']['login'] = $arr['login'];
                           $_SESSION['user']['role'] = $arr['role'];
                           $_SESSION['user']['first_name'] = $arrUser['first_name'];
                           $_SESSION['user']['last_name'] = $arrUser['last_name'];
                           $_SESSION['user']['city'] = $arrUser['name'];
                           $_SESSION['user']['address'] = $arrUser['street']."-street build:".$arrUser['n_building']." ap:".$arrUser['n_apartament'];
                           return true;

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