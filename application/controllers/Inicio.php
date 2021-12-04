<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("login_model");
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function principal(){
		$this->load->view("principal_view");
	}

	public function inicio_sesion()
	{
		$usuario = $this->input->post("usuario");
		$contrasenia = $this->input->post("contrasenia");

		$consulta = $this->login_model->inicio_sesion($usuario, $contrasenia);

		if($consulta["mensaje"]){
			redirect("usuario");	
		}else{
			redirect("inicio");
		}
	}
}
