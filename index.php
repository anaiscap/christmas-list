<?php


session_start();

spl_autoload_register( function($class){
    require_once lcfirst(str_replace('\\', '/', $class)) . '.php';
});

if( array_key_exists('route', $_GET) )
{
    try  {
        include './router.php';
    } catch(Throwable $e) {
        header('location: notfound');
    }
}
else
{
    header('location: home');
    exit();
}