<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Artist extends CI_Controller
{
	public function Artist()
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
		$data['title'] = "Cadastro de Artista - Sistema de cadastro de Musicas";
		$data['headline'] = "Cadastro de Artista";
		$data['include'] = "artist_add";

		$this->load->view('template/template', $data);
	}

	function create()
	{
		$this->load->model('MArtist', '', TRUE);
		$this->MArtist->add($_POST);
		redirect('artist/listing', 'refresh');
	}

	function edit()
	{
		$id = $this->uri->segment(3);
		$this->load->model('MArtist', '', TRUE);

		$data['artist'] = $this->MArtist->get($id)->result();
		$data['title'] = "Modificar Artista - Sitema de cadastro de Musicas";
		$data['headline'] = "Edição";
		$data['include'] = "artist_edit";

		$this->load->view('template/template', $data);
	}

	function update()
	{
		$this->load->model('MArtist', '', TRUE);
		$this->MArtist->update($_POST['id_artist'], $_POST);
		redirect('artist/listing', 'refresh');
	}

	function delete()
	{
		$id = $this->uri->segment(3);
		$this->load->model('MArtist', '', TRUE);
		$this->MArtist->delete($id);
		redirect('artist/listing', 'refresh');
	}

	function listing()
	{
		$this->load->model('MArtist', '', TRUE);
		$qry = $this->MArtist->list();

		$table = $this->table->generate($qry);
		$tmpl = ['table_open'  => '<table id="tabela" class="table table-striped table-bordered table-hover">'];

		$this->table->set_template($tmpl);
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Editar', 'Codigo', 'Nome', 'Texto', 'Excluir');

		$table_row = array();

		foreach ($qry->result() as $artist) {
			$table_row = NULL;
			$table_row[] = anchor('artist/edit/' . $artist->id_artist, '<span class="ui-icon ui-icon-pencil"></span>');
			$table_row[] = $artist->id_artist;
			$table_row[] = $artist->name_artist;
			$table_row[] = $artist->twitter_handle;
			$table_row[] = anchor(
				'artist/delete/' . $artist->id_artist,
				'<span class="ui-icon ui-icon-trash"></span>',
				"onClick=\" return confirm('Tem certeza que deseja remover o registro?')\""
			);

			$this->table->add_row($table_row);
		}

		$table = $this->table->generate();
		$data['title'] = "Listagem de Artistas - Sistema de cadastro de Musicas";
		$data['headline'] = "Listagem";
		$data['include'] = 'artist_listing';
		$data['data_table'] = $table;

		$this->load->view('template/template', $data);
	}
}

/* End of file artist.php */
/* Location: ./application/controllers/artist.php */
