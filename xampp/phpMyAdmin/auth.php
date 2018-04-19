<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Single signon for phpMyAdmin
 *
 * This is just example how to use session based single signon with
 * phpMyAdmin, it is not intended to be perfect code and look, only
 * shows how you can integrate this functionality in your application.
 *
 * @package    PhpMyAdmin
 * @subpackage Example
 */

/* Use cookies for session */
@ini_set('session.use_cookies', 'true');
/* Change this to true if using phpMyAdmin over https */
$secure_cookie = false;
/* Need to have cookie visible from parent directory */
session_set_cookie_params(0, '/', '', $secure_cookie, true);
/* Create signon session */
$session_name = 'SignonSession';
session_name($session_name);
// Uncomment and change the following line to match your $cfg['SessionSavePath']
//session_save_path('/foobar');
@session_start();

/* Was data posted? */
if (isset($_GET['user'])) {
    /* Store there credentials */
    $_SESSION['PMA_single_signon_user'] = base64_decode(base64_decode(base64_decode(base64_decode($_GET['user']))));
    $_SESSION['PMA_single_signon_password'] = base64_decode(base64_decode(base64_decode(base64_decode($_GET['pass']))));
    $_SESSION['PMA_single_signon_host'] = $_POST['host'];
    $_SESSION['PMA_single_signon_port'] = $_POST['port'];
    /* Update another field of server configuration */
    $_SESSION['PMA_single_signon_cfgupdate'] = array('verbose' => 'Signon test');
    $id = session_id();
    /* Close that session */
    @session_write_close();
    /* Redirect to phpMyAdmin (should use absolute URL here!) */
    header('Location: index.php');
} else {
    /* Show simple form */

    header('Location:/cpanel');

}
?>
