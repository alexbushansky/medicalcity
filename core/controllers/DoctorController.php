<?php

namespace core\controllers;

use \globals\GlobalController;

class DoctorController extends GlobalController
{
    public function index()
    {
        $html = $this->gettwig()->render("header.tpl");
        $html .= $this->gettwig()->render("doctor.tpl");
        $html .=$this->gettwig()->render("footer.tpl");

        return $html;
    }
}