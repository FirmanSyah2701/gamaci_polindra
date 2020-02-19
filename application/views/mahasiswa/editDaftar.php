<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Calon Ketua Gamaci</title>
</head>
<body>
    <form action="<?= base_url('mahasiswa/editPendaftaran/')?>" method="post" enctype="multipart/form-data">
    <?php 
        foreach ($candidate->result() as $row) {
    ?>
        <input type="hidden" name="nim" value="<?= $this->session->userdata('nim');?>">
        Masukkan Foto: <input type="file" name="foto" id="foto" require> <br>
        Masukkan KTP: <input type="file" name="ktp" id="ktp" require> <br>
        Visi dan Misi: <textarea name="visi_misi" id="visi_misi" cols="30" rows="10" require><?= $row->visi_misi ?></textarea> <br>
        Alasan <input type="text" name="alasan" id="alasan" value="<?= $row->alasan; ?>" require> <br>
        <?php } ?>
        <button type="submit">Daftar </button> &nbsp; <button type="reset">Cancel</button>
    </form>
</body>
</html>