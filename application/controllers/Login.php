<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('V_login');
	}

	public function get_cors($url)
    {
        $ch0 	 = curl_init();
                curl_setopt($ch0, CURLOPT_URL, $url);
                curl_setopt ($ch0, CURLOPT_RETURNTRANSFER, 1);
        $exec0 	 = curl_exec ($ch0);
        curl_close ($ch0); 
        return $exec0;
	}

	public function get_login(){
		$curl = curl_init();
		$username = htmlentities($this->input->post('username', TRUE));
		$password = htmlentities($this->input->post('password', TRUE));
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://119.2.50.170:9095/infocovidtest/servicesRs/login",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"x-username: ".$username,
				"x-password: ".$password
			),
		));
	
		$response = curl_exec($curl);
		$dec_response = json_decode($response);
		foreach($dec_response as $key){}
		if($key!=''){	
			$array = array(
				'status_log' => TRUE,
				'token' => $key,
				'username' => $username
			);
			$this->session->set_userdata( $array );	
		}
		curl_close($curl);
		echo $response;
	}

	public function signout_pendataan(){
		$this->session->sess_destroy();
		redirect('login');
	}
	
	public function blocked(){
        $this->load->view('V_navigasi');
		$this->load->view('V_blocked');
	}

}

