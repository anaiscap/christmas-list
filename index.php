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
            case 'admin':
                $controller = new Controllers\AdminController();
                $controller->display();
                break;
            case 'tableau':
                $controller = new Controllers\DashboardController();
                $controller -> display();
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
        
        case 'parameters':
            $controller = new Controllers\AccountController();
            if(!empty($_POST))
            {
                $controller -> modifyParameters();
            }
            $controller->displayParameters();
            break;

        case 'newpassword':
            $controller = new Controllers\AccountController();
            $controller->modifyPassword();
            break;
            
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
            //si le formulaire a été soumis
            if(!empty($_POST))
            {
                $controller -> modifyMyBookings();
            }
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

        case 'modifyList':
            $controller = new Controllers\ListsController();
            //si le formulaire a été soumis
            if(!empty($_POST))
            {
                $controller -> modify_list();
            }
            $controller -> displayModifyList();
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