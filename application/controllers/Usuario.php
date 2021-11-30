<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Usuario extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view("principal_view");
    }

    public function pedidos(){
        $this->load->view("pedidos_view");
    }

    public function cerrarSesion(){
        redirect("Inicio", "refresh");
    }

}