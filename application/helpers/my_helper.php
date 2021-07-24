<?php

function is_logged_in()
{
	$ths = &get_instance();
	if ($ths->session->userdata('username')) {
		if ($ths->session->userdata('role') == 'kaubis') {
			redirect('kaubis');
		}
		if ($ths->session->userdata('role') == 'tleader') {
			redirect('tleader');
		}
	}
}

function is_logged_not_in()
{
	$ths = &get_instance();
	if ($ths->session->userdata('role') == 'kaubis' && $ths->uri->segment(1) == 'tleader') {
		redirect('kaubis');
	}
	if ($ths->session->userdata('role') == 'tleader' && $ths->uri->segment(1) == 'kaubis') {
		redirect('tleader');
	}
	if (!$ths->session->userdata('username')) {
		$ths->session->set_flashdata('error', 'Login terlebih dahulu');
		redirect('login');
	}
}

function activeMenu($arrayMenu)
{
	$ths = &get_instance();
	return !in_array($ths->uri->segment(2), $arrayMenu) ?: 'active';
}
function activeClassMenu($arrayMenu)
{
	$ths = &get_instance();
	return !in_array($ths->uri->segment(2), $arrayMenu) ?: 'class="active"';
}
