<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function cek($username,$password)
	{
		$hasil = $this->db->query("SELECT * FROM users WHERE username='$username' AND password=md5('$password')");
		return $hasil;
	}

}