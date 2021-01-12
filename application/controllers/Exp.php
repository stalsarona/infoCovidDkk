<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exp extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
        is_logged_in(); //helper auth
	}

	public function index()
	{
		$menu['menu'] = $this->get_akses_menu();
        $this->load->view('V_navigasi',$menu);
		$this->load->view('V_blocked');
	}

	public function get_akses_menu(){
        $tipe = $this->session->userdata('tipe');
        $url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_akses_menu/";
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"X-tipe: ".$tipe
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
        $data = json_decode($response, TRUE);
        //untuk scraping json harus di decode baru di looping dahulu
        //$this->output->set_content_type('application/json')->set_output(json_encode($data));
        return $data;
	}
	
}

