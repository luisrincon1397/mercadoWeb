<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( "Inventario_model" );

		header( "Access-Control-Allow-Origin: *" ); 
		header( "Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With" );
	}

	public function index(){}

    public function consultaInventario(){
		$obj = $this->Inventario_model->consultaInventario();

		$this->output->set_content_type( "application/json" );
		echo json_encode( $obj );
	}

    public function borrarArticulo() {
		$id_articulo    = $this->input->post( "id_articulo" );

		$data = array(
				"id_articulo" => $id_articulo,
			);

		$obj = $this->Inventario_model->borrarArticulo( $data );
		$this->output->set_content_type( "application/json" ); 
		echo json_encode( $obj );
	}

	public function detallesInventario() {
		$id_articulo = $this->input->post( "id_articulo" );
		$data = array(
				"id_articulo" => $id_articulo,
			);

		$obj = $this->Inventario_model->detallesInventario( $data );
		$this->output->set_content_type( "application/json" ); 
		echo json_encode( $obj );
	}

}