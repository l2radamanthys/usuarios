<?php session_start();
include_once('libs/db_conector.php');
include_once('libs/session.php');
include_once('libs/urls.php');
include_once('libs/config.php');
include_once('libs/template-manager.php');

include_once('libs/users.php');

$user = new Session();
html_display('header.txt', 'TITLE', 'Panel de Control');
display_menu($user); 

if ($user->is_have_access()) {

}

else {
	html_display('messages/010.txt');
}




html_display('footer.txt');
?>
