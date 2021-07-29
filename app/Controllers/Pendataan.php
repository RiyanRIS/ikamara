<?php

namespace App\Controllers;

use \App\Models\UsersModel;

class Pendataan extends BaseController
{

	public function awal()
	{
    if($this->request->getPost()){
      $this->session->set($this->request->getPost());
      // validate form input
      $this->validation->setRules([
          'email' 						=> 'valid_email|is_unique[users.email]',
          'pw'  => 'matches[pw1]'
      ],
      [   // Errors
          'email' => [
              'valid_email'   => 'Email tidak valid',
              'is_unique'   => 'Email sudah terdaftar',
          ],
          'pw' => [
              'matches' => 'Konfirmasi password belum tepat'
          ]
      ]);
		
      if ($this->validation->withRequest($this->request)->run())
      {
        $jenis = $this->request->getPost('jenis');
        if($jenis == "Pelajar"){
          return redirect()->to("pendataan/pelajar");
        }elseif($jenis == "Mahasiswa"){
          return redirect()->to("pendataan/mahasiswa");
        }elseif($jenis == "Masyarakat"){
          return redirect()->to("pendataan/masyarakat");
        }elseif($jenis == "Alumni"){
          return redirect()->to("pendataan/alumni");
        }else{
          return false;
        }
      }
		}

    $data = [
			"nav" => "pendataan",
      "data" => $this->session->get()
		];

    $data['errors'] = $this->validation->getErrors();

    return view('pendataan/awal', $data);
	}

  public function pelajar()
	{
    if($this->session->get('email') == null || $this->session->get('email') == ''){
      return redirect()->to(site_url("pendataan"));
    }
		$data = [
			"nav" => "pendataan",
      "data" => $this->session->get()
		];
		return view('pendataan/pelajar', $data);
	}

  public function mahasiswa()
	{
    if($this->session->get('email') == null || $this->session->get('email') == ''){
      return redirect()->to(site_url("pendataan"));
    }
		$data = [
			"nav" => "pendataan",
      "data" => $this->session->get()
		];
		return view('pendataan/mahasiswa', $data);
	}

  public function masyarakat()
	{
    if($this->session->get('email') == null || $this->session->get('email') == ''){
      return redirect()->to(site_url("pendataan"));
    }
		$data = [
			"nav" => "pendataan",
      "data" => $this->session->get()
		];
		return view('pendataan/masyarakat', $data);
	}

  public function alumni()
	{
    if($this->session->get('email') == null || $this->session->get('email') == ''){
      return redirect()->to(site_url("pendataan"));
    }
		$data = [
			"nav" => "pendataan",
      "data" => $this->session->get()
		];
		return view('pendataan/alumni', $data);
	}

