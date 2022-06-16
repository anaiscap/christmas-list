<?php

session_start();

spl_autoload_register( function($class){
    require_once lcfirst(str_replace('\\', '/', $class)) . '.php';
});

if( array_key_exists('route', $_GET) )
{
    switch( $_GET['route'] )
    {
// PAGES PRINCIPALES
        case 'home':
            $controller = new Controllers\HomeController();
            $controller->display();
            break;

        case 'signup':
            $controller = new Controllers\NewUserController();
            $controller->display();
            break;
        
        case 'signin':
            $controller = new Controllers\ConnectionController();
            $controller->display();
            break;
        
        case 'account':
            $controller = new Controllers\AccountController();
            $controller->display();
            break;
// PAGES LISTES UTILISATEUR
        case 'mylists':
            $controller = new Controllers\AccountController();
            $controller->displayLists();
            break;

        case 'modify':
            $controller = new Controllers\GiftsController();
            $controller->displayModify();
            break;

        case 'newlist':
            $controller = new Controllers\ListsController();
            $controller->newList();
            break;

        case 'lists':
            $controller = new Controllers\ListsController();
            $controller->displayMySubscriptions();
            break;

        case 'userlists':
            $controller = new Controllers\HomeController();
            $controller->displayUserLists();
            break;  
// ACTIONS UTILISATEURS
        case 'subscription':
            $controller = new Controllers\ListsController();
            $controller->subscribe();
            break;

        case 'booking':
            $controller = new Controllers\GiftsController();
            $controller->submitBooking();
            break;

        case 'displayBooking':
            $controller = new Controllers\GiftsController();
            $controller->displayMyBookings();
            break;

        case 'displayList':
            $controller = new Controllers\GiftsController(); 
            $controller->displayAllGifts();
            break;
        
        case 'deleteList':
            $controller = new Controllers\ListsController();
            $controller -> delete_list();
            break;

        case 'deleteGift':
            $controller = new Controllers\GiftsController();
            $controller -> delete_gift();
            break;

        case 'deleteSubscription':
            $controller = new Controllers\ListsController();
            $controller -> delete_sub();
            break;

        case 'deleteBooking':
            $controller = new Controllers\GiftsController();
            $controller -> delete_booking();
            break;
    }
}
else
{
    header('location: index.php?route=home');
    exit();
}