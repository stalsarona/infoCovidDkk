<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_covid extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function info_covid_mysql()
	{
        $data = $this->db->select('*')->from('covidreport')->limit(1)->order_by('TGLINPUT', 'desc')->get();
        return $data->result_array();
	}
}
