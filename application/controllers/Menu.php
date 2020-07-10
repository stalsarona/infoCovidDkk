<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        is_logged_in(); //helper auth
        if(!$this->session->userdata('username')){
            $this->session->set_flashdata('errorMessage', '<div class="alert alert-danger alert-dismissible"><i class="icon fas fa-exclamation-triangle"></i> Silahkan sign in terlebih dahulu !</div>');
            redirect('login');
        }else if($this->session->userdata('username') && $this->session->userdata('tipe')!='IT'){
            $this->session->set_flashdata('errorMessage', '<div class="alert alert-danger alert-dismissible"><i class="icon fas fa-exclamation-triangle"></i> Maaf Anda tidak memiliki akses menu tersebut !</div>');
            redirect('Dashboard');
        }
    }
    
    public function index()
    {
        $data['menu'] = $this->get_menu();
        $menu['menu'] = $this->get_akses_menu();
        $data['token'] = $this->private_token();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_konfigurasi_menu',$data);      
    }

    public function akses_menu(){
        $menu['menu'] = $this->get_akses_menu();
        $data['role'] = $this->get_role_user();
        $data['token'] = $this->private_token();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_akses_menu',$data);     
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
        return $data;
    }
    
    public function error(){
        $this->load->view('V_navigasi');
        $this->load->view('V_content1');
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
    
    //======================ORPEG=======================/
    public function view_jadwal(){
        if ($this->session->userdata('status_log') != TRUE) {
			$this->session->set_flashdata('errorMessage', '<div class="alert alert-danger">Silahkan masuk dahulu !</div>');
					redirect('login');
        }
        
        $data['data'] = $this->get_jadwal();
        $data['username'] = $this->session->userdata('username');
        $data['nip'] = $this->session->userdata('niplama');
        $data['token'] = $this->private_token();
        $menu['menu'] = $this->get_akses_menu();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_jadwal',$data);
    }

    public function get_menu_by_id(){
        $id = $this->input->post('id');

		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_menu_by_id/";

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
			"X-id: ".$id
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
        $data = json_decode($response, TRUE);
        //untuk scraping json harus di decode baru di looping dahulu
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_menu_by_role(){
        $id = $this->input->post('id');

		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_menu_by_role/";

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
			"X-tipe: ".$id
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
        $data = json_decode($response, TRUE);
        //untuk scraping json harus di decode baru di looping dahulu
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function private_token(){
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/private_token/";
        $data = json_decode($this->get_cors($url), TRUE);
       
		return $data;
    }

    public function simpan_menu(){
        $obj = array(
            'judul'   => urlencode($this->input->post('judul')),
            'controller'   => urlencode($this->input->post('controller')),
            'url'   => urlencode($this->input->post('url')),
            'icon'   => urlencode($this->input->post('icon')),
            'active'   => urlencode($this->input->post('status')),
            'private_key' => $this->input->post('private_token')
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/simpan_menu/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $obj,
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
        
    }

    public function get_menu()
	{
		
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_menu";
        $data = json_decode($this->get_cors($url), TRUE);
        
		return $data;
    }
    
    public function get_role_user()
	{
		
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_role_user";
        $data = json_decode($this->get_cors($url), TRUE);
        
		return $data;
    }

    public function get_total_pegawai_kontrak()
	{
		
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_total_pegawai_kontrak";
        $data = json_decode($this->get_cors($url), TRUE);
        
		return $data;
	}
    
    public function get_total_pengguna()
	{
		
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_total_pengguna";
        $data = json_decode($this->get_cors($url), TRUE);
        
		return $data;
    }
    
    public function ubah_jadwal(){
        $jmasukubah   = $this->input->post('jammasukubah');
        $mmasukubah   = $this->input->post('menitmasukubah');
        $jpulangubah  = $this->input->post('jamkeluarubah');
        $mpulangubah  = $this->input->post('menitkeluarubah');
        $masukubah    = ($jmasukubah*60)+$mmasukubah;
        $pulangubah   = ($jpulangubah*60)+$mpulangubah;
        $durasiubah   = $pulangubah-$masukubah;
		$obj = array(
            'JNS_SHIFT'   => urlencode($this->input->post('id_waktu')),
            'KET_SHIFT'   => urlencode($this->input->post('jenis')),
            'JAM_MASUK'   => $jmasukubah,
            'MENIT_MASUK' => $mmasukubah,
            'JAM_PULANG'  => $jpulangubah,
            'MENIT_PULANG'=> $mpulangubah,
            'DURASI'      => $durasiubah,
            'USER_UBAH'  => urlencode($this->session->userdata('username')),
            'JAM_UBAH'   => date("Y-m-d H:i:s"),
            'KOMP_UBAH'  => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            'private_key' => $this->input->post('private_token')
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/ubah_jadwal/",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $obj,
          
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
    }

    public function ubah_akses_menu(){
		$obj = array(
            'menu'   => urlencode($this->input->post('menuId')),
            'tipe'   => urlencode($this->input->post('roleId')),
            'komp'  => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            // 'USER_UBAH'  => urlencode($this->session->userdata('username')),
            'jam'   => date("Y-m-d H:i:s"),
            'private_key' => $this->input->post('private_token')
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/ubah_akses_menu/",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $obj,
          
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
    }
    
}

/* End of file Menu.php */