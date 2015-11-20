<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insert data</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</head>

<body>
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3><?php echo (isset($query)) ? 'Update': 'Create'; ?> a Customer</h3>
        </div>
        <div class="col-sm-3">
            <?php 
            print_r($query);
            $action = (isset($query)) ? 'Lat5_controller/edit/'.$query[0]->id : 'Lat5_controller/insert';
            $data = array(
                        'name' => 'username',
                        'id' => 'username',
                        'value' => (isset($query)) ? $query[0]->username : ''
                    ) ?>
            <?php echo form_open($action, [
                'class' => 'form-horizontal'
            ]) ?>
            
            <div class="form-group <?php echo !empty($nameError) ? 'error' : ''; ?>">
                <?php echo form_label('Username', 'class="control-label"') ?>
                <div class="controls">
                    <?php $data = array(
                        'name' => 'username',
                        'id' => 'username',
                        'class' => 'form-control',
                        'value' => (isset($query)) ? $query[0]->username : ''
                    ) ?>

                    <?php echo form_input($data) ?>
                </div>
            </div>
            <div class="form-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
                <?php echo form_label('Password', 'class="control-label"') ?>
                <div class="controls">
                    <?php $data = array(
                        'name' => 'password',
                        'id' => 'password',
                        'class' => 'form-control',
                        'value' => (isset($query)) ? $query[0]->password : ''
                    ) ?>
                    <?php echo form_input($data) ?>
                </div>
            </div>
            <div class="form-group <?php echo !empty($mobileError) ? 'error' : ''; ?>">
                <?php echo form_label('Level', 'class="control-label"') ?>
                <div class="controls">
                    <?php $data = array(
                        'name' => 'level',
                        'id' => 'level',
                        'class' => 'form-control',
                        'value' => (isset($query)) ? $query[0]->level : ''
                    ) ?>
                    <?php echo form_input($data) ?>
                </div>
            </div>
            <div class="form-actions">
                <?php $btn = (isset($query)) ? 'update': 'create'; ?>
                <?php echo form_submit('submit', $btn, 'class="btn btn-success"')?>
                <a class="btn btn-primary" href="<?= site_url('Lat5_controller') ?>">Back</a>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
    <!-- /container -->
</body>
</html>