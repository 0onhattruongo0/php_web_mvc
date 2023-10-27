<div class="col-12 col-md-12">
        <div class="row">
            <ol class="container-fluid breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Categories</li>
            </ol>
            <div class="col-12">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Category Name:</label>
                        <input type="text" class="form-control" value="<?= old('name'); ?>" name="name"  placeholder="Enter name" required>
                        <?php echo form_error('name','<span style="color: red; text-align: left;">','</span>')?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>