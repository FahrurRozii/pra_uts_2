<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
          <a href="/Mahasiswa/create" class="btn btn-primary mt-3">Tambah Data Mahasiswa</a>
            <h1 class="mt-2">Daftar Mahasiswa</h1>
            <?php if(session()->getFlashdata('Pesan')) : ?>
              <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('Pesan'); ?>
              </div>
            <?php  endif; ?>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Nim</th>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th>
      <th scope="col">Alamat</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($mahasiswa as $m) : ?>
    <tr>
      <td><?= $m['nim']; ?></td>
      <td><?= $m['nama']; ?></td>
      <td><?= $m['kelas']; ?></td>
      <td><?= $m['alamat']; ?></td>
      <td><a href="/Mahasiswa/<?= $m['id']; ?>" class="btn btn-success">Detail</a><a href="/mahasiswa/edit/<?= $m['id']; ?>" class="btn btn-primary  mx-1">Update</a><a href="/Mahasiswa/delete/<?= $m['id']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php endforeach ;?>
  </tbody>
    </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>