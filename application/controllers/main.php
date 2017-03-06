<?php

defined('BASEPATH') OR exit('No direct script acess allowed');

class Main extends CI_Controller {

    public function _construct() {
        parent::__construct();
    }

    /*
      @access public
      @return void
     */

    public function index() {
        $this->load->view('header');
        $this->load->view('footer');
    }

}
