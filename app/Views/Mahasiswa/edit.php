<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Mahasiswa</h2>
            <form action="/Mahasiswa/update/<?= $mahasiswa['id']; ?>" method="post">
            <?= csrf_field(); ?>
  <div class="row mb-3">
    <label for="nim" class="col-sm-2 col-form-label">Nim</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid': ''; ?>" id="nim" name="nim" autofocus value="<?= $mahasiswa['nim']; ?>">
      <div id="validationServerUsernameFeedback" class="invalid-feedback">
        <?= $validation->getError('nim'); ?>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama']; ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $mahasiswa['kelas']; ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $mahasiswa['alamat']; ?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Ubah Data</button>
</form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>