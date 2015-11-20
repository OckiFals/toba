<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Chat-ing Sederhana</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
    <script src="<?= base_url('assets/js/angular.min.js') ?>"></script>
    <script>
        var app = angular.module('chatApp', []);
        app.controller('validateCtrl', function ($scope) {
            // terapkan initial untuk angular model
            $scope.nama = 'ockifals';
            $scope.email = 'ocki.bagus.p@gmail.com';
            $scope.pesan = '';
        });
    </script>
</head>
<body>
<div class="wrapper" ng-app="chatApp" ng-controller="validateCtrl"
          name="chatForm" novalidate>
    <?php echo form_open('Lat2_individu/write')?>
        <table width="480px">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama" ng-model="nama" required>
						<span ng-show="chatForm.nama.$dirty && chatForm.nama.$invalid">
							<span ng-show="chatForm.nama.$error.required">Required!</span>
						</span>
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input type="email" name="email" ng-model="email" required>
					<span ng-show="chatForm.email.$dirty && chatForm.email.$invalid">
						<span ng-show="chatForm.email.$error.required">Required!</span>
					  	<span ng-show="chatForm.email.$error.email">Invalid email address.</span>
					</span>
                </td>
            </tr>

            <tr>
                <td>Pesan</td>
                <td>:</td>
                <td>
                    <input type="text" name="pesan" ng-model="pesan" required>
					<span ng-show="pesan == '' ||chatForm.pesan.$dirty && chatForm.pesan.$invalid">
						<span ng-show="chatForm.pesan.$error.required">Required!</span>
					</span>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" ng-disabled="pesan == '' ||
                		chatForm.nama.$dirty && chatForm.nama.$invalid ||
  						chatForm.email.$dirty && chatForm.email.$invalid || 
  						chatForm.pesan.$dirty && chatForm.pesan.$invalid">
                </td>
            </tr>
        </table>
    <?php echo form_close();?>
    <div id="message">
        <?php
        
        while (!feof($chatHistory)):
            # pisahkan string kedalam array
            $pesan = explode('|', fgets($chatHistory));
            # jika node iterasi bukan merupakan akhir dari file
            if (($pesan[0] !== "") && (count($pesan) == 3)):
                $pesan[2] = str_replace(
                    array_keys($emoticon),
                    array_values($emoticon),
                    $pesan[2]
                );
                ?>
                <h4><?= "{$pesan[0]} => <a href='#'>{$pesan[1]}</a>" ?></h4>
                <div class="message-body">
                    <p><?= $pesan[2] ?></p>
                </div>
            <?php
            endif;
        endwhile;

        fclose($chatHistory);
        ?>
    </div>
</div>
</body>
</html>