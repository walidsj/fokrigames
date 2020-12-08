<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->view('home');
	}

	public function juknis()
	{
		$data['title'] = 'Petunjuk Teknis Lomba';
		$data['meta']['description'] = "Juknis Lomba Fokri Games VI terdiri atas 10 cabang mata lomba yang diselenggarakan secara daring, antara lain Adzan, Da'i, Esai, Fotografi, Kaligrafi, MTQ, Podcast, Poster, Puitisasi Quran, dan Video.";
		$data['meta']['thumb'] = 'juknis.jpg';
		$this->load->view('juknis', $data);
	}
}
