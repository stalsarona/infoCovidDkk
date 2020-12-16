<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->library('session');
        // if(!$this->session->userdata('username')){
        //     $this->session->set_flashdata('errorMessage', '<div class="alert alert-danger alert-dismissible"><i class="icon fas fa-exclamation-triangle"></i> Silahkan sign in terlebih dahulu !</div>');
        //     redirect('login');
        // }
        //is_logged_in(); //helper auth
	}
	
    public function index(){
        // $data['pegawai'] = $this->get_total_pegawai_kontrak();
        // $data['pengguna'] = $this->get_total_pengguna();
        //$data['dashboard'] = $this->dashboard();
       // $menu['menu'] = $this->get_akses_menu();
		// $data['token'] = $this->session->userdata('token');
        $this->load->view('V_navigasi');
        // $this->load->view('V_content1',$data);
    }

	//==============================Dashboard Start===========================//
    public function dashboard(){
        // $url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/dashboard";
        // $data = json_decode($this->get_cors($url), TRUE);
        
		return $data;
    }

	//==============================Dashboard Finish===========================//


	//==============================Autentikasi Menu Start===========================//
    /*public function get_auth_menu(){
        $tipe = $this->session->userdata('tipe');
        $menu = $this->uri->segment(1);
        $url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_auth_menu/";
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
            "X-tipe: ".$tipe,
            "X-menu: ".$menu
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, TRUE);
        //untuk scraping json harus di decode baru di looping dahulu
        //$this->output->set_content_type('application/json')->set_output(json_encode($data));
        return $data;
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
    }*/
    
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
	
	//================================Token====================================//
	/*public function get_token(){
		$curl = curl_init();
		$username = 3374134;
		$password = "b3374134";
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://119.2.50.170:9095/infocovid/servicesRs/login",
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

		curl_close($curl);
		echo $response;
		//$data = json_decode($response, TRUE);
		//return $data;
    }*/
	//==============================Autentikasi Menu Finish===========================//
	

    //==============================View Menu Start==========================//
    public function tambah_data(){ //master kerja
        if($this->session->userdata('token')==''){
            $this->session->set_flashdata('errorMessage', '<div class="alert alert-danger alert-dismissible"><i class="icon fas fa-exclamation-triangle"></i> Maaf Anda tidak memiliki akses menu tersebut !</div>');
            redirect('Dashboard');
		}
		
        $this->load->view('V_navigasi');
        $this->load->view('V_tambahdata');
    }

	/*public function jadwal_pegawai(){ //jadwal pegawai non shift
        if($this->session->userdata('tipe')!='ADM' && $this->session->userdata('tipe')!='IT'){
            $this->session->set_flashdata('errorMessage', '<div class="alert alert-danger alert-dismissible"><i class="icon fas fa-exclamation-triangle"></i> Maaf Anda tidak memiliki akses menu tersebut !</div>');
            redirect('Dashboard');
        }
        $data['jadwal'] = $this->get_waktu_kerja();
        $data['bagian'] = $this->get_bagian();
        $data['username'] = $this->session->userdata('username');
        $data['nip'] = $this->session->userdata('niplama');
        $data['token'] = $this->private_token();
        $menu['menu'] = $this->get_akses_menu();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_jadwal_pegawai',$data);
	}
	
	public function jadwal_shift_pegawai(){ //jadwal pegawai shift
        if($this->session->userdata('tipe')!='ADM' && $this->session->userdata('tipe')!='IT'){
            $this->session->set_flashdata('errorMessage', '<div class="alert alert-danger alert-dismissible"><i class="icon fas fa-exclamation-triangle"></i> Maaf Anda tidak memiliki akses menu tersebut !</div>');
            redirect('Dashboard');
        }
        $data['jadwal'] = $this->get_waktu_kerja();
        $data['bagian'] = $this->get_bagian();
        $data['username'] = $this->session->userdata('username');
        $data['nip'] = $this->session->userdata('niplama');
        $data['token'] = $this->private_token();
        $menu['menu'] = $this->get_akses_menu();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_jadwal_shift_pegawai',$data);
	}

	public function laporan(){ //riwayat presensiku
        $data['username'] = $this->session->userdata('username');
        $data['nip'] = $this->session->userdata('nip');
        $data['token'] = $this->private_token();
        $menu['menu'] = $this->get_akses_menu();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_laporan',$data);
    }

    public function laporan_bagian(){ //laporan presensi bagian
        $data['username'] = $this->session->userdata('username');
        $data['nip'] = $this->session->userdata('nip');
        $data['token'] = $this->private_token();
        $menu['menu'] = $this->get_akses_menu();
        $data['bagian'] = $this->get_bagian();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_laporan_bagian',$data);
    }*/
	//==============================View Menu Finish==========================//
	

	//==============================Function Master Kerja Start==========================//
	/*public function post_pasien_baru()
	{
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_jadwal";
        $data = json_decode($this->get_cors($url), TRUE);
        
		return $data;
	}
	
	public function get_jadwal_by_id(){
        $id = $this->input->post('id');
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_jadwal_by_id/";
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

    public function simpan_waktu_kerja(){
        $jmasuk   = $this->input->post('jammasuk');
        $mmasuk   = $this->input->post('menitmasuk');
        $jpulang  = $this->input->post('jampulang');
        $mpulang  = $this->input->post('menitpulang');
        $masuk    = ($jmasuk*3600)+($mmasuk*60);
        $pulang   = ($jpulang*3600)+($mpulang*60);
        $durasi   = $pulang-$masuk;
        $obj = array(
            'JNS_SHIFT'   => urlencode($this->input->post('idwktkerja')),
            'KET_SHIFT'   => urlencode($this->input->post('ketwktkerja')),
            'JAM_MASUK'   => $jmasuk,
            'MENIT_MASUK' => $mmasuk,
            'JAM_PULANG'  => $jpulang,
            'MENIT_PULANG'=> $mpulang,
            'DURASI'      => $durasi,
            'USER_INPUT'  => urlencode($this->session->userdata('username')),
            'JAM_INPUT'   => date("Y-m-d H:i:s"),
            'KOMP_INPUT'  => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            'private_key' => $this->input->post('private_token')
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/simpan_waktu_kerja/",
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

    public function ubah_waktu_kerja(){
        $jmasukubah   = $this->input->post('jammasukubah');
        $mmasukubah   = $this->input->post('menitmasukubah');
        $jpulangubah  = $this->input->post('jamkeluarubah');
        $mpulangubah  = $this->input->post('menitkeluarubah');
        $masukubah    = ($jmasukubah*3600)+($mmasukubah*60);
        $pulangubah   = ($jpulangubah*3600)+($mpulangubah*60);
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
            'private_key' => $this->input->post('private_tokenubah')
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/ubah_waktu_kerja/",
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
    }*/

    //======================MANAJEMEN=======================/
    /*public function monitoring(){
        if($this->session->userdata('tipe')!='MANAJEMEN'){
            $this->session->set_flashdata('errorMessage', '<div class="alert alert-danger alert-dismissible"><i class="icon fas fa-exclamation-triangle"></i> Maaf Anda tidak memiliki akses menu tersebut !</div>');
            redirect('Dashboard');
        }
        $data['pegawai'] = $this->get_hirarki_pegawai();
        $data['token'] = $this->private_token();
        $menu['menu'] = $this->get_akses_menu();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_monitoring_by_pegawai',$data);
    }

    public function get_hirarki_pegawai(){
        $nip = $this->session->userdata('niplama');
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_hirarki_pegawai/";
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
			"X-nip: ".$nip
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
        $data = json_decode($response, TRUE);
        //untuk scraping json harus di decode baru di looping dahulu
        //$this->output->set_content_type('application/json')->set_output(json_encode($data));
        //untuk menampilkan satuan (select option)
        return $data;
    }

    public function get_absen_by_bulannip(){
        $nip     = $this->input->post('nip');
        $bulan   = $this->input->post('bulan');
        $tahun   = $this->input->post('tahun');
        $periode = $tahun.''.$bulan;
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_absen_by_bulannip/";
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
            "X-nip: ".$nip,
            "X-bln: ".$periode
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
        $data = json_decode($response, TRUE);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }*/

    //===========================================ADMIN=============================//
    
    /*public function get_bagian(){
        $url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_lokasi";
        $data = json_decode($this->get_cors($url), TRUE);
        
		return $data;
    }

	public function get_pegawai_by_lokasi(){
        $bag   = $this->input->post('bagian');
        $periode = $tahun.''.$bulan;
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_pegawai_by_lokasi/";
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
            "X-bag: ".$bag
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
        $data = json_decode($response, TRUE);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_pegawai_by_bagian($bag){
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_pegawai_by_bagian/".$bag;
        $data = json_decode($this->get_cors($url), TRUE);
		return $data;
    }*/

	public function get_pasien(){
		$status   = $this->input->post('status');
		//print_r($status);exit;
		if($status == 'ri'){
			// $search_array = explode(",",$bagian);
			// $search_text = "'" . implode("', '", $search_array) . "'";
			$url = "http://api.rstugurejo.jatengprov.go.id:8060/wsrstugu/dkk/Covid/get_pasien_inap/";
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
			));

			$response = curl_exec($curl);
			curl_close($curl);
			$data = json_decode($response, TRUE);
			//untuk scraping json harus di decode baru di looping dahulu
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}else if($status == 'ri_plg'){
			$url = "http://api.rstugurejo.jatengprov.go.id:8060/wsrstugu/dkk/Covid/get_pasien_inap_plg/";
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
				"X-tgl1: ".$tgl1,
				"X-tgl2: ".$tgl2
			),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			$data = json_decode($response, TRUE);
			//untuk scraping json harus di decode baru di looping dahulu
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}else{
			$response = array('message' => 'Data tidak ditemukan',
						'status' => false,
						'code' => 404);
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function post_pasien(){
        $no			= $_POST['no'];
        $nik		= $this->input->post('nik');
        $nopas  	= $this->input->post('nopas');
        $pasien 	= $this->input->post('pasien');
        $alamat 	= $this->input->post('alamat');
        $tgllhr 	= $this->input->post('tgllhr');
        $jk  		= $this->input->post('jk');
        $masuk  	= $this->input->post('masuk');
		$noreg  	= $this->input->post('noreg');
		$kodebag  	= $this->input->post('kodebag');
		$username  	= $this->session->userdata('username');
		$token  	= $this->session->userdata('token');
		
		// $today	= date('d-m-Y');
		// $d		= date('d')-(substr($tgllhr,0,2));
		// $m		= date('m')-(substr($tgllhr,3,2));
		// $y		= date('y')-(substr($tgllhr,6,4));
		//$m		= $today->diff($tgllhr)->m;
		//$y		= $today->diff($tgllhr)->y;
		$data = array();
		//for($i = 0; $i < count(array($no)) ; $i++){
			foreach($no as $key => $val){
			

			$result = array(
				"nik"  => $no[$key],
			);
			   
		}
		print_r($result);
		//print_r($no);exit;
		/*foreach($no as $key => $val){
			$obj = array(
				'nama'  	=> $pasien[$key],
				'nik'   	=> $nik[$key],
				'nopas'   	=> $nopas[$key],
				'alamat' 	=> $alamat[$key],
				'tgllhr'  	=> $tgllhr[$key],
				'jk'		=> $jk[$key]
        	);
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://119.2.50.170:9095/infocovidtest/
				/servicesRs/tambahpasien?token=".$token,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_HTTPHEADER => array(
					"X-username: ".$username
				),
				CURLOPT_POSTFIELDS => $obj,
			));
			
			$response = curl_exec($curl);
			
			curl_close($curl);
			echo $response;
		}*/
	}
	
    /*public function get_presensi_excel($nip,$bln){
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_presensi_excel/".$nip."/".$bln;
        $data = json_decode($this->get_cors($url), TRUE);
		return $data;
    }

    public function get_riwayat_presensi(){
        $nip     = $this->session->userdata('nip');
        $bulan   = $this->input->post('bulan');
        $tahun   = $this->input->post('tahun');
        // print_r($nip);exit;
        $periode = $tahun.''.$bulan;
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_absen_by_bulannip/";
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
            "X-nip: ".$nip,
            "X-bln: ".$periode
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
        $data = json_decode($response, TRUE);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
	
	public function get_riwayat_presensi_tabel($nip,$periode){
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_absen_by_bulannip";
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
            "X-nip: ".$nip,
            "X-bln: ".$periode
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		$key = json_decode($response, TRUE);
		
		$hasil = array();
		$nomor = 0;
		
		if($key['code']=='404'){
			$hasil[] = array('nomor' => $nomor,
							'nip' => '',
							'nama' => '',
							'tanggal' => 'Data tidak ditemukan',
							'masuk' => '',
							'pulang' => '',
							'durasi' => '',
							'terlambat' => '',
							'pulangcepat' => '',
							'lembur' =>'',
							'ket' => ''
			);
		}else{
			foreach($key['data'] as $nilai){
				$nomor++;
				$hasil[] = array('nomor' => $nomor,
								'nip' => $nilai['NIP'],
								'nama' => $nilai['NAMA'],
								'tanggal' => substr($nilai['TANGGAL'],0,10),
								'masuk' => $nilai['MASUK'],
								'pulang' => $nilai['PULANG'],
								'durasi' => $nilai['DURASI'],
								'terlambat' => $nilai['TERLAMBAT'],
								'pulangcepat' => $nilai['PULANGCEPAT'],
								'lembur' => $nilai['LEMBUR'],
								'ket' => $nilai['KET'],
								'totdurasi' => ($nilai['TOTDURASI']/60),
				);
			}
		}
		$result = array('aaData' => $hasil);
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	
    public function buatExcel() {
        $kdbag      = substr($this->input->post('bagian'),0,4);
        $bag        = substr($this->input->post('bagian'),5,30);
        $bulan      = substr($this->input->post('bulan'),0,2);
        $namabulan  = substr($this->input->post('bulan'),3,4);
        $tahun      = $this->input->post('tahun');
        $periode    = $tahun.''.$bulan; 
        $peg = $this->get_pegawai_by_bagian($kdbag);
		$rows = 1;
        $no = 1; 
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			foreach ($peg as $peg) {
				    $presensi = $this->get_presensi_excel($peg['NIP'],$periode);
				    $styleArrayTitle = [
				        'font' => [
				            'bold' => true,
				            'size' => 16,
				        ],
				        'alignment' => [
				            'horizontal' => Alignment::HORIZONTAL_CENTER,
				        ],         
				    ];
				    $styleArray = [
				        'font' => [
				            'bold' => true,
				            'size' => 13,
				        ],
				        'alignment' => [
				            'horizontal' => Alignment::HORIZONTAL_LEFT,
				        ],         
				    ];
				    $styleArrayHeader = [
				        'font' => [
				            'bold' => true,
				            'size' => 12,
				        ],
				        'alignment' => [
				            'horizontal' => Alignment::HORIZONTAL_CENTER,
				        ],  
				        'borders' => [
				            'allBorders' => [
				                'borderStyle' => Border::BORDER_THIN,
				            ],
				        ],
				        'fill' => [
				            'fillType' => Fill::FILL_GRADIENT_LINEAR,
				            'rotation' => 90,
				            'startColor' => [
				                'argb' => 'FFA0A0A0',
				            ],
				            'endColor' => [
				                'argb' => 'FFFFFFFF',
				            ],
				        ],      
				    ];
				    $sheet->getStyle('A'.$rows.':K'.$rows)->applyFromArray($styleArrayTitle);
				    $sheet->getStyle('A'.($rows+3).':K'.($rows+3))->applyFromArray($styleArray);
				    $sheet->getStyle('A'.($rows+2).':K'.($rows+2))->applyFromArray($styleArray);
				    $sheet->getStyle('A'.($rows+5).':K'.($rows+5))->applyFromArray($styleArrayHeader);
				    //merge cell
				    $sheet->mergeCells('A'.$rows.':K'.$rows);
				    $sheet->getStyle('A'.($rows+5).':K'.($rows+5))->getAlignment()->setWrapText(true);
				    $sheet->getColumnDimension('A')->setWidth(5);
				    $sheet->getColumnDimension('B')->setWidth(12);
				    $sheet->getColumnDimension('C')->setWidth(15);
				    $sheet->getColumnDimension('D')->setWidth(15);
				    $sheet->getColumnDimension('E')->setWidth(12);
				    $sheet->getColumnDimension('F')->setWidth(12);
				    $sheet->getColumnDimension('G')->setWidth(16);
				    $sheet->getColumnDimension('H')->setWidth(10);
				    $sheet->getColumnDimension('I')->setWidth(10);
				    $sheet->getColumnDimension('J')->setWidth(10);
				    $sheet->getColumnDimension('K')->setWidth(16);
				    //Laporan
				    $sheet->setCellValue('A'.$rows, 'LAPORAN DETAIL HARIAN');
				    $sheet->setCellValue('A'.($rows+2), 'NIP/NAMA : ');
				    $sheet->setCellValue('C'.($rows+2), $peg['NIP'].' / '. $peg['NAMA']);
				    $sheet->setCellValue('G'.($rows+2), 'BAGIAN/UNIT : ');
				    $sheet->setCellValue('H'.($rows+2), ' '.$bag);
				    $sheet->setCellValue('A'.($rows+3), 'PERIODE : ');
				    $sheet->setCellValue('C'.($rows+3), $namabulan.' '.$tahun);
				    $sheet->setCellValue('A'.($rows+5), 'NO');
				    $sheet->setCellValue('B'.($rows+5), 'HARI');
				    $sheet->setCellValue('C'.($rows+5), 'TANGGAL');
				    $sheet->setCellValue('D'.($rows+5), 'JAM KERJA');
				    // $sheet->setCellValue('D'.($rows+5), 'KEGIATAN');
				    $sheet->setCellValue('E'.($rows+5), 'MASUK');
				    $sheet->setCellValue('F'.($rows+5), 'PULANG');
				    $sheet->setCellValue('G'.($rows+5), 'TERLAMBAT (MENIT)');       
				    $sheet->setCellValue('H'.($rows+5), 'CPT PLG (MENIT)'); 
				    $sheet->setCellValue('I'.($rows+5), 'TOTAL (MENIT)'); 
				    $sheet->setCellValue('J'.($rows+5), 'LEMBUR (MENIT)'); 
				    $sheet->setCellValue('K'.($rows+5), 'KETERANGAN'); 
				    //$row = 7;
					
				    $no = 1; 
				    if(!empty($presensi)){
				        //style border tabel
				        $styleArrayTabel = [
				            'font' => [
				                'size' => 12,
				            ],
				            'alignment' => [
				                'horizontal' => Alignment::HORIZONTAL_CENTER,
				            ],  
				            'borders' => [
				                'allBorders' => [
				                    'borderStyle' => Border::BORDER_THIN,
				                ],
				            ],
				        ];
				        foreach ($presensi as $presensi){
				            $daftar_hari = array(
				                'Sunday' => 'Minggu',
				                'Monday' => 'Senin',
				                'Tuesday' => 'Selasa',
				                'Wednesday' => 'Rabu',
				                'Thursday' => 'Kamis',
				                'Friday' => 'Jumat',
				                'Saturday' => 'Sabtu'
							);
				            $tglabsen = substr($presensi['TANGGAL'],0,10);
				            $namahari = date('l', strtotime($tglabsen));
				            $sheet->getStyle('A'.($rows+6).':K'.($rows+6))->applyFromArray($styleArrayTabel);
				            $sheet->setCellValue('A'.($rows+6), ''.$no.'');
				            $sheet->setCellValue('B'.($rows+6), $daftar_hari[$namahari]);
				            $sheet->setCellValue('C'.($rows+6), $tglabsen);
				            $sheet->setCellValue('D'.($rows+6), $presensi['CHECKIN'].'-'.$presensi['CHECKOUT']);
				            $sheet->setCellValue('E'.($rows+6), $presensi['MASUK']);
				            $sheet->setCellValue('F'.($rows+6), $presensi['PULANG']);
				            $sheet->setCellValue('G'.($rows+6), ''.$presensi['TERLAMBAT'].'');
				            $sheet->setCellValue('H'.($rows+6), ''.$presensi['PULANGCEPAT'].'');
				            $sheet->setCellValue('I'.($rows+6), ''.$presensi['DURASI'].'');
				            $sheet->setCellValue('J'.($rows+6), ''.$presensi['LEMBUR'].'');
				            $sheet->setCellValue('K' . ($rows+6), '');
							
				            $rows++;
				            $no++;
				            $sheet->getStyle('A'.($rows+5).':K'.($rows+5))->applyFromArray($styleArrayTabel);
				        }
				        $totterlambat   = round($presensi['TOTTERLAMBAT']/60,2);
				        $totplgcepat    = round($presensi['TOTPULANGCEPAT']/60,2);
				        $totdurasi      = round($presensi['TOTDURASI']/60,2);
				        $totlembur      = round($presensi['TOTLEMBUR']/60,2);
				        $sheet->getStyle('A'.($rows+7).':K'.($rows+7))->applyFromArray($styleArray);
				        $sheet->getStyle('A'.($rows+8).':K'.($rows+8))->applyFromArray($styleArray);
				        $sheet->setCellValue('A' . ($rows+7), 'JUMLAH TERLAMBAT = '.$totterlambat.' jam');
				        $sheet->setCellValue('A' . ($rows+8), 'JUMLAH PLG CEPAT = '.$totplgcepat.' jam');
				        $sheet->setCellValue('E' . ($rows+7), 'JUMLAH JAM KERJA = '.$totdurasi.' jam');
				        $sheet->setCellValue('E' . ($rows+8), 'JUMLAH LEMBUR = '.$totlembur.' jam');
				    }
				    $rows++;
				    $rows=12+ $rows++;
					
				}
				$sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
				$sheet->getPageSetup()->setScale(90);
			
			
			$writer = new Xlsx($spreadsheet);
			$filename = 'Laporan Presensi-'.$namabulan.' '.$tahun;
			// $filename = 'Laporan Presensi';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
            $writer->save('php://output');
            // exit;
	}  
	
	public function get_dashboard_peg_non_apollo($waktu,$status){
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/excel_detail_pegawai_nonapollo/".$waktu."/".$status;
        $data = json_decode($this->get_cors($url), TRUE);
		return $data;
	}
	
	public function simpanExcelDaftarPegawai() {
		$status = $this->input->post('status');
		$now = date("Y-m-d");
		$thn = substr($now,0,4);
		$bln = substr($now,5,2);
		$waktu = $thn.''.$bln;
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
				    $styleArrayTitle = [
				        'font' => [
				            'bold' => true,
				            'size' => 16,
				        ],
				        'alignment' => [
				            'horizontal' => Alignment::HORIZONTAL_LEFT,
				        ],         
				    ];
				    $styleArrayHeader = [
				        'font' => [
				            'bold' => true,
				            'size' => 12,
				        ],
				        'alignment' => [
				            'horizontal' => Alignment::HORIZONTAL_CENTER,
				        ],  
				        'borders' => [
				            'allBorders' => [
				                'borderStyle' => Border::BORDER_THIN,
				            ],
				        ],
				        'fill' => [
				            'fillType' => Fill::FILL_GRADIENT_LINEAR,
				            'rotation' => 90,
				            'startColor' => [
				                'argb' => 'FFA0A0A0',
				            ],
				            'endColor' => [
				                'argb' => 'FFFFFFFF',
				            ],
				        ],      
					];
					
					$peg 	= $this->get_dashboard_peg_non_apollo($waktu,$status);
					$rows 	= 1;
				    $sheet->getStyle('A'.$rows.':C'.$rows)->applyFromArray($styleArrayTitle);
				    $sheet->getStyle('A'.($rows+2).':C'.($rows+2))->applyFromArray($styleArrayHeader);
				    //merge cell
				    // $sheet->mergeCells('A'.$rows.':C'.$rows);
				    $sheet->getStyle('A'.($rows+2).':C'.($rows+2))->getAlignment()->setWrapText(true);
				    $sheet->getColumnDimension('A')->setWidth(5);
				    $sheet->getColumnDimension('B')->setWidth(25);
					$sheet->getColumnDimension('C')->setWidth(39);
					// print_r($status);exit;
				    //Laporan
				    $sheet->setCellValue('A'.$rows, 'LAPORAN PEGAWAI '.$status.' BELUM APOLLO');
				    $sheet->setCellValue('A'.($rows+2), 'NO');
				    $sheet->setCellValue('B'.($rows+2), 'NIP');
				    $sheet->setCellValue('C'.($rows+2), 'NAMA');
					
				    $no = 1; 
				        //style border tabel
				        $styleArrayTabel = [
				            'font' => [
				                'size' => 12,
				            ],
				            'alignment' => [
				                'horizontal' => Alignment::HORIZONTAL_LEFT,
				            ],  
				            'borders' => [
				                'allBorders' => [
				                    'borderStyle' => Border::BORDER_THIN,
				                ],
				            ],
				        ];
					foreach ($peg as $peg) { 
						$sheet->getStyle('A'.($rows+3).':C'.($rows+3))->applyFromArray($styleArrayTabel);
						$sheet->setCellValue('A'.($rows+3), ''.$no.'');
						$sheet->setCellValue('B'.($rows+3), $peg['NIP2']);
						$sheet->setCellValue('C'.($rows+3), $peg['NAMA']);
						
						$rows++;
						$no++;
						$sheet->getStyle('A'.($rows+2).':C'.($rows+2))->applyFromArray($styleArrayTabel);
					}
				$sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
				$sheet->getPageSetup()->setScale(90);
			
			
			$writer = new Xlsx($spreadsheet);
			$filename = 'Laporan Pegawai '.$status.' Belum Apollo';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
            $writer->save('php://output');
            // exit;
    }*/  
}

/* End of file Dashboard.php */
