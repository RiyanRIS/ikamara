<?php

namespace App\Controllers;

use \App\Models\UsersModel;
use \App\Models\AdminModel;

class Auth extends BaseController
{

  public function index(){
    return $this->login();
  }

	public function login()
	{
		$data = [
			"nav" => "login"
		];
		return view('auth/login', $data);
	}

  public function admin()
	{
    if($this->request->getPost()){
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');

      $admin = new AdminModel();

      $status = $admin->cekLogin($username, $password);

      if($status){
        $ses = [
          'admin_id' => $status['id'],
          'admin_nama' => $status['name'],
          'admin_username' => $status['username'],
          'is_admin_logged_in' => true,
        ];
        $this->session->set($ses);
        return redirect()->to(site_url("admin"))->with("msg_success", "Aktivitas masuk berhasil");
      }else{
        return redirect()->back()->with("msg_error", "Kombinasi username dan password belum tepat.");
      }
    }
		$data = [
			"nav" => "login"
		];
		return view('auth/admin', $data);
	}

  public function logout()
	{
    $ses = ['user_id', 'user_nama', 'user_email', 'is_logged_in'];
    $this->session->remove($ses);
    return redirect()->to(site_url('auth/login'))->with("msg_success", "Aktivitas keluar berhasil");
	}

  public function logoutAdmin()
	{
    $ses = ['admin_id', 'admin_nama', 'admin_username', 'is_admin_logged_in'];
    $this->session->remove($ses);
    return redirect()->to(site_url('auth/admin'))->with("msg_success", "Aktivitas keluar berhasil");
	}

  public function aksiLogin()
	{
    if($this->request->getPost()){
      $user = new usersModel();

      $email = $this->request->getPost('email');
      $password = $this->request->getPost('password');

      $status = $user->cekLogin($email, $password);

      if($status){
        $ses = [
          'user_id' => $status['id'],
          'user_nama' => $status['nama'],
          'user_email' => $status['email'],
          'is_logged_in' => true,
        ];
        $this->session->set($ses);
        return redirect()->to(site_url())->with("msg_success", "Aktivitas masuk berhasil");
      }else{
        return redirect()->back()->with("msg_error", "Kombinasi username dan password belum tepat.");
      }
    }
  }
}
