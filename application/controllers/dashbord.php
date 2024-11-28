<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashbord extends CI_Controller
{
	public function Dashbord()
	{
		parent::__construct();
		$this->check_isvalidated();
	}

	private function check_isvalidated()
	{
		if (!$this->session->userdata('validated')) {
			redirect('login');
		}
	}

	public function sair()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function index()
	{
		$data['title'] = "Página Inicial - Sistema de cadastro de Musicas";
		$data['headline'] = "Sistema de cadastro de Musicas";
		$data['include'] = "dashbord_index";
		$this->load->view('template/template', $data);
	}
}

/* End of file dashbord.php */
/* Location: ./application/controllers/dashbord.php */
