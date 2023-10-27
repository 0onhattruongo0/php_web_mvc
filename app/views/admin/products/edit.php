<div class="col-12 col-md-12">
        <div class="row">
            <ol class="container-fluid breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit Users</li>
            </ol>
            <div class="col-12">
                <form method="post" action="">
                    <input type="text" value="<?= !empty(old('id'))? old('id'): (!empty($id)? $id :'') ; ?>" name="id" hidden>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="<?= !empty(old('name'))? old('name'): (!empty($user['name'])? $user['name'] :'') ; ?>" name="name"  placeholder="Enter name" required>
                        <?php echo form_error('name','<span style="color: red; text-align: left;">','</span>')?>
                    </div>
                    <div class="form-group">
                        <label>UseName</label>
                        <input type="text" class="form-control" value="<?= !empty(old('username'))? old('username'): (!empty($user['username'])? $user['username'] :'') ; ?>"  name="username"  placeholder="Enter username" required>
                        <?php echo form_error('username','<span style="color: red; text-align: left;">','</span>')?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" value="<?= !empty(old('email'))? old('email'): (!empty($user['email'])? $user['email'] :'') ; ?>"  name="email"  placeholder="Enter email" required>
                        <?php echo form_error('email','<span style="color: red; text-align: left;">','</span>')?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>