<?php

echo '<div class="page-header text-center">
	 	<h1>Sistema Basico</h1>
	 	<h3>Controle de Músicas</h3>
	 </div>';

echo form_open('login/process', 'class="form-signin"');
$field_array = array('Login', 'Senha');

echo heading('Login', 2, 'class="form-signin-heading"');

if ($msg == 1) echo "<div class='alert alert-error'> <button type='button' class='close' data-dismiss='alert'>&times;</button> Sorry, we couldn't find an account with this username. Please check you're using the right username and try again. </div>";

echo form_input('username', '', 'value="" title="Seu login no sistema" class="input-block-level" placeholder="Login"');
echo form_password('password', '', 'value="" title="Sua senha de acesso" class="input-block-level" placeholder="Senha"');
echo form_submit('', 'Entrar', 'class="btn btn-large btn-primary"');
echo br();
echo form_close(); 
	
/* End of file login_view.php */
/* Location: ./system/application/views/login_view.php */
