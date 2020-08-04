<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use \PhpOffice\PhpSpreadsheet\Style\Alignment;
use \PhpOffice\PhpSpreadsheet\Style\Border;
use \PhpOffice\PhpSpreadsheet\Style\Fill;
use \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class Dashboard extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // if(!$this->session->userdata('username')){
        //     $this->session->set_flashdata('errorMessage', '<div class="alert alert-danger alert-dismissible"><i class="icon fas fa-exclamation-triangle"></i> Silahkan sign in terlebih dahulu !</div>');
        //     redirect('login');
        // }
        is_logged_in(); //helper auth
    }
    
    public function index(){
        // $data['pegawai'] = $this->get_total_pegawai_kontrak();
        // $data['pengguna'] = $this->get_total_pengguna();
        $data['dashboard'] = $this->dashboard();
        $menu['menu'] = $this->get_akses_menu();
        $data['authmenu'] = $this->get_auth_menu();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_content1',$data);
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

    public function dashboard(){
        $url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/dashboard";
        $data = json_decode($this->get_cors($url), TRUE);
        
		return $data;
    }

    public function get_auth_menu(){
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
        if($this->session->userdata('tipe')!='ADM' && $this->session->userdata('tipe')!='IT'){
            $this->session->set_flashdata('errorMessage', '<div class="alert alert-danger alert-dismissible"><i class="icon fas fa-exclamation-triangle"></i> Maaf Anda tidak memiliki akses menu tersebut !</div>');
            redirect('Dashboard');
        }
        $data['data'] = $this->get_jadwal();
        $data['username'] = $this->session->userdata('username');
        $data['nip'] = $this->session->userdata('niplama');
        $data['token'] = $this->private_token();
        $menu['menu'] = $this->get_akses_menu();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_jadwal',$data);
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

    public function private_token(){
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/private_token/";
        $data = json_decode($this->get_cors($url), TRUE);
       
		return $data;
    }

    public function simpan_jadwal(){
        $jmasuk   = $this->input->post('jammasuk');
        $mmasuk   = $this->input->post('menitmasuk');
        $jpulang  = $this->input->post('jampulang');
        $mpulang  = $this->input->post('menitpulang');
        $masuk    = ($jmasuk*60)+$mmasuk;
        $pulang   = ($jpulang*60)+$mpulang;
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
            CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/simpan_jadwal/",
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

    public function get_jadwal()
	{
		
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_jadwal";
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

    //======================MANAJEMEN=======================/
    public function monitoring(){
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
    }

    public function get_absen_by_bulannip_baru($nip,$tahun,$bulan)
	{
		$url = 'http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_absen_by_bulannip/';
		$header = array(             
            "X-nip: ".$nip,
            "X-bln: ".$tahun.''.$bulan	
			);
		$data = $this->get_cors($url, $header);
		$key = json_decode($data, TRUE);
		$hasil = array();
		$nomor = 0;
		foreach($key as $key){
			$nomor++;
			$hasil[] = array('nomor' => $nomor,
							 'TANGGAL' => $key['TANGGAL'],
							 'JAMKERJA' => $key['CHECKIN'].'-'.$key['CHECKOUT'],
							 'KEGIATAN' => $key['KEGIATAN'],
							 'MASUK' => $key['MASUK'],
							 'PULANG' => $key['PULANG']
			);
		}
		$result = array('aaData' => $hasil);
		$this->output->set_content_type('application/json')->set_output(json_encode($result));	
	}

    //===========================================ADMIN=============================//
    public function laporan(){
        $data['username'] = $this->session->userdata('username');
        $data['nip'] = $this->session->userdata('nip');
        $data['token'] = $this->private_token();
        $menu['menu'] = $this->get_akses_menu();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_laporan',$data);
    }

    public function laporan_bagian(){
        $data['username'] = $this->session->userdata('username');
        $data['nip'] = $this->session->userdata('nip');
        $data['token'] = $this->private_token();
        $menu['menu'] = $this->get_akses_menu();
        $data['bagian'] = $this->get_bagian();
        $this->load->view('V_navigasi',$menu);
        $this->load->view('V_laporan_bagian',$data);
    }

    
    public function get_bagian(){
        $url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_lokasi";
        $data = json_decode($this->get_cors($url), TRUE);
        
		return $data;
    }

    public function get_pegawai_by_bagian($bag){
        //$bag = $this->input->post('bagian');
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_pegawai_by_bagian/".$bag;
        $data = json_decode($this->get_cors($url), TRUE);
		return $data;
    }

    public function get_presensi_excel($nip,$bln){
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wspresensi/rstugu/MonPresensi/get_presensi_excel/".$nip."/".$bln;
        $data = json_decode($this->get_cors($url), TRUE);
        //$this->output->set_content_type('application/json')->set_output(json_encode($data));
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
    
    public function buatExcel() {
        $kdbag     = $this->input->post('kdbag');
        $bag     = $this->input->post('bag');
        $bulan   = $this->input->post('bulan');
        $namabulan   = $this->input->post('namabulan');
        $tahun   = $this->input->post('tahun');
        $periode = $tahun.''.$bulan;
		$fileName = 'Laporan Presensi-'.$namabulan.' '.$tahun;  
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	
        $peg = $this->get_pegawai_by_bagian($kdbag);
        
        $rows = 1;
        $no = 1; 
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
            $sheet->setCellValue('A'.($rows+2), 'NIP / NAMA : ');
            $sheet->setCellValue('C'.($rows+2), $peg['NIP'].' / '. $peg['NAMA']);
            $sheet->setCellValue('G'.($rows+2), 'DEPARTEMEN : ');
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
                    $sheet->setCellValue('A' . ($rows+6), $no);
                    $sheet->setCellValue('B' . ($rows+6), $daftar_hari[$namahari]);
                    $sheet->setCellValue('C' . ($rows+6), $tglabsen);
                    $sheet->setCellValue('D' . ($rows+6), $presensi['CHECKIN'].'-'.$presensi['CHECKOUT']);
                    // $sheet->setCellValue('D' . ($rows+6), $presensi['KEGIATAN']);
                    $sheet->setCellValue('E' . ($rows+6), $presensi['MASUK']);
                    $sheet->setCellValue('F' . ($rows+6), $presensi['PULANG']);
                    $sheet->setCellValue('G' . ($rows+6), $presensi['TERLAMBAT']);
                    $sheet->setCellValue('H' . ($rows+6), $presensi['PULANGCEPAT']);
                    $sheet->setCellValue('I' . ($rows+6), $presensi['DURASI']);
                    $sheet->setCellValue('J' . ($rows+6), $presensi['LEMBUR']);
                    // $sheet->setCellValue('K' . ($rows+6), $presensi['KET']);
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
        header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $fileName .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        // $writer->save('php://output');
		$writer->save($fileName.'.xlsx');
   
    }  
}

/* End of file Dashboard.php */