<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	function CheckStatus($email, $pass){

		$this->db->select('*');
		$this->db->from('Usuario');
		$this->db->where('Email', $email);
		$this->db->where('Password', $pass);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function LockUser($email){
		$this->db->select('*');
		$this->db->from('Usuario');
		$this->db->where('Email', $email);
		//$this->db->where('Password', $pass);
		$this->db->where('Estatus = 2');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function Login($email, $pass){

		$this->db->select('*');
		$this->db->from('Usuario');
		$this->db->where('Email', $email);
		$this->db->where('Password', $pass);

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
}