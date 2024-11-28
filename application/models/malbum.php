<?php

class MAlbum extends CI_Model
{
	function add($data)
	{
		$this->db->insert('album', $data);
	}

	function list()
	{
		$this->db->join('artist', 'artist.id_artist = album.id_artist');
		$this->db->order_by('name_album', 'asc');
		return $this->db->get('album');
	}

	function get($id)
	{
		return $this->db->get_where('album', array('id_album' => $id));
	}

	function update($id, $data)
	{
		$this->db->where('id_album', $id);
		$this->db->update('album', $data);
	}

	function delete($id)
	{
		$this->db->where('id_album', $id);
		$this->db->delete('album');
	}
}

/* End of file malbum.php */
/* Location: ./system/application/models/malbum.php */
