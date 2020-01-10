<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title><?= $title; ?></title>

	<!-- CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/estilo.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery.dataTables.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery-ui-1.8.10.custom.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/TableTools.css" type="text/css" media="screen" charset="utf-8" />

	<!-- JavaScript -->
	<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-1.9.1.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.dataTables.min.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-ui-1.10.1.custom.min.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.maskedinput.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url() . 'assets/js/scripts.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url() . 'assets/js/TableTools.min.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url() . 'assets/js/bootstrap.min.js' ?>"></script>
</head>

<body>
	<div id="wrap">
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand">Musicas</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="divider-vertical"></li>
							<li <?= ($this->uri->segment(1) == 'dashbord' && $this->uri->segment(2) == 'index') ? 'class="active"' : ''; ?>>
								<?= anchor('dashbord/index', 'Inicial'); ?>
							</li>
							<?php
							// Monta a query para mostrar o nome do usuario que está logado. 
							$query = $this->db->select('* FROM usuario WHERE login = "' . $this->session->userdata('name') . '"', false)->get()->result_array();
							?>
							<?php if ($query[0]['perfil'] == '1') { ?>
								<li class="dropdown <?= ($this->uri->segment(1) == 'usuario') ? 'active' : ''; ?>">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuários <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?= anchor('usuario/listing', 'Listagem'); ?></li>
										<li><?= anchor('usuario/add', 'Cadastrar Usuário'); ?></li>
										<li class="divider"></li>
									</ul>
								</li>
							<?php } ?>
							<li class="dropdown <?= ($this->uri->segment(1) == 'artist') ? 'active' : ''; ?>">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Artistas <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><?= anchor('artist/listing', 'Listagem'); ?></li>
									<li><?= anchor('artist/add', 'Cadastrar Artista'); ?></li>
								</ul>
							</li>
							<li class="dropdown <?= ($this->uri->segment(1) == 'album') ? 'active' : ''; ?>">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Album <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><?= anchor('album/listing', 'Listagem'); ?></li>
									<li><?= anchor('album/add', 'Cadastrar Album'); ?></li>
								</ul>
							</li>
							<li><?= anchor('dashbord/sair', 'Sair'); ?></li>
							<li><a><?= $this->session->userdata('name'); ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<?php $this->load->view($include); ?>
		</div>
		<div id="push"></div>
	</div>
	<div id="footer">
		<div class="container">
			<p class="muted credit">Copyright © <?= date('Y'); ?></p>
		</div>
	</div>
</body>

</html>