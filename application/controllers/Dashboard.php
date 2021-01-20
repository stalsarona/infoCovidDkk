<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	var $url = 'http://119.2.50.170:9095/infocovidtest/';
    
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
		$data['flag'] = $this->getListFlag();
        $this->load->view('V_navigasi');
        $this->load->view('V_tambahdata', $data);
	}
	
	public function pasienInap(){
		$url = 'http://api.rstugurejo.jatengprov.go.id:8060/wsrstugu/dkk/Covid/get_pasien_inap/';
		$ex = WEBSERVICES::getCors($url, array());
		$data = json_decode($ex);
		$result = array();
		$no = 0;
		foreach ($data->data as $key => $value) {
			$no++;
			$result[] = array(
				"no" => $no,
				"inputcheck" => '<input type="checkbox" class="cek" id="'.$value->NOPASIEN.'" 
									data-nama="'.$value->NAMAPASIEN.'"
									data-nik="'.$value->NIK.'"
									data-alamat="'.$value->ALAMAT.'"
									data-tgllahir="'.$value->TGLLAHIR.'"
									data-jk="'.$value->JNSKELAMIN.'"
									data-nopas="'.$value->NOPASIEN.'">',
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

	public function pasienInapPulang($awal, $akhir){
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
				"inputcheck" => '<input type="checkbox" class="cek" id="'.$value->NOPASIEN.'" 
									data-nama="'.$value->NAMAPASIEN.'"
									data-nik="'.$value->NIK.'"
									data-alamat="'.$value->ALAMAT.'"
									data-tgllahir="'.$value->TGLLAHIR.'"
									data-jk="'.$value->JNSKELAMIN.'"
									data-nopas="'.$value->NOPASIEN.'">',
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

	public function pasienRajal($awal, $akhir)
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
				"inputcheck" => '<input type="checkbox" class="cek" id="'.$value->NOPASIEN.'" 
									data-nama="'.$value->NAMAPASIEN.'"
									data-nik="'.$value->NIK.'"
									data-alamat="'.$value->ALAMAT.'"
									data-tgllahir="'.$value->TGLLAHIR.'"
									data-jk="'.$value->JNSKELAMIN.'"
									data-nopas="'.$value->NOPASIEN.'">',
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

	public function getDetailPasien($nik)
	{
		$str   = "TUGUREJORSUD2019";
		$dates = date('dmY');
		$passId = md5($str.$dates);
		$url ='http://adminduk.jatengprov.go.id:8282/ws_server/get_json/RSUDTUGUREJO/GET_NIK_TUGUREJO?USER_ID=RSUDTUGUREJO&PASSWORD='.$passId.'&NIK='.$nik;
		$ex = WEBSERVICES::getCors($url, array());
		$desc = json_decode($ex);
		return $desc;
	}

	public function parsingDkk()
	{
		$nik = $this->input->post('nik');
		$getDetailPasien = $this->getDetailPasien($nik);
		$getDetailPasien->totalElements > 0 ? $data = $getDetailPasien : $data ='-';
		if($data === '-'){
			$obj = array('message' => 'Kelengkapan data bermasalah', 'status' => false);
		} else {
			$obj = array(
				'nama'  	=> $this->input->post('nama'),
				'nik'   	=> $nik,
				'umur'   	=> '-',
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'jk'		=> $this->input->post('jk'),
				'alamat'	=> $this->input->post('alamat'),
				'rt'	=> $data->content[0]->NO_RT,
				'rw'	=> $data->content[0]->NO_RW,
				'kelurahan' => $data->content[0]->NO_KEL,
				'kecamatan' => $data->content[0]->NO_KEC,
				'kota'	=> $data->content[0]->NO_KAB,
				'provinsi' => $data->content[0]->NO_PROP,
				'status_kehamilan' => 0,
				'status' => 'Tidak ada riwayat kontak/perjalanan',
				'indek_kasus' => '-',
				'lokasi' => '-',
				'tgl_kontak' => '-',
				'agama' => $data->content[0]->NO_AGAMA,
				'gejala_awal' => '-',
				'telp' => '-',
				'etnis' => '-'
			);
		}
		$url = 'http://119.2.50.170:9095/infocovidtest/servicesRs/tambahpasien?token='.$this->getToken();
		$header = array(
			'x-username : 3374134'
		);
		$ex = WEBSERVICES::postCors($url, $obj, $header);
		echo $ex;
	}

	public function getListFlag()
	{
		$url = $this->url.'servicesRs/get_new_flag';
		$ex = WEBSERVICES::getCors($url, array(), array());
		$data = json_decode($ex);

		return $data->flag;
	}

	public function flag()
	{
		$flag = $this->input->post('flag');
		$tgl_penetapan = str_replace('/','-',$this->input->post('tgl_penetapan'));
		$nik = $this->input->post('nik');
		switch ($flag) {
			case 1:
				$data = $this->flagStatus($nik, $tgl_penetapan, 'kontak_erat');
				break;
			case 2:
				$data = $this->flagStatus($nik, $tgl_penetapan, 'pelaku_perjalanan');
				break;
			case 3:
				$data = 'Discarded';
				break;
			case 4: 
				$data = $this->flagStatus($nik, $tgl_penetapan, 'suspek');
				break;
			case 5:
				$data = $this->flagStatus($nik, $tgl_penetapan, 'konfirmasi	');
				break;
			case 6:
				$data = $this->flagStatus($nik, $tgl_penetapan, 'probable');
				break;
			case 7:
				$data = $this->flagStatus($nik, $tgl_penetapan, 'meninggal');
				break;
			case 8:
				$data = $this->flagStatus($nik, $tgl_penetapan, 'selesai_isolasi');
				break;
			case 71:
				$data = $this->flagStatus($nik, $tgl_penetapan, 'meninggal_probable');
				break;
			case 72:
				$data = $this->flagStatus($nik, $tgl_penetapan, 'meninggal_negatif');
				break;
			default:
				$data = $this->flagStatus($nik, $tgl_penetapan, 'kontak_erat');
				break;
		}
		echo $data;
	}

	public function getToken()
	{
		$url = $this->url.'servicesRs/login';
		$header = array(
			'x-username: 3374134',
			'x-password:b3374134'
		);
		$ex = WEBSERVICES::postCors($url, array(), $header);
		$data = json_decode($ex);
		return $data->token;
	}

	public function flagStatus($nik, $tgl, $flagStatus){
		$token = $this->getToken();
		$url = $this->url.'servicesRs/'.$flagStatus.'?token='.$token;
		$field = array('nik' => $nik, 'tgl_penetapan_status' => $tgl);
		$header = array('x-username: 3374134');
		$ex = WEBSERVICES::postCors($url, $field, $header);
		return $ex;
	}

	public function dataRegional($region)
	{
		$url = 'http://119.2.50.170:9095/infocovidtest/servicesRs/'.$region;
		$ex = WEBSERVICES::getCors($url, array(), array());
		echo $ex;
	}
}

/* End of file Dashboard.php */
