<?php

echo form_open('album/update', 'class="form-cadastro"');
$field_array = array('Codigo', 'Nome', 'Texto');

echo heading($headline, 3, 'class="form-cadastro-heading"');

echo form_hidden('id_album', $album[0]->id_album);
echo br();
echo form_input('name_album', $album[0]->name_album, 'title="Nome do Album" class="required input-block-level input-xlarge" placeholder="Nome"');
echo br();
echo ('<select name="id_artist" title="Artista" class="input-block-level input-xlarge" required>');
echo ('<option value="">Selecione o Artista</option>');
foreach ($artists->result() as $artist) :
    echo ('<option value="' . $artist->id_artist . '"');
    if ($artist->id_artist == $album[0]->id_artist)
        echo ('<option selected="selected" value="' . $artist->id_artist . '">' . $artist->name_artist . '</option>');
endforeach;
echo ('</select>');
echo form_input('year', $album[0]->year, 'title="Ano" class="required input-block-level input-small" placeholder="Ano"');
echo br();

echo form_submit('', 'Atualizar', 'class="btn btn-primary"');
echo form_close();
	
/* End of file artist_edit.php */
/* Location: ./system/application/views/artist_edit.php */
