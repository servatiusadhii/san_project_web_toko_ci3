<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg-6">

            <?= form_error('role', '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>', '</div>') ?>

            <?= form_error('roleEdit', '<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>', '</div>') ?>

            <?= $this->session->flashdata('message') ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModalLabel">Add New Role</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>

                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $r['role'] ?></td>
                            <td>

                                <a href="<?= base_url('admin/roleAccess/') . $r['id'] ?>" class="badge badge-warning">Access</a>
                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#newRoleEditModalLabel">Edit</a>
                                <a href="<?= base_url('admin/deleteRole/' . $r['id']) ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin untuk menghapus role <?= $r['role']; ?> ?')">Delete</a>

                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!--Modal for adding-->
<div class="modal fade" id="newRoleModalLabel" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Manage New Some Role ..</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control border-primary" name="role" id="role" placeholder="Enter a New Role Access Name...">

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" href="">Add New Role</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal for edit / update -->
<div class="modal fade" id="newRoleEditModalLabel" tabindex="-1" role="dialog" aria-labelledby="newRoleEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleEditModalLabel">Updating New Role For :</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/roleEdit') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control border-primary" name="roleAwal" id="roleAwal" readonly value="<?= $r['role']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control border-primary" name="roleEdit" id="roleEdit" placeholder="Updating a new role name ..">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" href="">Edit a new role</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal for delete -->
<div class="modal fade" id="exampleModalDeleteLabel" tabindex="-1" role="dialog" aria-labelledby="exampleModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalDeleteLabel">Are you Sure Delete This Role?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Delete" below if you are sure to delete role.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url('admin/roleDelete/') ?>">Delete</a>
            </div>
        </div>
    </div>
</div>