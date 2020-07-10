<?php
	function is_logged_in(){
		//untuk mendapat library ci / object ci $this karena helper tidak mengenal $this
		$ci=get_instance();
		if(!$ci->session->userdata('username')){
			$ci->session->set_flashdata('errorMessage', '<div class="alert alert-danger alert-dismissible"><i class="icon fas fa-exclamation-triangle"></i> Silahkan sign in terlebih dahulu !</div>');
			redirect('login');
		}
		
	}

	// function check_access($role_id, $menu_id){
	// 	$ci=get_instance();

	// }