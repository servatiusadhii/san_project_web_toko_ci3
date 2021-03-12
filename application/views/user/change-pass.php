<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <?= $this->session->flashdata('message') ?>

            <form action=" <?= base_url('user/changePass') ?>" method="POST">
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password" name="passwordNow" id="passwordNow" placeholder="Enter your current password" class="form-control">
                    <?= form_error('passwordNow', '<small class="text-danger ml-3">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" name="newPassword" id="newPassword" placeholder="Enter your new password" class="form-control">
                    <?= form_error('newPassword', '<small class="text-danger ml-3">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label for="repeat-password">New Password</label>
                    <input type="password" name="repeatPassword" id="repeatPassword" placeholder="Repeat your new password" class="form-control">
                    <?= form_error('repeatPassword', '<small class="text-danger ml-3">', '</small>') ?>
                </div>

                <button type="submit" class="btn btn-primary float-right">Change Password</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->