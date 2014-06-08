<?php


// define zf constants
define('APPLICATION_ENV', 'development');
define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

if(APPLICATION_ENV == 'development')
{
	// define path constants
	define('ROOT', '/var/www/');
	define('ABS_PATH', '/dev/');
	define('DOMAIN', 'http://'.$_SERVER['SERVER_NAME']);
	define('URL_PATH', DOMAIN.'/');
	#define('ZF_DIR', ROOT.'___frameworks\ZendFramework');


	// add frameworks / libraries
	$libraries = array(
		get_include_path(),									# zend framework
		#ROOT.'___frameworks/Pear/PEAR',						# pear
		ROOT.'___libraries/external',						# external libs
		ROOT.'___libraries/own/common',						# my libs
		realpath(APPLICATION_PATH . '/../library'),			# my zf libs (project dependent)
		ROOT.'___libraries/own/zf',							# my zf libs (project independent)
	);
	set_include_path(implode(PATH_SEPARATOR, $libraries));
	
	
	// define own social constants
	define('FB_FLATBIRD_APPID', '377578679018602');
	define('FB_FLATBIRD_APPSECRET', '160de4d0b1698e6a3a44de9912639a6c');
	define('FB_FLATBIRD_URL', URL_PATH.'fb/token');
	define('FB_PAGE_FLATBIRD_PAGEID', '339509972835987');
	
	#define('TW_CONSUMER_KEY', 'RbkzLehPqioI700TfIuzgQ');
	#define('TW_CONSUMER_SECRET', 'RIdUuSnsFTCM2qr8tRtAb8cW8Q0BP4QNunktd4Q8Do');
	#define('TW_USER_TOKEN', '1213561214-EbEa7vsCa4ShRkhIqinxggLywV6NExaHYploQny');
	#define('TW_USER_SECRET', 'tsr9vSpxoCnIDFpI3GaU58MIf0iSYYNjRq5PQyvfc');
	
}
else if(APPLICATION_ENV == 'production')
{
	define('ROOT', '/var/www/');
	define('ABS_PATH', '/');
	define('DOMAIN', 'http://'.$_SERVER['SERVER_NAME']);
	define('URL_PATH', DOMAIN.'/');	
	#define('ZF_DIR', ROOT.'_zflib/library/');  ====> include path setzen
	
	
	// add frameworks / libraries
	$libraries = array(
		get_include_path(),									# zend framework + pear
		#ROOT.'___frameworks/Pear/PEAR',						# pear
		ROOT.'___libraries/external',						# external libs
		ROOT.'___libraries/own/common',						# my libs
		realpath(APPLICATION_PATH . '/../library'),			# my zf libs (project dependent)
		ROOT.'___libraries/own/zf',							# my zf libs (project independent)
	);
	set_include_path(implode(PATH_SEPARATOR, $libraries));
	

	// define own social constants
	define('FB_FLATBIRD_APPID', '281535501980458');
	define('FB_FLATBIRD_APPSECRET', 'a8683b6cedbf29b515e509889822bef3');
	define('FB_FLATBIRD_URL', URL_PATH.'fb/token');
	define('FB_PAGE_FLATBIRD_PAGEID', '118250711553872');
	
	define('TW_CONSUMER_KEY', 'RbkzLehPqioI700TfIuzgQ');
	define('TW_CONSUMER_SECRET', 'RIdUuSnsFTCM2qr8tRtAb8cW8Q0BP4QNunktd4Q8Do');
	define('TW_USER_TOKEN', '1213561214-EbEa7vsCa4ShRkhIqinxggLywV6NExaHYploQny');
	define('TW_USER_SECRET', 'tsr9vSpxoCnIDFpI3GaU58MIf0iSYYNjRq5PQyvfc');

}


// define project constants
define('EINR_PICS', URL_PATH.'_uploads/einrichtungspics');
define('IMMO_PICS', URL_PATH.'_uploads/immopics');
define('USER_PICS', URL_PATH.'_uploads/userpics');
define('UPLOAD_DIR', '_uploads/');
define('DAYS_ONLINE', 30000);


// Zend_Application
require_once 'Zend/Application.php'; 
ini_set('zend.ze1_compatibility_mode', 0);
date_default_timezone_set('Europe/Vienna');


// debug functions
require_once 'Joehelp/Debug/Debug.php';


// activate outputting php errors within console
//set_error_handler("customError", E_ALL | E_ERROR | E_WARNING | E_PARSE);




/*
$time_start = microtime(true);
*/

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV, 
    APPLICATION_PATH . '/configs/application.ini'
    #APPLICATION_PATH . '/configs/config.php'
	
);
$application->bootstrap()                             # mit Aufruf von bootstrap() werden alle _init() Methoden geladen und alle vorhandenen resourcen (zB von der config datei)
            ->run();
	
/*
$time_end = microtime(true);
$time = $time_end - $time_start;
echo $time;
echo memory_get_peak_usage(true);
echo "<br>";
echo memory_get_usage();
*/ 



/*
// Add this to the page you want to track includes on

if(is_writeable('E:/___HVD___/wamp/www/__HELFERCHEN/inclued/wp.json')) {
    if(function_exists('inclued_get_data')) {
        $clue = inclued_get_data();
        file_put_contents('E:/___HVD___/wamp/www/__HELFERCHEN/inclued/wp.json', serialize($clue));
    }
}
*/
