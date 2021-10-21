<?php

ini_set('display_errors','On');
error_reporting(E_ALL);
define('APP_PATH','app/'); 
define('WEB_FOLDER','/snd/'); 
define('WEB_DOMAIN','snd/');
define('VIEW_PATH','app/views/'); 


require('kissmvc.php');
require(APP_PATH.'inc/functions.php');

ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 1);
session_start();


$GLOBALS['alias'] ='snd/';
$GLOBALS['sitename'] ='Tao - Web System';
$GLOBALS['pagination']['full_tag_open'] = '<span class="pagination">';
$GLOBALS['pagination']['full_tag_close'] = "</span><br />\n<br />\n";
$GLOBALS['pagination']['cur_tag_open'] = '&nbsp;<span>';
$GLOBALS['pagination']['cur_tag_close'] = '</span>';
$GLOBALS['pagination']['first_link'] = '&lt;&lt;';
$GLOBALS['pagination']['last_link'] = '&gt;&gt;';
$GLOBALS['pagination']['num_links'] = 2;
$GLOBALS['pagination']['per_page'] = 5;

set_exception_handler('uncaught_exception_handler');

function uncaught_exception_handler($e) {
  ob_end_clean(); 
  $vars['message']=$e;
  die(View::do_fetch(APP_PATH.'errors/exception_uncaught.php',$vars));
}

function custom_error($msg='') {
  $vars['msg']=$msg;
  die(View::do_fetch(APP_PATH.'errors/custom_error.php',$vars));
}

function getdbh() {
  if (!isset($GLOBALS['dbh']))
    try {
      $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 
     $GLOBALS['dbh'] = new PDO('mysql:host=localhost;dbname=snd', 'root', '', $options);

   } catch (PDOException $e) {
    die('Connection failed: '.$e->getMessage());
  }
  return $GLOBALS['dbh'];
}

//function __autoload($classname) {
 
//}

spl_autoload_register(function($classname) {
    $a=$classname[0];
  if ($a >= 'A' && $a <='Z')
    require_once(APP_PATH.'models/'.$classname.'.php');
  else
    require_once(APP_PATH.'helpers/'.$classname.'.php');  
});


$controller = new Controller('app/'.'controllers/',WEB_FOLDER,'main','index');