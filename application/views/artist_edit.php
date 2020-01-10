<?php

echo form_open('artist/update', 'class="form-cadastro"');
$field_array = array('Codigo', 'Nome', 'Texto');

echo heading($headline, 3, 'class="form-cadastro-heading"');
echo br();

echo form_hidden('id_artist', $artist[0]->id_artist);

echo form_input('codigo', $artist[0]->codigo, 'title="Código do artista formado por 3 caracteres iniciais do tipo e 3 digitos sequenciais daquele tipo" class="required input-block-level input-xlarge" placeholder="Código"');
echo br();

echo form_input('name_artist', $artist[0]->name_artist, 'title="Nome do artista" class="required input-block-level input-xlarge" placeholder="Nome"');
echo br();

echo form_input('twitter_handle', $artist[0]->twitter_handle, 'title="Texto" class="required input-block-level input-small" placeholder="Texto"');
echo br();

echo form_submit('', 'Atualizar', 'class="btn btn-primary"');
echo form_close();
	
/* End of file artist_edit.php */
/* Location: ./system/application/views/artist_edit.php */
