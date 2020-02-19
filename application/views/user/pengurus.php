<table id="bootstrap-data-table" class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Lengkap</th>
            <th>Jabatan</th>
        </tr>
    </thead>

    <tbody>
        <?php 
            $i= 1;
            foreach ($pengurus->result() as $row) {
        ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $row->nim;?></td>
            <td><?= $row->nama;?></td>
            <td><?= $row->nama_jabatan; ?></td>
        </tr>            
        <?php } ?>
    </tbody>
</table>