<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Covid_informasi extends CI_Controller {

    public function index()
    {
        $this->load->view('V_informasi_covid');
    }

    public function pendataan()
    {
        $data['token'] = $this->private_token();
        $this->load->view('V_pendataan', $data);       
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
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/covid/private_token/";
        $data = json_decode($this->get_cors($url), TRUE);
       
		return $data;
	}

}

/* End of file Covid_informasi.php */