  public function verifikasi()
  {
    if($this->session->get('email') == null || $this->session->get('email') == ''){
      return redirect()->to(site_url("pendataan"));
    }else{
      $this->session->set($this->request->getPost());

      $jenis = $this->session->get('jenis');

      $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

      $body = "<table class=\"table table-bordered\" width=\"100%\">";

      $body .= "<tr>";
      $body .= "<td>Nama</td>";
      $body .= "<td> : </td>";
      $body .= "<td>".$this->session->get('nama')."</td>";
      $body .= "</tr>";

      $body .= "<tr>";
      $body .= "<td>Email</td>";
      $body .= "<td> : </td>";
      $body .= "<td>".$this->session->get('email')."</td>";
      $body .= "</tr>";

      $body .= "<tr>";
      $body .= "<td>Tempat, Tanggal Lahir</td>";
      $body .= "<td> : </td>";
      $body .= "<td>".$this->session->get('tempat').", ".$this->session->get('tanggal')." ".$bulan[($this->session->get('bulan') - 1)]." ".$this->session->get('tahun')."</td>";
      $body .= "</tr>";

      $body .= "<tr>";
      $body .= "<td>Jenis Kelamin</td>";
      $body .= "<td> : </td>";
      $body .= "<td>".$this->session->get('jenkel')."</td>";
      $body .= "</tr>";

      $body .= "<tr>";
      $body .= "<td>Agama</td>";
      $body .= "<td> : </td>";
      $body .= "<td>".$this->session->get('agama')."</td>";
      $body .= "</tr>";

      $body .= "<tr>";
      $body .= "<td>No. Handphone</td>";
      $body .= "<td> : </td>";
      $body .= "<td>".$this->session->get('nohp')."</td>";
      $body .= "</tr>";

      $body .= "<tr>";
      $body .= "<td>Status Keanggotaan</td>";
      $body .= "<td> : </td>";
      $body .= "<td>".$this->session->get('jenis')."</td>";
      $body .= "</tr>";

      if($jenis == "Pelajar"){

        $body .= "<tr>";
        $body .= "<td>Nama Sekolah</td>";
        $body .= "<td> : </td>";
        $body .= "<td>".$this->session->get('sekolah')."</td>";
        $body .= "</tr>";

      }elseif($jenis == "Mahasiswa"){

        $body .= "<tr>";
        $body .= "<td>Universitas</td>";
        $body .= "<td> : </td>";
        $body .= "<td>".$this->session->get('univ')."</td>";
        $body .= "</td>";

        $body .= "<tr>";
        $body .= "<td>Jenjang</td>";
        $body .= "<td> : </td>";
        $body .= "<td>".$this->session->get('jenjang')."</td>";
        $body .= "</tr>";

        $body .= "<tr>";
        $body .= "<td>Jurusan</td>";
        $body .= "<td> : </td>";
        $body .= "<td>".$this->session->get('jurusan')."</td>";
        $body .= "</tr>";

        $body .= "<tr>";
        $body .= "<td>Status Perkawinan</td>";
        $body .= "<td> : </td>";
        $body .= "<td>".$this->session->get('perkawinan')."</td>";
        $body .= "</tr>";

      }elseif($jenis == "Masyarakat" || $jenis == "Alumni"){

        $body .= "<tr>";
        $body .= "<td>Perusahaan</td>";
        $body .= "<td> : </td>";
        $body .= "<td>".$this->session->get('perusahaan')."</td>";
        $body .= "</td>";

        $body .= "<tr>";
        $body .= "<td>Jabatan</td>";
        $body .= "<td> : </td>";
        $body .= "<td>".$this->session->get('jabatan')."</td>";
        $body .= "</tr>";

        $body .= "<tr>";
        $body .= "<td>Status Perkawinan</td>";
        $body .= "<td> : </td>";
        $body .= "<td>".$this->session->get('perkawinan')."</td>";
        $body .= "</tr>";

      }

      if($jenis != "Masyarakat"){

        $alamat = $this->session->get('ajalan').". kel. ".$this->session->get('akel').", kec. ".$this->session->get('akec').". ".$this->session->get('akod');

        $body .= "<tr>";
        $body .= "<td>Alamat di Aceh Tenggara</td>";
        $body .= "<td> : </td>";
        $body .= "<td>".$alamat."</td>";
        $body .= "</tr>";

      }

      if($jenis != "Alumni"){

        $alamat = $this->session->get('djalan').". Kel. ".$this->session->get('dkel').", kec. ".$this->session->get('dkec').", ".$this->session->get('dkab').". ".$this->session->get('dkod');

        $body .= "<tr>";
        $body .= "<td>Alamat di DIY</td>";
        $body .= "<td> : </td>";
        $body .= "<td>".$alamat."</td>";
        $body .= "</tr>";

      }

      $body .= "<tr>";
      $body .= "<td>Password</td>";
      $body .= "<td> : </td>";
      $body .= "<td>".$this->session->get('pw')."</td>";
      $body .= "</tr>";

      $body .= "</table>";

    }

    $data = [
      "tabel" => $body,
      "nav" => "pendataan",
    ];
   
    return view("pendataan/verifikasi", $data);
  }

  public function simpan()
  {
    $users = new UsersModel();

    $additionalData = [
      'email' 						=> $this->session->get('email'),
      'nama' 				      => $this->session->get('nama'),
      'tempat' 					  => $this->session->get('tempat'),
      'tanggal'           => $this->session->get('tahun')."-".$this->session->get('bulan')."-".$this->session->get('tanggal'),
      'jenkel' 			      => $this->session->get('jenkel'),
      'agama' 					  => $this->session->get('agama'),
      'nohp' 						  => $this->session->get('nohp'),
      'jenis' 						=> $this->session->get('jenis'),
      'sekolah' 					=> $this->session->get('sekolah'),
      'univ' 					    => $this->session->get('univ'),
      'jenjang'		 			  => $this->session->get('jenjang'),
      'jurusan'				    => $this->session->get('jurusan'),
      'perusahaan'				=> $this->session->get('perusahaan'),
      'jabatan'				    => $this->session->get('jabatan'),
      'perkawinan'				=> $this->session->get('perkawinan'),
      'ajalan'				    => $this->session->get('ajalan'),
      'akel'				      => $this->session->get('akel'),
      'akec'				      => $this->session->get('akec'),
      'akod'				      => $this->session->get('akod'),
      'djalan'				    => $this->session->get('djalan'),
      'dkel'				      => $this->session->get('dkel'),
      'dkec'				      => $this->session->get('dkec'),
      'dkab'				      => $this->session->get('dkab'),
      'dkod'				      => $this->session->get('dkod'),
      'password'				  => password_hash($this->session->get('pw'), PASSWORD_DEFAULT),
      'created_at'				=> time(),
    ];
    $lastid = $users->simpan($additionalData);
    if($lastid){
      $this->clearSession();
      return redirect()->to(site_url("pendataan/berhasil"))->with("msg_success", "Berhasil menyimpan data");
    }else{
      echo "Error: Tidak dapat menyimpan data, harap ulangi beberapa saat lagi.";
    }
  }

