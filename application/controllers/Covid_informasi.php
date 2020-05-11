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
    
    public function simpan_total()
    {
        $obj = array(
            'private_key' => $this->input->post('private_key'),
            'NOKTP' => urlencode($this->input->post('ktp')),
            'NAMA' => urlencode($this->input->post('nama')),
            'ALAMAT' => urlencode($this->input->post('alamat')),
            'KDPROP' => urlencode($this->input->post('id_prov')),
            'NAMAPROP' => urlencode($this->input->post('prov')),
            'KDKOTA' => urlencode($this->input->post('id_kota')),
            'NAMAKOTA' => urlencode($this->input->post('kota')),
            'KDKEC' => urlencode($this->input->post('id_kec')),
            'NAMAKEC' => urlencode($this->input->post('kec')),
            'KDKEL' => urlencode($this->input->post('id_kel')),
            'NAMAKEL' => urlencode($this->input->post('kel')),
            'RT' => urlencode($this->input->post('rt')),
            'RW' => urlencode($this->input->post('rw')),
            'NO_HP' => urlencode($this->input->post('telp')),
            'Q200400011' => urlencode($this->input->post('Q200400011')),
            'Q200400012' => urlencode($this->input->post('Q200400012')),
            'Q200400013' => urlencode($this->input->post('Q200400013')),
            'Q200400014' => urlencode($this->input->post('Q200400014')),
            'Q200400015' => urlencode($this->input->post('Q200400015')),
            'Q200400016' => urlencode($this->input->post('Q200400016')),
            'Q200400017' => urlencode($this->input->post('Q200400017'))				
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/covid/simpan_withJWT",
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

/* End of file Covid_informasi.php */
