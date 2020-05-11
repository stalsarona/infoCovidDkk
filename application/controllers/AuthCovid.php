<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthCovid extends CI_Controller {

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
	public function index()
	{
		$this->load->view('V_login');
	}

	public function login_pendataan()
	{
		$curl = curl_init();

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/covid/login_pendataan",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => array('username' => $username,'password' => $password),
		CURLOPT_HTTPHEADER => array(
			"Cookie: rsdm_session=DXUN%2ByA1ZQdrtPrqJj1HX6epbBqHczK8DJsoQk01gGQLdWDczdj9sCZPdXzDKsfVrw4d53T2iKUVtjyUJ4syoYVJvB9d5QnpocIX%2FKFeS3v0xY6x3RZDR7LPlLqSO4umrgmyfyu6hpIwthT5%2F0cPoK104MSoHeP5gVvyWEOasrOAIk4YuhRyuwHjRL%2FDbhl7TNG%2FuX6q%2B7k3haVWOrIfBoDiIwruyZz9qdMpHE3aJDxQA7b3oAWHvEwxCQNCwCs2VO4DBpCiwgvUD3T8Dl2czYt9Ou8Oh4eZpINcOt27gwth%2BZ%2FK2HE4t9FUmM5YHlF1HUHKcJ9eY2OzcoqRJWqEiw%3D%3D"
		),
		));

		$response = curl_exec($curl);
		$dec_response = json_decode($response);
		foreach($dec_response as $key){}
		if($key->kode == 200){
			
			$array = array(
				'status_log' => true,
				'username' => $key->USERNM
			);
			
			$this->session->set_userdata( $array );
			
		} else {}
		curl_close($curl);
		echo $response;
		//print_r($key->kode);
	}
}
