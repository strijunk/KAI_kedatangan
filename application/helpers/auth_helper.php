<?php

function user()
{
	$get = get_instance();
	//jika jabatan tidak sesuai kembalikan ke login
	if (!$get->session->userdata('id_user')) {
		redirect('user');
	}
}
