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

    public function consulta_pedidos(){
		$obj = $this->Pedido_model->consulta_pedidos();

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

	public function consultaPedido() {
		$id_pedido = $this->input->post( "id_pedido" );
		$data = array(
				"id_pedido" => $id_pedido,
			);

		$obj = $this->Pedido_model->consultaPedido( $data );
		$this->output->set_content_type( "application/json" ); 
		echo json_encode( $obj );
	}

	public function editarPedidoEnvio() {
		$id_pedido = $this->input->post( "id_pedido" );
		$estado = $this->input->post( "estado" );
		$data = array(
				"id_pedido" => $id_pedido,
				"estado" => $estado,
			);

		$obj = $this->Pedido_model->editarEstatusEnvio( $data );
		$this->output->set_content_type( "application/json" ); 
		echo json_encode( $obj );
	}

    public function editarPedidoPago() {
		$id_pedido = $this->input->post( "id_pedido" );
		$estado = $this->input->post( "estado" );
		$data = array(
				"id_pedido" => $id_pedido,
				"estado" => $estado,
			);

		$obj = $this->Pedido_model->editarEstatusPago( $data );
		$this->output->set_content_type( "application/json" ); 
		echo json_encode( $obj );
	}

	public function mis_pedidos(){
		$id_usuario = $this->input->post( "id_usuario" );
		$obj = $this->Pedido_model->consulta_mispedidos($id_usuario);
		$this->output->set_content_type( "application/json" );
		echo json_encode( $obj );
	}

	public function consultarPedido(){
		$id_pedido = $this->input->post( "id_pedido" );
		$obj = $this->Pedido_model->consultar_pedido($id_pedido);
		$this->output->set_content_type( "application/json" );
		echo json_encode( $obj );
	}

}