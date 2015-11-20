<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <h3>CI CRUD Grid</h3>
    </div>
    <div class="row">
        <a class="btn btn-success" href="<?= site_url('Lat5_controller/insert') ?>">Create</a>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Paspor</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0;
            foreach ($query as $row): ?>
                <tr>
                    <td><?php echo ++$i ?></td>
                    <td><?php echo $row->username ?></td>
                    <td><?php echo $row->password ?></td>
                    <td><?php echo $row->level ?></td>
                    <td width=250>
                        <a class="btn btn-primary" href="<?= site_url('#') ?>">Read</a>

                        <a class="btn btn-success" href="<?= site_url('Lat5_controller/edit/'. $row->id) ?>">Update</a>

                        <a class="btn btn-danger" href="<?= site_url('Lat5_controller/delete/'. $row->id) ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /container -->
</body>
</html>