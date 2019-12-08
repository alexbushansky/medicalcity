<?php
namespace globals;

class GlobalController
{
    protected function gettwig()
    {

        $loader = new \Twig\Loader\FilesystemLoader(_VIEWS);
        return $twig = new \Twig\Environment($loader);

    }
}