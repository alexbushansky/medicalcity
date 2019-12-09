<?php

$routes=[];

$routes['default'] = "core\\controllers\\MainController|index";
$routes['main'] = "core\\controllers\\MainController|index";
$routes['doctor'] = "core\\controllers\\DoctorController|index";
$routes['patient'] = "core\\controllers\\PatientController|index";
$routes['staff'] = "core\\controllers\\StaffController|index";
$routes['login/handler'] = "core\\controllers\\MainController|authorization";


$routes['doctor/views/.*'] = "core\\controllers\\StaffController|index";


