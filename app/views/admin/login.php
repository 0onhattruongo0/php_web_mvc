
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Zen+Kaku+Gothic+New:wght@300;400;500;700;900&amp;family=Zen+Old+Mincho:wght@400;500;600;700;900&amp;display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="<?= __WEB_ROOT; ?>/public/assets/admin/css/auth.css">
    <title>Login</title>
</head>
<body>
    <div class="auth">
        <div class="auth_container">
            <h1 class="auth_title">LOGIN</h1>
            
            <form action="" method="post" class="form_auth">
                <?php if(Session::data('errors_login')){
                    echo '<span style="color: red; text-align: left;">'.Session::flash('errors_login').'</span>';
                } ?>
                <div class="field">        
                    <input type="text" name="username" value="<?= old('username') ?>" id="username" placeholder="">
                    <label for="username">
                    UserName
                    </label>
                    <?php echo form_error('username','<span style="color: red; text-align: left;">','</span>')?>
                </div>
                <div class="field">          
                <input type="password" value="" name="password" placeholder="">
                <label for="password">
                    Password
                </label>
                <?php echo form_error('password','<span style="color: red; text-align: left;">','</span>')?>
                </div>
                <button type="submit">
                Login
                </button>
            </form>
        </div>
    </div>
</body>
</html>