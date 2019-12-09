<?php


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, "/");




$sectionArr = explode("/",$uri);

$sections = count($sectionArr);


if (empty($uri)) {

    $sectionsKey = 'default';

} else {

    if($sections<3)
    {
        $sectionsKey = $uri;
    }elseif ($sections==3)
    {
         $sectionsKey =$sectionArr[0]."/".$sectionArr[1]."/.*";
         define("ARGUMENT",$sectionArr[2]);
    }

}

if (array_key_exists($sectionsKey, $routes)) {

    $arr = explode('|', $routes[$sectionsKey]);
    $file =  str_replace("\\","/",$arr[0] . ".php");
    $class = $arr[0];
    $method = $arr[1];

    if (file_exists(_ROOT.$file)) {

        require_once _ROOT.$file;

        if (class_exists($class) && method_exists($class, $method)) {
            $temp =  new $class;
            $html = $temp->$method();
        }
    }

}else {
    echo "error 404 page not found";
}



