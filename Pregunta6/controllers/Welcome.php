<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Persona');
	}

	public function index() {
		$datos['persona'] = $this->Persona->seleccionar_todo();
		$this->load->view('welcome_message', $datos);
	}

	public function agregar() {
		//---datos de la bd-------------datos del formulario
		$persona['ci'] = $this->input->post('ci');
		$persona['NombreCompleto'] = $this->input->post('nombre');
		$persona['FechaNacimiento'] = $this->input->post('fecha');
		$persona['Telefono'] = $this->input->post('telefono');
		$persona['codigo_deptos'] = $this->input->post('codigo');

		$this->Persona->agregar($persona);
		redirect('welcome');
	}//end agregar

	public function eliminar($ci_persona) {
		$this->Persona->eliminar($ci_persona);
		redirect('welcome');
	}

	public function editar($ci_persona) {
		$persona['ci'] = $this->input->post('ci');
		$persona['NombreCompleto'] = $this->input->post('nombre');
		$persona['FechaNacimiento'] = $this->input->post('fecha');
		$persona['Telefono'] = $this->input->post('telefono');
		$persona['codigo_deptos'] = $this->input->post('codigo');

		$this->Persona->actualizar($persona, $ci_persona);
		redirect('welcome');
	}

}