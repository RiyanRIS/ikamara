<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
	protected $table = 'admin';
	protected $primaryKey = 'id';

	protected $returnType     = 'array';
	protected $allowedFields = ['id', 'nama', 'username', 'password'];

  function cekLogin($username, $password)
  {
    $cek = [];
    $cek = $this->table($this->table)
                ->where("username", $username)
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
      try{
          $query = $this->db->table($this->table)->insert($data);
      }catch (\Exception $e){
          die($e->getMessage());
      }
			$id = $this->db->insertId($this->table);
			return $id ?? false;
	}

}
