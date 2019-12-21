<?php

namespace core\controllers;
use \globals\GlobalController;
require_once _MODELS."MainModel.php";

class MainController extends GlobalController
{



    public function index()
    {
        if(isset($_COOKIE['auth']) && $_COOKIE['auth']) {
            $html = $this->gettwig()->render("header.tpl");




           if($_SESSION['user']['role']==1) {

               $html .= $this->gettwig()->render("doctor.tpl");

           }
           else if ($_SESSION['user']['role']==2)
           {

               $html .= $this->gettwig()->render("staff.tpl");

           }
           else if($_SESSION['user']['role']==3)
           {

               $html .= $this->gettwig()->render("patient.tpl");

           }




            $html .= $this->gettwig()->render("footer.tpl");
            return $html;
        }
        else {
            return $this->gettwig()->render("login.tpl");
        }

    }





    public function authorization()
    {
        //echo password_hash("1111", PASSWORD_DEFAULT);

        if(isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password']))
        {
           if(\core\models\MainModel::authorization($_POST['login'],$_POST['password']))
           {
               header("location: /");
           }
        }
    }






}