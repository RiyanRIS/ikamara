<?= view("_temp/head") ?>
<link rel="stylesheet" href="<?= base_url() ?>/assets/css/datatable.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/css/datatable.button.css">
<?= view("_temp/nav_admin") ?>

<main class="flex-shrink-0 mt-5">
	<div class="container">
		<h1 class="mt-5">Data Users</h1>
    <div class="table-responsive">
      <table id="datatable" class="table small table-bordered table-striped">
        <thead>
          <tr>
            <th>Email</th>
            <th style="min-width:150px">Nama</th>
            <th style="min-width:200px">Tempat, Tanggal Lahir</th>
            <th style="min-width:120px">Jenis Kelamin</th>
            <th>Agama</th>
            <th>No. Handphone</th>
            <th>Status Keanggotaan</th>
            <th>Sekolah</th>
            <th>Universitas</th>
            <th>Jenjang</th>
            <th>Jurusan</th>
            <th>Perusahaan</th>
            <th>Jabatan</th>
            <th>Status Perkawinan</th>
            <th style="min-width:270px">Alamat di Aceh</th>
            <th style="min-width:270px">Alamat di DIY</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        foreach ($users as $key ) { 
          $almaa = $almab = "-";

          $tanggal = date('d', strtotime($key['tanggal']));
          $m = (int)date('m', strtotime($key['tanggal']));
          $tahun = date('Y', strtotime($key['tanggal']));
          $tanggal_lahir = $tanggal." ".$bulan[$m - 1]." ".$tahun;

          if($key['jenis'] != "Alumni"){
            $almab = $key['djalan'].". kel. ".$key['dkel'].", kec. ".$key['dkec'].", kab. ".$key['dkab'].". ".$key['dkod'];
          }

          if($key['jenis'] != "Masyarakat"){
            $almaa = $key['ajalan'].". kel. ".$key['akel'].", kec. ".$key['akec'].". ".$key['akod'];

          }
          ?>
          <tr>
            <td><?= $key['email'] ?></td>
            <td><?= ucwords($key['nama']) ?></td>
            <td><?= ucwords($key['tempat']) ?>, <?= $tanggal_lahir ?></td>
            <td><?= $key['jenkel'] ?></td>
            <td><?= $key['agama'] ?></td>
            <td><?= $key['nohp'] ?></td>
            <td><?= $key['jenis'] ?></td>
            <td><?= ($key['sekolah']?:"-") ?></td>
            <td><?= ($key['univ']?:"-") ?></td>
            <td><?= ($key['jenjang']?:"-") ?></td>
            <td><?= ($key['jurusan']?:"-") ?></td>
            <td><?= ($key['perusahaan']?:"-") ?></td>
            <td><?= ($key['jabatan']?:"-") ?></td>
            <td><?= ($key['perkawinan']?:"-") ?></td>
            <td><?= $almaa ?></td>
            <td><?= $almab ?></td>
            <td><a onclick="confirmation(event)" href="<?= site_url('hapus/'.$key['id']) ?>" title="Hapus Data" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
	</div>
</main>

<?= view("_temp/foot") ?>

<script src="<?= base_url() ?>/assets/js/datatable.js"></script>
<script src="<?= base_url() ?>/assets/js/datatable.bs5.js"></script>
<script src="<?= base_url() ?>/assets/js/datatable.button.js"></script>
<script src="<?= base_url() ?>/assets/js/datatable.excel.js"></script>
<script src="<?= base_url() ?>/assets/js/datatable.html5.js"></script>

<script>
$(document).ready(function() {
    $('#datatable').DataTable({
      "aaSorting": [[1,'asc']],
      dom: 'Bfrtip',
      buttons: [{
        extend: 'excelHtml5',
        exportOptions: {
          columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15 ]
        }
      }]
    });
} );
function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    Swal.fire({
      title: 'Apakah kamu yakin?',
      text: "Tindakan ini tidak dapat dibatalkan..",
      icon: 'warning',
      showCancelButton: true
    })
    .then(function(t){
      if(t.value){
        window.location.href=urlToRedirect
      }else{

      }
    });
  }
</script>

</body>
</html>