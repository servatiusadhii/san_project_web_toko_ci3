<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Change Your Password For:</h1>
                                    <?= $this->session->flashdata('message'); ?>
                                    <h5 class="mb-4" style="color: red;"><?= $this->session->userdata('reset_email') ?></h5>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('auth/changePassword') ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="newPassword" name="newPassword" aria-describedby="emailHelp" placeholder="Enter new password..."><?= form_error('newPassword', '<small class="text-danger ml-3">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="repeatPassword" name="repeatPassword" aria-describedby="emailHelp" placeholder="Repeat your password..."><?= form_error('repeatPassword', '<small class="text-danger ml-3">', '</small>') ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Change Password
                                    </button>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>