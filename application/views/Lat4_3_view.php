<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Form sederhana dengan Form Helper CodeIgniter</title>
</head>
<body>
<div id="login" >
<?php echo form_open('Lat4_3_controller/login')?>
    <?php echo form_fieldset('Login Form')?>
    <table cellspacing="5px">
        <tr>
            <td><?php echo form_label('Username', 'username')?></td>
            <td>:</td>
            <td colspan="2">
                <?php
                    $user_name = array(
                              'name'        => 'username',
                              'maxlength'   => '25',
                              'size'        => '20',
                        );
                    echo form_input($user_name, set_value('username'));
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo form_label('Password', 'password')?></td>
            <td>:</td>
            <td colspan="2">
                <?php
                    $password = array(
                              'name'        => 'password',
                              'maxlength'   => '15',
                              'size'        => '10',
                        );
                    echo form_password($password);
                ?>
            </td>
        </tr>   
        <tr>
            <td colspan="4" align="right">	
                <?php echo form_submit('submit', 'Login')?>
            </td>
        </tr>
    </table>
    <?php echo form_fieldset_close()?>
<?php echo form_close();?>
</div>
</body>
</html> 
