<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'id';

	protected $returnType     = 'array';
	protected $allowedFields = ['id', 'email', 'nama', 'tempat', 'tanggal', 'jenkel', 'agama', 'nohp', 'jenis', 'sekolah', 'univ', 'jenjang', 'jurusan', 'perusahaan', 'jabatan', 'perkawinan', 'ajalan', 'akel', 'akec', 'akab', 'akod', 'djalan', 'dkel', 'dkec', 'dkab', 'dkod', 'password', 'last_login', 'created_at'];

  function cekPw($id, $password){
    $cek = [];
    $cek = $this->table($this->table)
                ->where("id", $id)
                ->find();
    if(count($cek) <= 0){
      return false;
    }else{
      if(\password_verify($password, $cek[0]['password'])){
        return true;
      }else{
        return false;
      }
    }
  }

  function cekLogin($email, $password)
  {
    $cek = [];
    $cek = $this->table($this->table)
                ->where("email", $email)
                ->find();
    if(count($cek) <= 0){
      return false;
    }else{
      if(\password_verify($password, $cek[0]['password'])){
        return $cek[0];
      }else{
        return false;
      }
    }
  }

	public function simpan($data){
			$query = $this->db->table($this->table)->insert($data);
			$id = $this->db->insertId($this->table);
			return $id ?? false;
	}

}
