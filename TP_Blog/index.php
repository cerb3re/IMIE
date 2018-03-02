<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 01/03/2018
 * Time: 13:58
 */

include_once "./config.inc.php";

$controler = "Welcome";
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$action)
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

$direct_rendering = filter_input(INPUT_GET, 'direct_rendering', FILTER_VALIDATE_BOOLEAN);
if (!$direct_rendering)
    $direct_rendering = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if ($action){
    if (file_exists('controller/'.$action.'.php')){
        $controler = $action;
    }else{
        http_response_code(404);
        return;
    }
}
session_start();
if (!in_array($controler, $DMZ) && !isset($_SESSION['user_id'])){
    header("Location: /index.php?action=LoginForm");
    die();
}

include('controller/'.$controler.'.php');
$ctrlClassName = "Blog\\Controller\\".$controler;
$controller = new $ctrlClassName();
if (isset($_SESSION['user_id'])) {
    $controller->setCurrentUserId($_SESSION['user_id']);
    $controller->setCurrentUserName($_SESSION['current_user']);
    $controller->setIsAdmin($_SESSION['isadmin']);
}
ob_start();
$controller->run();
$content = ob_get_clean();
//
if ($direct_rendering){ //don't render with template
    echo $content;
}else{
    $data = array(
        "errors"=>$controller->getErrors(),
	"content"=>$content,
        "current_user" => $controller->getCurrentUserName(),
        "isadmin" => $controller->isAdmin()
        );
    require(PATH_VIEW.'/MainTemplate.php');
}
