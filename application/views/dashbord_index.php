<?php

echo '<div id="introducao">';
echo heading('Seja Bem-Vindo! Sr(a) - ' . $this->session->userdata('name') . ' ', 3);
echo br();
echo 'Este novo Sistema de Cadastro de Musicas visa facilitar o uso ao máximo, mantendo a identidade visual já conhecida aliada a novas funcionalidades que facilitam seu uso. <br/>';
echo 'Em caso de problema com o uso do Sistema, por favor entre em contato conosco: rodrigopluz@gmail.com.';
echo '</div>';

/* End of file dashbord_index.php */
/* Location: ./application/controllers/dashbord_index.php */
