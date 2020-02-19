<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Form Pendaftaran Calon Ketua</title>
</head>
<body>
    <a href="<?= base_url('mahasiswa/logout')?>">Logout</a>
    <table border="1">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Ktp</th>
                <th>Visi dan Misi</th>
                <th>Alasan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
            foreach($candidate->result() as $row) {
        ?>
        <tbody>
            <tr>
                <td><img src="<?= base_url('assets/img/').$row->foto; ?>" width="30%"></td>
                <td><img src="<?= base_url('assets/img/').$row->ktp; ?>" width="30%"></td>
                <td><?= $row->visi_misi; ?></td>
                <td><?= $row->alasan; ?></td>
                <td> 
                    <a href="<?= base_url('mahasiswa/edit/').$row->nim ?>">Edit</a>
                    <a href="<?= base_url('mahasiswa/hapusPendaftaran/').$row->nim; ?>" onclick="return confirm('Yakin mau di Hapus?')">Hapus</a> 
                </td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
</body>
</html>