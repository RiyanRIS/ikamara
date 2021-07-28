<?= view("_temp/head") ?>

<?= view("_temp/nav_admin") ?>

<main class="flex-shrink-0 mt-5">
	<div class="container">
		<h1 class="mt-5">Selamat Datang, Administrator.</h1>
    <p class="lead">Detail admin: </p>
    <p>Nama : <?= session()->get("admin_nama") ?></p>
    <p>Username : <?= session()->get("admin_username") ?></p>
	</div>
</main>

<?= view("_temp/foot") ?>

</body>
</html>