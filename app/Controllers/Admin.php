<?php

namespace App\Controllers;

use \App\Models\UsersModel;

class Admin extends BaseController
{
	public function index()
	{
    if(!$this->session->get('is_admin_logged_in')){
			return redirect()->to(site_url("auth/admin"));
		}

		$data = [
			"nav" => "home"
		];

		return view('admin/home', $data);
	}

  public function data()
	{
    if(!$this->session->get('is_admin_logged_in')){
			return redirect()->to(site_url("auth/admin"))->with("msg_error", "Kamu belum masuk sebagai admin");
		}

    $users = new UsersModel();

		$data = [
			"users" => $users->findAll(),
			"nav" => "data"
		];

		return view('admin/data', $data);
	}

}