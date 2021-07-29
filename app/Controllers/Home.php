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
		$to = "xkunthil15@gmail.com";
		$title = "Pendaftaran Ikamara Yogyakarta Berhasil";
		$body = "Halo Riyan Terima kasih telah melakukan pendaftaran di Sistem Pendataan Anggota Ikamara Yogyakarta. Berikut data yang berhasil kami simpan: <br/><br/>";
		// $body .= $this->getTableUsers();
		$body .= "<br/><hr/><br/><p>Jika ini kesalahan atau kamu tidak merasa melakukan pendaftaran ini, silahkan hubungi kami di alamat email cs@ikamara.org</p>";
		$body .= "<p>Atas perhatianya kami sampaikan terima kasih.</p><br/>";
		$body .= "<p>Salam hormat, admin Ikamara Yogyakarta.</p>";
		$kirim = $this->mailer($to, $title, $body);
		echo $kirim;
		echo "---<br>". getenv('MAILGUN_SMTP_LOGIN');
		echo "---<br>". getenv('MAILGUN_SMTP_PASSWORD'); 
		echo "---<br>". getenv('MAILGUN_SMTP_SERVER');
		echo "---<br>". getenv('MAILGUN_SMTP_PORT');
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
