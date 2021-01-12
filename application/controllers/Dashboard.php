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
        
		//return $data;
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

    public function tambah_data(){ //master kerja
        if($this->session->userdata('token')==''){
            $this->session->set_flashdata('errorMessage', '<div class="alert alert-danger alert-dismissible"><i class="icon fas fa-exclamation-triangle"></i> Maaf Anda tidak memiliki akses menu tersebut !</div>');
            redirect('Dashboard');
		}
		
        $this->load->view('V_navigasi');
        $this->load->view('V_tambahdata');
	}
	
	function pasienInap(){
		$url = 'http://api.rstugurejo.jatengprov.go.id:8060/wsrstugu/dkk/Covid/get_pasien_inap/';
		$ex = WEBSERVICES::getCors($url, array());
		$data = json_decode($ex);
		$result = array();
		$no = 0;
		foreach ($data->data as $key => $value) {
			$no++;
			$result[] = array(
				"no" => $no,
				"inputcheck" => '<input type="checkbox" class="" id="'.$value->NOPASIEN.'">',
				"nopasien" => $value->NOPASIEN,
				"namapasien" => $value->NAMAPASIEN,
				"alamat" => $value->ALAMAT,
				"tgllahir" => $value->TGLLAHIR,
				"jnskelamin" => $value->JNSKELAMIN,
				"nik" => $value->NIK,
				"noreg" => $value->NOREG,
				"kodebagian" => $value->KODEBAGIAN,
				"namabagian" => $value->NAMABAGIAN,
				"tanggal" => 'Tanggal Masuk : '.$value->TGLMASUK
			);
		}
		$final = array('aaData' => $result);
		echo json_encode($final);
	}

	function pasienInapPulang($awal, $akhir){
		$header = array(
			"X-tgl1: ".$awal,
			"X-tgl2: ".$akhir
		);
		$url = 'http://api.rstugurejo.jatengprov.go.id:8060/wsrstugu/dkk/Covid/get_pasien_inap_plg/';
		$ex = WEBSERVICES::getCors($url, $header);
		$data = json_decode($ex);
		$result = array();
		$no = 0;
		foreach ($data->data as $key => $value) {
			$no++;
			$result[] = array(
				"no" => $no,
				"inputcheck" => '<input type="checkbox" class="" id="'.$value->NOPASIEN.'">',
				"nopasien" => $value->NOPASIEN,
				"namapasien" => $value->NAMAPASIEN,
				"alamat" => $value->ALAMAT,
				"tgllahir" => $value->TGLLAHIR,
				"jnskelamin" => $value->JNSKELAMIN,
				"nik" => $value->NIK,
				"noreg" => $value->NOREG,
				"kodebagian" => $value->KODEBAGIAN,
				"namabagian" => $value->NAMABAGIAN,
				"tanggal" => 'Tanggal Pulang: '.$value->TGLPULANG
			);
		}
		$final = array('aaData' => $result);
		echo json_encode($final);
	}

	function pasienRajal($awal, $akhir)
	{
		$header = array(
			"X-tgl1: ".$awal,
			"X-tgl2: ".$akhir
		);
		$url = 'http://api.rstugurejo.jatengprov.go.id:8060/wsrstugu/dkk/Covid/get_pasien_rajal/';
		$ex = WEBSERVICES::getCors($url, $header);
		$data = json_decode($ex);
		$result = array();
		$no = 0;
		foreach ($data->data as $key => $value) {
			$no++;
			$result[] = array(
				"no" => $no,
				"inputcheck" => '<input type="checkbox" class="" id="'.$value->NOPASIEN.'">',
				"nopasien" => $value->NOPASIEN,
				"namapasien" => $value->NAMAPASIEN,
				"alamat" => $value->ALAMAT,
				"tgllahir" => $value->TGLLAHIR,
				"jnskelamin" => $value->JNSKELAMIN,
				"nik" => $value->NIK,
				"noreg" => $value->NOREG,
				"kodebagian" => $value->KODEBAGIAN,
				"namabagian" => $value->NAMABAGIAN,
				"tanggal" => 'Tanggal Reg. :'.$value->TGLREG
			);
		}
		$final = array('aaData' => $result);
		echo json_encode($final);
	}

	public function get_pasien(){
		$status   = $this->input->get('status');
		$tgl1 = $this->input->get('awal');
		$tgl2 = $this->input->get('akhir');
		if($status == 'ri'){
			$this->pasienInap();
		}else if($status == 'ri_plg'){
			$this->pasienInapPulang($tgl1, $tgl2);
		} else if($status == 'rj'){
			$this->pasienRajal($tgl1, $tgl2);
		}else{
			$response = array('message' => 'Data tidak ditemukan',
						'status' => false,
						'code' => 404);
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function parsingDkk()
	{
		$obj = array(
			'nama'  	=> $this->input->post('nama'),
			'nik'   	=> $this->input->post('nik'),
			'umur'   	=> '-',
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'jk'		=> $this->input->post('jk'),
			'alamat'	=> $this->input->post('alamat'),
			'rt'	=> '-',
			'rw'	=> '-',
			'kelurahan' => '-',
			'kecamatan' => '-',
			'kota'	=> '-',
			'provinsi' => '-',
			'status_kehamilan' => 0,
			'status' => 'Tidak ada riwayat kontak/perjalanan',
			'indek_kasus' => '-',
			'lokasi' => '-',
			'tgl_kontak' => '-',
			'agama' => '-',
			'gejala_awal' => '-',
			'telp' => '-',
			'etnis' => '-'
		);
		// $curl = curl_init();

		// curl_setopt_array($curl, array(
		// CURLOPT_URL => 'http://119.2.50.170:9095/infocovidtest/servicesRs/tambahpasien?token='.$this->session->userdata('token'),
		// CURLOPT_RETURNTRANSFER => true,
		// CURLOPT_ENCODING => '',
		// CURLOPT_MAXREDIRS => 10,
		// CURLOPT_TIMEOUT => 0,
		// CURLOPT_FOLLOWLOCATION => true,
		// CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// CURLOPT_CUSTOMREQUEST => 'POST',
		// CURLOPT_POSTFIELDS => $obj,
		// CURLOPT_HTTPHEADER => array(
		// 	'x-username: 3374134'
		// ),
		// ));

		// $response = curl_exec($curl);

		// curl_close($curl);
		echo json_encode($obj);
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
}

/* End of file Dashboard.php */
