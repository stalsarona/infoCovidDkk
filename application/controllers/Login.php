<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('session');
	}

	public function index()
	{
		if ($this->session->userdata('status_log') != TRUE) {
			$data['token'] = $this->private_token();
			$data['dashboard'] = $this->dashboard();
			$data['grafik'] = $this->dashboard_grafik();
			$this->load->view('V_dashboard',$data);
		} else if($this->session->userdata('tipe')=='IT' || $this->session->userdata('tipe')=='MANAJEMEN' || $this->session->userdata('tipe')=='ADM'){
			redirect('Dashboard','refresh');
		} else{
			$this->session->sess_destroy();
			redirect('login','refresh');
		}
	}

	public function login(){
		$data['token'] = $this->private_token();
		$this->load->view('V_login',$data);
	}

	public function dashboard(){
        $url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/dashboard";
        $data = json_decode($this->get_cors($url), TRUE);
        
		return $data;
	}
	
	public function dashboard_grafik(){
		//$periode = $this->input->post('periode');
		$bln = '08';
		$thn = '2020';
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/dashboard_pemakaian_apollo",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"X-bln: ".$bln,
				"X-thn: ".$thn,
				"Cookie: rsdm_session=RHpWcKB8KgsuqNoJaoocZuc8VROAd4r0uXyKR%2Bmfx%2F4m0J0St8TJSvZoPvmEAAMHcsc9158HA9FdnZZjHGENusDL%2FzisFt%2BoXeCk8q983h0DXPaGI7lPKU4ABKOr3rGFg2o%2BvJ%2BjuT0IMmoUVvKYGjuzy%2Bb5V5pulEpXnyTkpRNd0XENgFaZYzs6lxL9oY5ZFGXU58nYY026xrWYfWZNGqeBxO7lPYh25Jx9POFlHja9FXhYhs7F1c9vhy1T8xt4UvPOtvk%2Bx1kwf8%2F%2BeHrC4rBc7DwzS%2FOAywYzLiIAsU3jEpbAqprU1ogxoVd7Rlv9nb9WgyvukpgSF%2BoKClCcfw%3D%3D"
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$data = json_decode($response, TRUE);
		return $data;
	}

	public function dashboard_peg_non_apollo(){
		$status = $this->input->post('status');
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/dashboard_detail_pegawai_nonapollo",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"X-status: ".$status,
				"Cookie: rsdm_session=RHpWcKB8KgsuqNoJaoocZuc8VROAd4r0uXyKR%2Bmfx%2F4m0J0St8TJSvZoPvmEAAMHcsc9158HA9FdnZZjHGENusDL%2FzisFt%2BoXeCk8q983h0DXPaGI7lPKU4ABKOr3rGFg2o%2BvJ%2BjuT0IMmoUVvKYGjuzy%2Bb5V5pulEpXnyTkpRNd0XENgFaZYzs6lxL9oY5ZFGXU58nYY026xrWYfWZNGqeBxO7lPYh25Jx9POFlHja9FXhYhs7F1c9vhy1T8xt4UvPOtvk%2Bx1kwf8%2F%2BeHrC4rBc7DwzS%2FOAywYzLiIAsU3jEpbAqprU1ogxoVd7Rlv9nb9WgyvukpgSF%2BoKClCcfw%3D%3D"
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
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

	public function private_token()
	{
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/MonPresensi/private_token/";
        $data = json_decode($this->get_cors($url), TRUE);
		return $data;
    }

	public function login_pendataan()

	{
		$curl = curl_init();
		$username = htmlentities($this->input->post('username', TRUE));
		$password = htmlentities($this->input->post('password', TRUE));
		$token = $this->input->post('private_token');
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/MonPresensi/login",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => array('username' => $username,'password' => $password, 'private_key' => $token),
		CURLOPT_HTTPHEADER => array(
			"Cookie: rsdm_session=DXUN%2ByA1ZQdrtPrqJj1HX6epbBqHczK8DJsoQk01gGQLdWDczdj9sCZPdXzDKsfVrw4d53T2iKUVtjyUJ4syoYVJvB9d5QnpocIX%2FKFeS3v0xY6x3RZDR7LPlLqSO4umrgmyfyu6hpIwthT5%2F0cPoK104MSoHeP5gVvyWEOasrOAIk4YuhRyuwHjRL%2FDbhl7TNG%2FuX6q%2B7k3haVWOrIfBoDiIwruyZz9qdMpHE3aJDxQA7b3oAWHvEwxCQNCwCs2VO4DBpCiwgvUD3T8Dl2czYt9Ou8Oh4eZpINcOt27gwth%2BZ%2FK2HE4t9FUmM5YHlF1HUHKcJ9eY2OzcoqRJWqEiw%3D%3D"
		),
		));
		$response = curl_exec($curl);
		$dec_response = json_decode($response);
		foreach($dec_response as $key){}
		if($key->kode == 200){	
			$array = array(
				'status_log' => TRUE,
				'username' => $key->USERNM,
				'tipe' => $key->TIPEUSER,
				'niplama' => $key->NIPLAMA,
				'nip' => $key->NIP
			);
			$this->session->set_userdata( $array );	
		}
		curl_close($curl);
		echo $response;
	}

	public function signout_pendataan(){
		$this->session->sess_destroy();
		redirect('index');
	}


	public function test(){
		echo json_encode($this->session->userdata('username'));
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
	
	public function blocked(){
        $menu['menu'] = $this->get_akses_menu();
        $this->load->view('V_navigasi',$menu);
		$this->load->view('V_blocked');
	}

}

