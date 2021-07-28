</head>

<body class="d-flex flex-column h-100">

	<header>
		<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="javascript:void(0)">
					<img src="<?= base_url("assets/images/icon.jpg") ?>" alt="Ikamara Yogyakarta" width="75" height="75">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
					aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav me-auto mb-2 mb-md-0">
						<li class="nav-item">
							<a class="nav-link <?= nav("home", @$nav) ?>" href="<?= site_url("admin") ?>"><i class="fas fa-home"></i> Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= nav("data", @$nav) ?>" href="<?= site_url("admin/data") ?>"><i class="fas fa-align-left"></i> Data</a>
						</li>
					</ul>
					<div class="d-flex">
						<ul class="navbar-nav me-auto mb-2 mb-md-0">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="javascript:void()" id="ddmenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<?= session()->get('admin_nama') ?>
								</a>
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="ddmenu">
									<li><a class="dropdown-item" href="<?= site_url('auth/logoutadmin') ?>">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>