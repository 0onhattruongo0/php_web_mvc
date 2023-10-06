<?php 
// echo "<pre>";
// print_r($errors);
// echo "</pre>";
// HtmlHelper::formOpen('post',__WEB_ROOT.'/home/post_user');
// HtmlHelper::input('<div>','<br/>'.form_error('fullname','<span style="color: red">','</span>').'</div>','text','fullname','','','Ho va ten', old('fullname'));
?>

<form action="<?=__WEB_ROOT ?>/home/post_user" method="post"> 
    <div>
        <input type="text" name="fullname" value="<?= 
        // !empty($old['fullname']) ? $old['fullname'] : '' 
        old('fullname');?>" placeholder="Ho va ten..."><br>
        <span style="color: red;"><?= !empty($errors['fullname']) ? $errors['fullname'] : '' ?></span> 
        <?php echo (!empty($errors) && array_key_exists('fullname',$errors)) ?'<span style="color: red;">'.$errors['fullname'].'</span>': false; ?> 
        <?php echo form_error('fullname','<span style="color: red;">','</span>')?>
    </div>
    <div>
        <input type="text" name="email" value="<?=
        //  !empty($old['email']) ? $old['email'] : '' 
         old('email');
         ?>" placeholder="Email..."><br>
        <span style="color: red;"><?= !empty($errors['email']) ? $errors['email'] : '' ?></span>
        <?php echo form_error('email','<span style="color: red;">','</span>')?>
    </div>
    <div>
        <input type="text" name="age" value="<?= !empty($old['age']) ? $old['age'] : '' ?>" placeholder="age..."><br>
        <span style="color: red;"><?= !empty($errors['age']) ? $errors['age'] : '' ?></span>
        <?php echo form_error('age','<span style="color: red;">','</span>')?>
    </div>
    <div>
        <input type="password" name="password" value="<?= !empty($old['password']) ? $old['password'] : '' ?>" placeholder="Mat khau"><br>
        <span style="color: red;"><?= !empty($errors['password']) ? $errors['password'] : '' ?></span>
        <?php echo form_error('password','<span style="color: red;">','</span>')?>
    </div>
    <div>
        <input type="password" name="confirm_password" value="<?= !empty($old['confirm_password']) ? $old['confirm_password'] : '' ?>" placeholder="Nhap lai mat khau"><br>
        <span style="color: red;"><?= !empty($errors['confirm_password']) ? $errors['confirm_password'] : '' ?></span>
        <?php echo form_error('confirm_password','<span style="color: red;">','</span>')?>
    </div>
    <button type="submit">Submit</button>
</form>