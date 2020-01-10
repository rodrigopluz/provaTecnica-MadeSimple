<?php

echo form_open('album/create', 'class="form-cadastro"');
$field_array = array('Codigo', 'Nome', 'Texto');

echo heading($headline, 3, 'class="form-cadastro-heading"');
echo br();
echo form_input('name_album', '', 'title="Nome do album" class="input-block-level input-xlarge" placeholder="Nome" required');
echo br();
echo ('<select name="id_artist" title="Artista" class="input-block-level input-xlarge" required>');
echo ('<option value="">Selecione o Artista</option>');
foreach ($artists->result() as $artist) :
    echo ('<option value="' . $artist->id_artist . '">' . $artist->name_artist . '</option>');
endforeach;
echo ('</select>');
echo br();
echo form_input('year', '', 'title="Ano" class="input-block-level input-small" placeholder="Ano" required');
echo br();
echo form_submit('', 'Cadastrar', 'class="btn btn-primary"');
echo form_close();
	
/* End of file album_add.php */
/* Location: ./system/application/views/album_add.php */