  public function berhasil()
  {
    if($this->session->has('msg_success')){
      return view('pendataan/berhasil');
    }else{
      return redirect()->to(site_url("pendataan"));
    }
  }

  public function simpanForm()
  {
    if(!$this->session->get('is_logged_in')){
			return redirect()->to(site_url("auth/login"))->with("msg_error", "Kamu belum masuk");
		}
    if ($this->request->getPost())
		{
      $users = new UsersModel();
      $id = $this->session->get('user_id');
      $jenis = $this->request->getPost('jenis');
      $additionalData = [
        'nama' 				      => $this->request->getPost('nama'),
        'tempat' 					  => $this->request->getPost('tempat'),
        'tanggal'           => $this->request->getPost('tahun')."-".$this->request->getPost('bulan')."-".$this->request->getPost('tanggal'),
        'jenkel' 			      => $this->request->getPost('jenkel'),
        'agama' 					  => $this->request->getPost('agama'),
        'nohp' 						  => $this->request->getPost('nohp'),
      ];

      if($jenis != "Masyarakat"){
        $additionalData['ajalan'] = $this->request->getPost('ajalan');
        $additionalData['akel'] = $this->request->getPost('akel');
        $additionalData['akec'] = $this->request->getPost('akec');
        $additionalData['akod'] = $this->request->getPost('akod');
      }

      if($jenis != "Alumni"){
        $additionalData['djalan'] = $this->request->getPost('djalan');
        $additionalData['dkel'] = $this->request->getPost('dkel');
        $additionalData['dkec'] = $this->request->getPost('dkec');
        $additionalData['dkod'] = $this->request->getPost('dkod');
      }

      if($jenis == "Pelajar"){

        $additionalData['sekolah'] = $this->request->getPost('sekolah');

      }elseif($jenis == "Mahasiswa"){

        $additionalData['univ'] = $this->request->getPost('univ');
        $additionalData['jenjang'] = $this->request->getPost('jenjang');
        $additionalData['jurusan'] = $this->request->getPost('jurusan');
        $additionalData['perkawinan'] = $this->request->getPost('perkawinan');

      }elseif($jenis == "Masyarakat" || $jenis == "Alumni"){

        $additionalData['perusahaan'] = $this->request->getPost('perusahaan');
        $additionalData['jabatan'] = $this->request->getPost('jabatan');
        $additionalData['perkawinan'] = $this->request->getPost('perkawinan');

      }

      $lastid = $users->update($id, $additionalData);
      if($lastid){
        return redirect()->to(site_url("detail"))->with("msg_success", "Berhasil memperbarui data");
      }else{
        return redirect()->to(site_url("detail"))->with("msg_error", "Gagal memperbarui data");
      }
    }
  }

  public function ubahPassword()
  {
    if(!$this->session->get('is_logged_in')){
			return redirect()->to(site_url("auth/login"))->with("msg_error", "Kamu belum masuk");
		}

    $data = [
			"nav" => "hehe",
		];

    if ($this->request->getPost()){

      $id = $this->session->get('user_id');
      $password = $this->request->getPost('password');

      $users = new UsersModel();

      $user = $users->find($id);
      $this->validation->setRules([
          'pw1' 						=> 'matches[pw2]',
      ],
      [   // Errors
          'pw1' => [
              'matches'   => 'Konfirmasi password belum cocok',
          ],
      ]);
		
      if ($this->validation->withRequest($this->request)->run())
      {
        if($users->cekPw($id, $password)){
          $pass_new = password_hash($this->request->getPost('pw1'), PASSWORD_DEFAULT);
          $additionalData = [
            'password' => $pass_new
          ];
          $update = $users->update($id, $additionalData);
          if($update){
            return redirect()->to(site_url("update-password"))->with("msg_success", "Berhasil mengubah password");
          }else{
            return redirect()->back()->with("msg_error", "Kesalahan yang tidak diketahui");
          }
        }else{
          $data['password'] = "Password lama belum cocok";
        }
      }
    }

    $data['errors'] = $this->validation->getErrors();

		return view('ubah_password', $data);
  }

  function hapus($id)
  {
    if(!$this->session->get('is_admin_logged_in')){
			return redirect()->to(site_url("auth/login"))->with("msg_error", "Kamu belum masuk");
		}

    $users = new UsersModel();
    $del = $users->delete($id);

    if($del){
			return redirect()->to(site_url("admin/data"))->with("msg_success", "Berhasil menghapus data");
    }else{
			return redirect()->to(site_url("admin/data"))->with("msg_error", "Gagal menghapus data");
    }

  }

}
