<?php

function meSessionRegenerateId()
{
    if(session_status()!=PHP_SESSION_ACTIVE)
    {
        session_start();
    }

    $newId = session_create_id('myprefix');

    session_commit();
    ini_set('session.use_strict_mode',0);
    session_id($newId);
    session_start();

}