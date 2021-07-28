<?php

namespace App\Controllers;

use \App\Models\UsersModel;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			"nav" => "home"
		];
		return view('home', $data);
	}

	public function cekEmail()
	{
		$to = "xryn001@gmail.com";
		$title = "Ini tes Title";
		$body = "dan ini ters bodu";
		$kirim = $this->mailer($to, $title, $body);
		echo $kirim;
	}

	public function detail()
	{
		if(!$this->session->get('is_logged_in')){
			return redirect()->to(site_url("auth/login"))->with("msg_error", "Kamu belum masuk");
		}
		$id = $this->session->get('user_id');
		$users = new UsersModel();

		$user = $users->find($id);

		$data = [
			"nav" => "datadiri",
			"data" => $user
		];
		return view('detail', $data);
	}

	
}
