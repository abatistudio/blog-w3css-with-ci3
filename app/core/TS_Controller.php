<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TS_Controller extends CI_Controller
{  
  var $library = array('session', 'tscrud');
  var $helper = array('url', 'tshelp');
  var $dbconfig = array(
      'hostname' => 'localhost',
      'username' => 'simak',
      'password' => '123',
      'database' => 'belajardb',
      'dbdriver' => 'mysqli',
      'dbprefix' => '',
      'pconnect' => FALSE,
      'db_debug' => (ENVIRONMENT !== 'production'),
      'cache_on' => FALSE,
      'cachedir' => '',
      'char_set' => 'utf8',
      'dbcollat' => 'utf8_general_ci',
      'swap_pre' => '',
      'encrypt'  => FALSE,
      'compress' => FALSE,
      'stricton' => FALSE,
      'failover' => array(),
      'save_queries' => TRUE
    );
  var $tsdata = array();

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');

    $this->load->database($this->dbconfig);
    $this->load->library($this->library);
    $this->load->helper($this->helper);

    $this->tsdata['versi'] = '0.1';
    $this->tsdata['app'  ] = 'nameOfApp';
    $this->tsdata['copyright' ] = 'CopyRight '.date('Y').' &copy; nameOfTeam, IT Support. Semua Hak Dilindungi Undang-undang';
    $this->tsdata['tglsistem' ] = date('Y-m-d H:i:s', time());
    $this->tsdata['urlberkas' ] = 'berkas/';
    $this->tsdata['pathberkas'] = getcwd()."/".$this->tsdata['urlberkas'];
    $this->tsdata['urlbase'   ] = "http://".$_SERVER['HTTP_HOST'].preg_replace('@/+$@', '', dirname($_SERVER['SCRIPT_NAME'])).'/';
    
    $this->config->set_item('base_url', $this->tsdata['urlbase']);
    $this->config->set_item('index_page', '');
  }
}
