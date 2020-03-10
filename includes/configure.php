<?php
    session_start();
    /*===========================================================================
    BASIC CONSTANTS & REQUIRES
    ============================================================================*/

    define('BASE_DIR', 'C:/xampp/htdocs/voting_system');
    define('SITE_HOST', 'http://127.0.0.1/');
    define('BASE_URL', SITE_HOST.'/voting_system');
    define('IMAGES_DIR', BASE_DIR.'/images');
    define('IMAGES_URL', BASE_URL.'/images');
    define('INCLUDES_DIR', BASE_DIR.'/includes');
    define('CLASSES_DIR', INCLUDES_DIR.'/classes');
    define('FUNCTIONS_DIR', INCLUDES_DIR.'/functions');
    define('FILES_DIR', INCLUDES_DIR.'/files');
    define('PAGE_NAME', basename($_SERVER['PHP_SELF']));

    define('DB_TYPE', 'mysql');
    define('DB_SERVER', 'localhost');
    define('DB_SERVER_USERNAME', 'root');
    define('DB_SERVER_PASSWORD', '');
    define('DB_DATABASE', 'voting_system');

    require_once('smarty/libs/Smarty.class.php');
    require_once(CLASSES_DIR.'/mysmarty.class.php');
    require_once('adodb/adodb.inc.php');

    /*========================================================================
    INITILIZAE SOME SMARTY VARIABLES
    ==========================================================================*/
    STemplate::assign('SITE_HOST', SITE_HOST);
    STemplate::assign('BASE_DIR', BASE_DIR);
    STemplate::assign('BASE_URL', BASE_URL);
    STemplate::assign('IMAGES_DIR', IMAGES_DIR);
    STemplate::assign('IMAGES_URL', IMAGES_URL);
    STemplate::assign('PAGE_NAME', PAGE_NAME);

    STemplate::setCompileDir(BASE_DIR.'/templates_c');
    STemplate::setTplDir(BASE_DIR.'/templates');
    
    
    /*==========================================================================
    DATABASE CONNECTION
    ============================================================================*/

    //$conn = &ADONewConnection(DB_TYPE);
    //$conn->PConnect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE)
	$conn = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);

    /*=========================================================================
    CONSTANTS FROM DATABASE
    ===========================================================================*/

    STemplate::assign("request",$_REQUEST);
    STemplate::assign("session",$_SESSION);

    $sql = 'select * from configuration';
    $rsc = mysqli_query($conn, $sql);

    $index = 0;
    while($row = mysqli_fetch_assoc($rsc))
    {
        $index = $index + 1;
        define($row['key'], $row['value']);
        STemplate::assign($row['key'], $row['value']);
    }


    include(INCLUDES_DIR."/include_files.php");
?>
