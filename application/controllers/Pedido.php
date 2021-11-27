<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( "Pedido_model" );

		header( "Access-Control-Allow-Origin: *" ); 
		header( "Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With" );
	}

	public function index(){}

    public function consultaPedidos(){
		$obj = $this->Pedido_model->consultaPedidos();

		$this->output->set_content_type( "application/json" );
		echo json_encode( $obj );
	}

    public function borrarPedido() {
		$id_pedido    = $this->input->post( "id_pedido" );

		$data = array(
				"id_pedido" => $id_pedido,
			);

		$obj = $this->Pedido_model->borrarPedido( $data );
		$this->output->set_content_type( "application/json" ); 
		echo json_encode( $obj );
	}

	public function detallesPedido() {
		$id_pedido = $this->input->post( "id_pedido" );
		$data = array(
				"id_pedido" => $id_pedido,
			);

		$obj = $this->Pedido_model->detallesPedido( $data );
		$this->output->set_content_type( "application/json" ); 
		echo json_encode( $obj );
	}

	public function consultarPedido(){
		$id_pedido = $this->input->post( "id_pedido" );
		$obj = $this->Pedido_model->consultarPedido($id_pedido);
		$this->output->set_content_type( "application/json" );
		echo json_encode( $obj );
	}

}