<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Covid_informasi extends CI_Controller {

    public function index()
    {
        
        $this->load->view('V_informasi_covid');
        
    }

}

/* End of file Covid_informasi.php */
