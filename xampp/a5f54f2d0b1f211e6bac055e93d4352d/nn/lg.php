<?php
define( '_VALID_MOS', 1 );
define( '_VALID_EXT', 1 );
require_once( dirname(__FILE__).'/libraries/standalone.php');
ob_start();
include( dirname(__FILE__).'/admin.extplorer.php' );
require_once( 'libraries/PasswordHash.php');


//require_once _EXT_PATH."/include/users.php";
//ext_load_users();
//------------------------------------------------------------------------------

$s=login2();



$GLOBALS['__SESSION']=&$_SESSION;
if( !empty($_REQUEST['type'])) {
	$GLOBALS['authentication_type'] = basename(extGetParam($_REQUEST, 'type', $GLOBALS['ext_conf']['authentication_method_default']));
} else {
	$GLOBALS['authentication_type'] = $GLOBALS['file_mode'];
}
if($GLOBALS['authentication_type'] == 'file') {
	$GLOBALS['authentication_type'] = 'extplorer';
}
if( !in_array($GLOBALS['authentication_type'],$GLOBALS['ext_conf']['authentication_methods_allowed'])) {
	$GLOBALS['authentication_type'] = extgetparam( $_SESSION, 'file_mode', $GLOBALS['ext_conf']['authentication_method_default'] );
	if( !in_array($GLOBALS['authentication_type'],$GLOBALS['ext_conf']['authentication_methods_allowed'])) {
		$GLOBALS['authentication_type'] = $_SESSION['file_mode'] = $GLOBALS['ext_conf']['authentication_method_default'];
	}
}

if( file_exists(_EXT_PATH.'/include/authentication/'.$authentication_type.'.php')) {
		require_once(_EXT_PATH.'/include/authentication/'.$authentication_type.'.php');
		$classname = 'ext_'.$authentication_type.'_authentication';
		if( class_exists($classname)) {
			$GLOBALS['auth'] = new $classname();
		}
}

//------------------------------------------------------------------------------
function login2() {
	global $auth, $authentication_type;
	if( !is_object($auth)) {
		return false;
	}
	if( !empty(base64_decode(base64_decode(base64_decode(base64_decode($_GET['user']))))) || !empty($_SESSION['credentials_'.$authentication_type])) {

		if( !empty(base64_decode(base64_decode(base64_decode(base64_decode($_GET['user'])))))) {
			$username = base64_decode(base64_decode(base64_decode(base64_decode($_GET['user']))));
			$password = base64_decode(base64_decode(base64_decode(base64_decode($_GET['pass']))));

		} else {echo "fasd";
			$username = $_SESSION['credentials_'.$authentication_type]['username'];
			$password = $_SESSION['credentials_'.$authentication_type]['password'];

		}

		$res = $auth->onAuthenticate( array('username' => $username, 'password' => $password) );
		if( !PEAR::isError($res) && $res !== false ) {
			if( @$GLOBALS['__POST']['action'] == 'login' && ext_isXHR() ) {
				session_write_close();

				//ext_Result::sendResult('login', true, ext_Lang::msg('actlogin_success') );

			}header("Location:index.php");
			return true;
		} else {
			if( $authentication_type == 'extplorer') {
				// Second attempt to authenticate, since we've switched password hashing algorithm
				// now we fall back to md5 hashing.
				$password = md5((string)base64_decode(base64_decode(base64_decode(base64_decode($_GET['pass'])))));
				$res = $auth->onAuthenticate( array('username' => $username, 'password' => $password) );

				if( !PEAR::isError($res) && $res !== false ) {
					if( @$GLOBALS['__POST']['action'] == 'login' && ext_isXHR() ) {
						session_write_close();
						ext_Result::sendResult('login', true, ext_Lang::msg('actlogin_success') );
					}
					return true;
				}
			}
			if( ext_isXHR() ) {
				$errmsg = PEAR::isError($res) ? $res->getMessage() : ext_Lang::msg( 'actlogin_failure' );

				ext_Result::sendResult('login', false, $errmsg );
			}
			return false;
		}

	}
	if( ext_isXHR() && $GLOBALS['action'] != 'login') {

		echo '<script type="text/javascript>document.location.href="index.php";</script>';

		exit();
	}


			?>


	<script type="text/javascript">
Ext.onReady( function() {
	var simple = new Ext.FormPanel(<?php $auth->onShowLoginForm() ?>);

	Ext.get( 'formContainer').center();
	Ext.get( 'formContainer').setTop(100);
	simple.getForm().findField('username').focus();
	Ext.EventManager.onWindowResize( function() { Ext.get( 'formContainer').center();Ext.get( 'formContainer').setTop(100); } );
});
</script><?php
define( '_LOGIN_REQUIRED', 1 );
}
?>
