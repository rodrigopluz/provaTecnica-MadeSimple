<?php

class MArtist extends CI_Model
{
	function add($data)
	{
		$this->db->insert('artist', $data);
	}

	function list()
	{
		$this->db->order_by('name_artist', 'asc');
		return $this->db->get('artist');
	}

	function get($id)
	{
		return $this->db->get_where('artist', array('id_artist' => $id));
	}

	function update($id, $data)
	{
		$this->db->where('id_artist', $id);
		$this->db->update('artist', $data);
	}

	function delete($id)
	{
		$this->db->where('id_artist', $id);
		$this->db->delete('artist');
	}
}

/* End of file martist.php */
/* Location: ./system/application/models/martist.php */
