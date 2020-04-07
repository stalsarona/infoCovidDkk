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
		$this->load->view('screening');
	}

	public function error()
	{
		$this->load->view('404');
	}

	public function get_log()
	{
		$id              = "TUGUREJORSUD2019";
		$data['todays']			 = date('dmY');
		$data['pass']            = md5($id.$data['todays']);

		return $data;
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
		$ktp = $this->input->post('ktp');
		$get_pass = $this->get_log();
        $url = "http://adminduk.jatengprov.go.id:8282/ws_server/get_json/RSUDTUGUREJO/GET_NIK_TUGUREJO?USER_ID=RSUDTUGUREJO&PASSWORD=".$get_pass['pass']."&NIK=".$ktp."";
        $data = json_decode($this->get_cors($url), TRUE);
        //$data = $this->get_cors($url);
        //untuk scraping json harus di decode baru di looping dahulu
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

	public function bridging()
	{
		$data = $this->get_log();
		// echo '<h1>';
		// echo 'content-type:application/json<br>';
		// echo 'Today:'.$data['todays'].'<br>';
		// echo 'X-KEY:'.$data['pass'].'<br>';
		// echo '</h1>';
		$bridge = 'http://adminduk.jatengprov.go.id:8282/ws_server/get_json/RSUDTUGUREJO/GET_NIK_TUGUREJO?USER_ID=RSUDTUGUREJO&PASSWORD='.$data['pass'].'&NIK=3374152404950001';
		
		$this->output->set_content_type('application/json')->set_output(json_encode($bridge));
		
	}
}
