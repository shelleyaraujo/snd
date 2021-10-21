<?php
require('kissmvc_core.php');
class Model extends KISS_Model  {
  function gethtmlsafe($key) {
    return htmlspecialchars($this->get($key));
  }
}

class Controller extends KISS_Controller {
  function request_not_found($msg = '') {
    die(View::do_fetch(VIEW_PATH.'errors/404.php'));
  }
}

class View extends KISS_View {
  function __construct($file='',$vars='') {
    $file = VIEW_PATH.$file;
    return parent::__construct($file,$vars);
  }
}