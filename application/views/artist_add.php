<?php

echo form_open('artist/create', 'class="form-cadastro"');
$field_array = array('Codigo', 'Nome', 'Texto');

echo heading($headline, 3, 'class="form-cadastro-heading"');
echo br();
echo form_input('name_artist', '', 'title="Nome do artista" class="input-block-level input-xlarge" placeholder="Nome" required');
echo br();
echo form_textarea('twitter_handle', '', 'title="Texto" class="input-block-level input-xlarge" placeholder="Texto" required');
echo br();
echo form_submit('', 'Cadastrar', 'class="btn btn-primary"');
echo form_close();
	
/* End of file artist_add.php */
/* Location: ./system/application/views/artist_add.php */
