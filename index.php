<?php


session_start();

spl_autoload_register( function($class){
    require_once lcfirst(str_replace('\\', '/', $class)) . '.php';
});

if( array_key_exists('route', $_GET) )
{
    switch( $_GET['route'] )
    {

// PAGES ADMIN
    case 'admin':
        $controller = new Controllers\AdminController();
        if(!empty($_POST))
        {
            $controller -> submit();
        }
        $controller->display();
        break;
    case 'dashboard':
        $controller = new Controllers\DashboardController();
        $controller -> display();
        break;  
    case 'modifyUser':
        $controller = new Controllers\AdminController();
        if(!empty($_POST))
        {
            $controller -> modifyUserParameters();
        }
        $controller -> displayUserParameters();
        break; 
    case 'deleteUser':
        $controller = new Controllers\AdminController();
        $controller -> delete_user();
        break;
// PAGES PRINCIPALES
        case 'home':
            $controller = new Controllers\HomeController();
            $controller->display();
            break;
        case 'userlists':
            $controller = new Controllers\HomeController();
            $controller->displayUserLists();
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
    //Listes de l'utilisateur
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
            if(!empty($_POST))
            {
                $controller -> submitList();
            }
            $controller->newList();
            break;

        //Gestion des listes
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
            if(!empty($_POST))
            {
                $controller -> modify_List();
            }
            $controller->display_List();
            break;

        case 'deleteGift':
            $controller = new Controllers\GiftsController();
            $controller -> delete_gift();
            break;

    

// ACTIONS UTILISATEURS

    //gestion des paramètres    
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

    //abonnements de l'utilisateur
        case 'lists':
            $controller = new Controllers\ListsController();
            $controller->displayMySubscriptions();
            break;
    //Abonnements gestion        
        case 'subscription':
            $controller = new Controllers\ListsController();
            $controller->subscribe();
            break;
        case 'deleteSubscription':
            $controller = new Controllers\ListsController();
            $controller -> delete_sub();
            break;

    //Réservations gestion  
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