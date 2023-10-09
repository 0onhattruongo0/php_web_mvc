<main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Users</li>
            </ol>
            <div class="col-12">

            </div>
            <a class="btn btn-primary mb-3" href="<?= __WEB_ROOT ?>/admin/users/add">Add User</a>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Users
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                       <?php
                       foreach ($users as $key=>$user){
                        ?>
                            <tr>
                                <td><?= $key+1 ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><a class="btn btn-info" href="<?= __WEB_ROOT ?>/admin/users/edit/<?= $user["id"] ?>">Edit</a></td>
                                <td><a class="btn btn-danger" href="<?= __WEB_ROOT ?>/admin/users/delete/<?= $user["id"] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a></td>
                            </tr>
                        <?php
                       }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>