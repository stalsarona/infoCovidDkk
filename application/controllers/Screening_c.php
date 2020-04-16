<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screening_c extends CI_Controller {

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
		// $data['js_soal_detail'] = $this->get_pertanyaan_detail_();
		$data['soal'] = $this->tampilan_pertanyaan_new();
		$data['js_soal'] = $this->get_pertanyaan();
		$this->load->view('screening', $data);
	}

	public function test()
	{
		// $data = $this->db->get('CORONA_SOALH')->result();
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		$data = 'Semarang,kendal,jakarta';
		$new = explode(',', $data);
		foreach ($new as $key) {
			echo $key;
		}
		
	}

	public function error()
	{
		$this->load->view('404');
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

	public function get_js()
    {
		$id              = "TUGUREJORSUD2019";
		$get_log['todays']			 = date('dmY');
		$get_log['pass']            = md5($id.$get_log['todays']);

		$ktp = $this->input->post('ktp');
		//$get_pass = $this->get_log();
        $url = "http://adminduk.jatengprov.go.id:8282/ws_server/get_json/RSUDTUGUREJO/GET_NIK_TUGUREJO?USER_ID=RSUDTUGUREJO&PASSWORD=".$get_log['pass']."&NIK=".$ktp."";
        $data = json_decode($this->get_cors($url), TRUE);
        //$data = $this->get_cors($url);
        //untuk scraping json harus di decode baru di looping dahulu
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	
	public function new_get()
	{
		$id         ="TUGUREJORSUD2019";
		$get_log['todays']			 = date('dmY');
		$get_log['pass']            = md5($id.$get_log['todays']);
		$ktp = $this->input->post('ktp');
		$url = "http://adminduk.jatengprov.go.id:8282/ws_server/get_json/RSUDTUGUREJO/GET_NIK_TUGUREJO?USER_ID=RSUDTUGUREJO&PASSWORD=".$get_log['pass']."&NIK=".$ktp."";
		$get_url = file_get_contents($url);
		$real = json_decode($get_url, true);
		$hasil = array();
		foreach($real as $key){
			$hasil[] = array('ktp' => $key['NIK']);
		}
		$this->output->set_content_type('application/json')->set_output(json_decode($hasil));	
	}

	public function get_pertanyaan()
	{
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/covid/get_pertanyaan";
        $data = json_decode($this->get_cors($url), TRUE);
        //$data = $this->get_cors($url);
        //untuk scraping json harus di decode baru di looping dahulu
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		return $data;
	}

	public function get_pertanyaan_bykode($id)
	{
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/covid/get_pertanyaan_bykode/".$id;
        $data = json_decode($this->get_cors($url), TRUE);
      
		return $data;
	}

	public function get_pertanyaan_detail_()
	{
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/covid/get_detail_pertanyaan_";
        $data = json_decode($this->get_cors($url), TRUE);
        //$data = $this->get_cors($url);
        //untuk scraping json harus di decode baru di looping dahulu
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		return $data;
	}

	public function get_pertanyaan_detail($tipe)
	{
		
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/covid/get_detail_pertanyaan/".$tipe;
        $data = json_decode($this->get_cors($url), TRUE);
       
		return $data;
	}

	public function tampilan_pertanyaan_new()
	{
		
		$contenku = '';
		$cek = array("Gejala", "Riwayat");
		foreach ($cek as $cek_status) {
			if($cek_status == "Gejala"){
				$contenku .= '<h2>'.$cek_status.'</h2>';
				
				$pertanyaan = $this->get_pertanyaan();
				foreach ($pertanyaan as $pertanyaan ) {		
					if($pertanyaan['STATUS'] == 'A'){
						if($pertanyaan['SUBGROUP'] == 'GEJALA'){
							$contenku .= '<div class="card card-warning card-outline">
											<div class="card-header">
												<div class="card-body">
													<div class="row">
													<div class="col-md-12">
													<label>'.$pertanyaan['SOAL'].'</label>';
							$pertanyaan_detail = $this->get_pertanyaan_detail($pertanyaan['IDSOAL']);
							foreach ($pertanyaan_detail as $pertanyaan_detail) {						
							$contenku .=			'<div class="col-sm-10">
														<div class="form-check">
														<input class="form-check-input validate" type="radio" name="'.$pertanyaan_detail['IDSOAL'].'-radio" id="'.$pertanyaan_detail['IDSOALDTL'].'" value="'.$pertanyaan_detail['DESCR'].'">
															<label class="form-check-label" for="gridRadios1">
															'.$pertanyaan_detail['DESCR'].'
															</label>
														</div>
													</div>';
							}												
							$contenku .= 			'</div>
													</div>
												</div>
											</div>
										</div>';
						} 
					}
				}
			} else {
				$contenku .= '<h2>'.$cek_status.'</h2>';
				$pertanyaan = $this->get_pertanyaan();
				foreach ($pertanyaan as $pertanyaan ) {		
					if($pertanyaan['STATUS'] == 'A'){
						if($pertanyaan['SUBGROUP'] == 'RIWAYAT'){
							$contenku .= '<div class="card card-danger card-outline">
											<div class="card-header">
												<div class="card-body">
													<div class="row">
													<div class="col-md-12">
													<label>'.$pertanyaan['SOAL'].'</label>';
							$pertanyaan_detail = $this->get_pertanyaan_detail($pertanyaan['IDSOAL']);
							foreach ($pertanyaan_detail as $pertanyaan_detail) {						
							$contenku .=			'<div class="col-sm-10">
														<div class="form-check">
														<input class="form-check-input validate" type="radio" name="'.$pertanyaan_detail['IDSOAL'].'-radio" id="'.$pertanyaan_detail['IDSOALDTL'].'" value="'.$pertanyaan_detail['DESCR'].'">
															<label class="form-check-label" for="gridRadios1">
															'.$pertanyaan_detail['DESCR'].'
															</label>
														</div>
													</div>';
							}												
							$contenku .= 			'</div>
													</div>
												</div>
											</div>
										</div>';
						} 
					}
				}
			}
			
		}
		return $contenku;
	}

	function tampilan_pertanyaan(){
		$pertanyaan = $this->get_pertanyaan();
		$contenku = '';
		foreach ($pertanyaan as $pertanyaan ) {
			if($pertanyaan['TIPE'] == 'YA_TIDAK'){
				$contenku .=  '<label>'.$pertanyaan['SOAL'].'</label>';
				$pertanyaan_detail = $this->get_pertanyaan_detail($pertanyaan['IDSOAL']);
				foreach ($pertanyaan_detail as $pertanyaan_detail) {
					$contenku .= '<div class="col-sm-10"><div class="form-check">
								<input class="form-check-input validate" type="radio" name="'.$pertanyaan_detail['IDSOAL'].'-radio" id="'.$pertanyaan_detail['IDSOALDTL'].'" value="'.$pertanyaan_detail['DESCR'].'">
								<label class="form-check-label" for="gridRadios1">
									'.$pertanyaan_detail['DESCR'].'
								</label>
								</div>
								</div>';
				}
			} else {
				$contenku .=  '<label>'.$pertanyaan['SOAL'].'</label>';
				$pertanyaan_detail = $this->get_pertanyaan_detail($pertanyaan['IDSOAL']);
				foreach ($pertanyaan_detail as $pertanyaan_cekbox) {
					// if($pertanyaan_cekbox['IDSOAL'] == $pertanyaan['IDSOAL'] ) {
						if($pertanyaan_cekbox['TIPE'] == "CHECKBOX"){
						$contenku .= '<div class="form-check">
										<input class="form-check-input cekbox" type="checkbox" name="'.$pertanyaan_cekbox['IDSOAL'].'-cekbox" id="'.$pertanyaan_cekbox['IDSOALDTL'].'" value="'.$pertanyaan_cekbox['DESCR'].'">
										<label class="form-check-label" for="gridRadios2">
										'.$pertanyaan_cekbox['DESCR'].'
										</label>
									</div>';
						} else {
							$contenku .= '<div class="form-group">
											<input type="text" placeholder="'.$pertanyaan_cekbox['DESCR'].' :" name="'.$pertanyaan_cekbox['IDSOAL'].'-text" id="'.$pertanyaan_cekbox['IDSOALDTL'].'" autocomplete="off" class="form-control reset">
										</div>';
						}
					//} 
				}
			}
		}

		return $contenku;
	}

	public function card_analisa($id)
	{
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/covid/analisa/".$id;
        $data['header'] = json_decode($this->get_cors($url), TRUE);
		$this->load->view('card_analisa', $data);
		
	}

}
