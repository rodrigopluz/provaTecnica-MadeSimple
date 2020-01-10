<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Album extends CI_Controller
{
	public function Album()
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
		$data['title'] = "Cadastro de Album - Sistema de cadastro de Musicas";
		$data['headline'] = "Cadastro de Album";
		$data['include'] = "album_add";

		$this->load->model('MArtist', '', TRUE);
		$data['artists'] = $this->MArtist->list();

		$this->load->view('template/template', $data);
	}

	function create()
	{
		$this->load->model('MAlbum', '', TRUE);
		$this->MAlbum->add($_POST);
		redirect('album/listing', 'refresh');
	}

	function edit()
	{
		$id = $this->uri->segment(3);
		$this->load->model('MAlbum', '', TRUE);

		$data['album'] = $this->MAlbum->get($id)->result();
		$data['title'] = "Modificar Album - Sitema de cadastro de Musicas";
		$data['headline'] = "Edição";
		$data['include'] = "album_edit";

		$this->load->model('MArtist', '', TRUE);
		$data['artists'] = $this->MArtist->list();

		$this->load->view('template/template', $data);
	}

	function update()
	{
		$this->load->model('MAlbum', '', TRUE);
		$this->MAlbum->update($_POST['id_album'], $_POST);
		redirect('album/listing', 'refresh');
	}

	function delete()
	{
		$id = $this->uri->segment(3);
		$this->load->model('MAlbum', '', TRUE);
		$this->MAlbum->delete($id);
		redirect('album/listing', 'refresh');
	}

	function listing()
	{
		$this->load->model('MAlbum', '', TRUE);
		$qry = $this->MAlbum->list();

		$table = $this->table->generate($qry);
		$tmpl = ['table_open'  => '<table id="tabela" class="table table-striped table-bordered table-hover">'];

		$this->table->set_template($tmpl);
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Editar', 'Codigo', 'Artista', 'Album', 'Ano', 'Excluir');

		$table_row = array();

		foreach ($qry->result() as $album) {
			$table_row = NULL;
			$table_row[] = anchor('album/edit/' . $album->id_album, '<span class="ui-icon ui-icon-pencil"></span>');
			$table_row[] = $album->id_album;
			$table_row[] = $album->name_artist;
			$table_row[] = $album->name_album;
			$table_row[] = $album->year;
			$table_row[] = anchor(
				'album/delete/' . $album->id_album,
				'<span class="ui-icon ui-icon-trash"></span>',
				"onClick=\" return confirm('Tem certeza que deseja remover o registro?')\""
			);

			$this->table->add_row($table_row);
		}

		$table = $this->table->generate();
		$data['title'] = "Lista de Albuns - Sistema de cadastro de Musicas";
		$data['headline'] = "Listagem";
		$data['include'] = 'album_listing';
		$data['data_table'] = $table;

		$this->load->view('template/template', $data);
	}
}

/* End of file album.php */
/* Location: ./application/controllers/album.php */
