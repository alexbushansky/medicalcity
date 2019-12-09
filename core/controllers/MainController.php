<?php

namespace core\controllers;
use \globals\GlobalController;
require_once _MODELS."MainModel.php";

class MainController extends GlobalController
{



    public function index()
    {
        return $this->gettwig()->render("login.tpl");

    }





    public function authorization()
    {
        echo password_hash("1111", PASSWORD_DEFAULT);

        if(isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password']))
        {
           \core\models\MainModel::authorization($_POST['login'],$_POST['password']);
        }
    }






}