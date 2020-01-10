<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller
{

	public function Usuario()
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

	function add()
	{
		$data['title'] = "Cadastro de Usuário - Controle de Estoque";
		$data['headline'] = "Cadastro de Usuários";
		$data['include'] = "usuario_add";
		$this->load->model('MUsuario', '', TRUE);
		$data['usuarios'] = $this->MUsuario->listUsuario();
		$this->load->model('MSetor', '', TRUE);
		$data['setores'] = $this->MSetor->listSetor();
		$this->load->model('MPerfil', '', TRUE);
		$data['perfis'] = $this->MPerfil->listPerfil();
		$this->load->view('template/template', $data);
	}

	function create()
	{
		$this->load->model('MUsuario', '', TRUE);
		$this->MUsuario->addUsuario($_POST);
		redirect('usuario/listing', 'refresh');
	}

	function edit()
	{
		$id = $this->uri->segment(3);
		$this->load->model('MUsuario', '', TRUE);
		$data['usuario'] = $this->MUsuario->getUsuario($id)->result();
		$data['title'] = "Modificar Usuários - Controle de Estoque";
		$data['headline'] = "Edição de Usuários";
		$data['include'] = "usuario_edit";
		$this->load->model('MSetor', '', TRUE);
		$data['setores'] = $this->MSetor->listSetor();
		$this->load->model('MPerfil', '', TRUE);
		$data['perfis'] = $this->MPerfil->listPerfil();
		$this->load->view('template/template', $data);
	}

	function update()
	{
		$this->load->model('MUsuario', '', TRUE);
		$this->MUsuario->updateUsuario($_POST['id_usuario'], $_POST);
		redirect('usuario/listing', 'refresh');
	}

	function delete()
	{
		$id = $this->uri->segment(3);
		$this->load->model('MUsuario', '', TRUE);
		$this->MUsuario->deleteUsuario($id);
		redirect('usuario/listing', 'refresh');
	}

	function inativa()
	{
		$id = $this->uri->segment(3);
		$this->load->model('MUsuario', '', TRUE);
		$this->MUsuario->inativarUsuario($id);
		redirect('usuario/listing', 'refresh');
	}

	function ativa()
	{
		$id = $this->uri->segment(3);
		$this->load->model('MUsuario', '', TRUE);
		$this->MUsuario->ativarUsuario($id);
		redirect('usuario/listing_inativos', 'refresh');
	}

	function listing()
	{
		$this->load->model('MUsuario', '', TRUE);
		$qry = $this->MUsuario->listUsuario();
		$table = $this->table->generate($qry);
		$tmpl = array('table_open'  => '<table id="tabela" class="table table-striped table-bordered table-hover">');
		$this->table->set_template($tmpl);
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Editar', 'Inativa', 'Login', 'Setor', 'Perfil');
		$table_row = array();

		foreach ($qry->result() as $usuario) {
			$table_row = NULL;
			$table_row[] = anchor('usuario/edit/' . $usuario->id_usuario, '<span class="ui-icon ui-icon-pencil"></span>');
			$table_row[] = anchor('usuario/inativa/' . $usuario->id_usuario, '<span class="ui-icon ui-icon-minusthick"></span>');
			$table_row[] = $usuario->login;
			$table_row[] = $usuario->nome_setor;
			$table_row[] = $usuario->name_perfil;
			$this->table->add_row($table_row);
		}

		$table = $this->table->generate();
		$data['title'] = "Listagem de Usuários - Controle de Estoque";
		$data['headline'] = "Listagem de Usuários";
		$data['include'] = 'usuario_listing';
		$data['data_table'] = $table;
		$this->load->view('template/template', $data);
	}

	function listing_inativos()
	{
		$this->load->model('MUsuario', '', TRUE);
		$qry = $this->MUsuario->listUsuarioInativo();
		$table = $this->table->generate($qry);
		$tmpl = array('table_open'  => '<table id="tabela" class="table table-striped table-bordered table-hover">');
		$this->table->set_template($tmpl);
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Ativa', 'Login', 'Setor', 'Perfil');
		$table_row = array();

		foreach ($qry->result() as $usuario) {
			$table_row = NULL;
			$table_row[] = anchor('usuario/ativa/' . $usuario->id_usuario, '<span class="ui-icon ui-icon-plusthick"></span>');
			$table_row[] = $usuario->login;
			$table_row[] = $usuario->nome_setor;
			$table_row[] = $usuario->nome_perfil;
			$this->table->add_row($table_row);
		}

		$table = $this->table->generate();
		$data['title'] = "Listagem de Usuários - Controle de Estoque";
		$data['headline'] = "Listagem de Usuários";
		$data['include'] = 'usuario_listing_ativa';
		$data['data_table'] = $table;
		$this->load->view('template/template', $data);
	}
}

/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */
