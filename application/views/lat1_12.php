<html>
<head><title>FORM MAHASISWA</title></head>
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<body>
<div class="wrapper">
    <?= form_open_multipart('Lat1_12_controller/hasil'); ?>
    <?= form_fieldset('ISI FORM') ?>
    <table border=0>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>
                <?= form_input([
                    'name' => 'nama',
                    'size' => '20'],
                    set_value('nama'));
                ?>
            </td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td><input type="file" name="photo" size="20"/></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
                <input type="text" name="alamat">
            </td>
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <input type="radio" name="kelamin" value="Laki-laki">Laki-laki
                <input type="radio" name="kelamin" value="Perempuan">Perempuan
            </td>
        </tr>
        <tr>
            <td>Golongan</td>
            <td>:</td>
            <td>
                <select name="blood">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
        </tr>

        <tr>
            <td>Hobby</td>
            <td>:</td>
            <td>
                <input type="checkbox" name="hobby" value="Ngoding">Ngoding
                <input type="checkbox" name="hobby" value="Olahraga">Olahraga
                <input type="checkbox" name="hobby" value="Bersyair">Bersyair
            </td>
        </tr>

        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td>
                <textarea name="keterangan" rows=5 cols=30></textarea>
            </td>
        </tr>
        <tr>
            <td><?= form_submit('submit', 'Submit') ?></td>
        </tr>
    </table>
    <?= form_fieldset_close() ?>
    <?= form_close(); ?>
</div>
</body>
</html>

    