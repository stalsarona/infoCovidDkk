<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Covid_informasi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    

    public function index()
    {
        $this->load->view('V_informasi_covid');
    }

    public function pendataan()
    {
        if (!$this->session->userdata('status_log')) {
			$this->session->set_flashdata('errorMessage', '<div class="alert alert-danger">Silahkan masuk dahulu !</div>');
					redirect('signin');
		}
        $data['token'] = $this->private_token();
        //$data['total'] = $this->get_total_data();
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

    public function get_total_data()
	{
		
		$url = "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/covid/get_data_terakhir";
        $data = json_decode($this->get_cors($url), TRUE);
        
        print_r($data);
		//return $data;
	}
    
    public function simpan_total()
    {
        $obj = array(
            'COV_DWS_SMB' => $this->input->post('cov_dws_sembuh'),
            'COV_DWS_RWT' => urlencode($this->input->post('cov_dws_dirawat')),
            'COV_DWS_MNG' => urlencode($this->input->post('cov_dws_meninggal')),
            'COV_ANK_SMB' => urlencode($this->input->post('cov_ank_sembuh')),
            'COV_ANK_RWT' => urlencode($this->input->post('cov_ank_dirawat')),
            'COV_ANK_MNG' => urlencode($this->input->post('cov_ank_meninggal')),
            'PDP_DWS_SMB' => urlencode($this->input->post('pdp_dws_sembuh')),
            'PDP_DWS_RWT' => urlencode($this->input->post('pdp_dws_dirawat')),
            'PDP_DWS_MNG' => urlencode($this->input->post('pdp_dws_meninggal')),
            'PDP_ANK_SMB' => urlencode($this->input->post('pdp_ank_sembuh')),
            'PDP_ANK_RWT' => urlencode($this->input->post('pdp_ank_dirawat')),
            'PDP_ANK_MNG' => urlencode($this->input->post('pdp_ank_meninggal')),
            'ODP_DWS_SMB' => urlencode($this->input->post('odp_dws_sembuh')),
            'ODP_DWS_RWT' => urlencode($this->input->post('odp_dws_dirawat')),
            'ODP_DWS_MNG' => urlencode($this->input->post('odp_dws_meninggal')),
            'ODP_ANK_SMB' => urlencode($this->input->post('odp_ank_sembuh')),
            'ODP_ANK_RWT' => urlencode($this->input->post('odp_ank_dirawat')),
            'ODP_ANK_MNG' => urlencode($this->input->post('odp_ank_meninggal')),
          
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/covid/simpan_total",
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

    public function test()
	{
		$newdata = array(
            'username'  => 'johndoe',
            'email'     => 'johndoe@some-site.com',
            'logged_in' => TRUE
        );
        
        $this->session->set_userdata($newdata);
		//echo $this->session->userdata('username');
	}


}

/* End of file Covid_informasi.php */
