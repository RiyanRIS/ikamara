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
