<?php
session_start();
// Détruit toutes les variables de session
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}
session_destroy();
$new_url = "../../index.php";
header("Location: $new_url");
//print "<meta http-equiv=\"refresh\" content='0;URL=\"$new_url' />";
exit;
