<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	protected $session;
	protected $validation;

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();

		$this->session        = \Config\Services::session();
		$this->validation 		= \Config\Services::validation();

		helper(["form", "ini_helper"]);
	}

	function getTableUsers()
	{
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
		return $body;
	}

	function mailer($to, $title, $body)
	{
		$mail = new PHPMailer;
		$mail->isSMTP();

		$mail->SMTPAuth = true;
		$mail->Username = getenv('MAILGUN_SMTP_LOGIN');
		$mail->Password = getenv('MAILGUN_SMTP_PASSWORD'); 
		$mail->SMTPSecure = 'tls'; 
		
		$mail->Host = 'smtp.mailgun.org';
		$mail->Port = 587;
		
		$mail->From = 'noreply@ikamara.org'; 
		$mail->FromName = 'Ikamara Yogyakarta';
		 
		$mail->addAddress($to);
		$mail->isHTML(true); 
		$mail->Subject = $title;
		$mail->Body = $body;
		if(!$mail->send()) {  
				return 'Mailer Error: ' . $mail->ErrorInfo . "n";
		} else {
				return true;
		}

	}

	function clearSession()
	{
		$additionalData = [
			'email', 
			'pw', 
			'pw1', 
			'nama', 
			'tempat', 
			'tanggal', 
			'bulan', 
			'tahun', 
			'jenkel', 
			'agama', 
			'nohp', 
			'jenis', 
			'sekolah', 
			'univ', 
			'jenjang', 
			'jurusan', 
			'perusahaan', 
			'jabatan', 
			'perkawinan', 
			'ajalan', 
			'akel', 
			'akec', 
			'akab', 
			'akod', 
			'djalan', 
			'dkel', 
			'dkec', 
			'dkab', 
			'dkod', 
		];
		$this->session->remove($additionalData);
		return true;
	}
}
