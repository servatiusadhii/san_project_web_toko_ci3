<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?></div>
            <?php endif ?>

            <?= $this->session->flashdata('message') ?>

            <a href="" class=" btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModalLabel">Add New Submenu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Parent Menu</th>
                        <th scope="col">URL</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($subMenu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $m['title'] ?></td>
                            <td><?= $m['menu'] ?></td>
                            <td><?= $m['url'] ?></td>
                            <td><?= $m['icon'] ?></td>
                            <td><?= $m['is_active'] ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#eeditSubMenuModal<?= $m['id'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i>Edit</a>
                                <a href="<?= base_url('menu/deleteSubMenu/' . $m['id']) ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin untuk menghapus <?= $m['menu']; ?> ?')"><i class="far fa-fw fa-trash-alt"></i>Delete</a>


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

<!--Modal-->
<div class="modal fade" id="newSubMenuModalLabel" tabindex="-1" role="dialog" aria-labelledby="newSubeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubModalLabel">Adding New Submenu ..</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control border-primary" name="title" id="title" placeholder="Submenu Name..">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control border-primary">
                            <option value="">--Select Parent Menu--</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control border-primary" name="icon" id="icon" placeholder="Submenu Icon..">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control border-primary" name="url" id="url" placeholder="Submenu URL..">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="is_active" id="is_active" for="is_active" checked>
                            <label class="form_checked">Active?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Add New Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal for edit -->
<?php foreach ($subMenu as $esm) : ?>
    <div class="modal fade" id="eeditSubMenuModal<?= $esm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="eeditSubMenuModal<?= $esm['id'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eeditSubMenuModal<?= $esm['id'] ?>Label">Edit New Sub Menu</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('menu/editSubmenu/' . $esm['id']); ?>" method="post">

                    <div class="modal-body">
                        <h4>Data Formerly :</h4>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $esm['title'] ?>" id="title" name="title" placeholder="Submenu title">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option>Select Menu</option>
                                <?php foreach ($menu as $mm) : ?>
                                    <?php if ($esm['menu_id'] == $mm['id']) : ?>
                                        <option value="<?= $mm['id']; ?>" selected> <?= $mm['menu']; ?> </option>
                                    <?php else : ?>
                                        <option value="<?= $mm['id']; ?>"> <?= $mm['menu']; ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $esm['url'] ?>" id="url" name="url" placeholder="Submenu url">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $esm['icon'] ?>" id="icon" name="icon" placeholder="Submenu icon">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <?php if ($esm['is_active'] == 1) : ?>
                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active<?= $esm['id'] ?>" checked>
                                <?php else : ?>
                                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active<?= $esm['id'] ?>">
                                <?php endif; ?>
                                <label class="form-check-label" for="is_active<?= $esm['id'] ?>">
                                    Active?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Edit Modal -->