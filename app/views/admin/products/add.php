<div class="col-12 col-md-12">
        <div class="row">
            <ol class="container-fluid breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Users</li>
            </ol>
            <div class="col-12">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="<?= old('name'); ?>" name="name"  placeholder="Enter name" required>
                        <?php echo form_error('name','<span style="color: red; text-align: left;">','</span>')?>
                    </div>
                    <div class="form-group">
                        <label>UseName</label>
                        <input type="text" class="form-control" value="<?= old('username'); ?>"  name="username"  placeholder="Enter username" required>
                        <?php echo form_error('username','<span style="color: red; text-align: left;">','</span>')?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" value="<?= old('email'); ?>"  name="email"  placeholder="Enter email" required>
                        <?php echo form_error('email','<span style="color: red; text-align: left;">','</span>')?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" value="<?= old('password'); ?>"  name="password"  placeholder="Enter password" required>
                        <?php echo form_error('password','<span style="color: red; text-align: left;">','</span>')?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" value="<?= old('confirm_password'); ?>"  name="confirm_password"  placeholder="Enter confirm password" required>
                        <?php echo form_error('confirm_password','<span style="color: red; text-align: left;">','</span>')?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>