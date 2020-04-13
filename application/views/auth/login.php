<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->

                    <div class="row">

                        <div class="col-lg">

                            <div class="p-4">
                                <div class="text-center">
                                    <img src="assets/img/logo1.png" width="60px" height="60px" alt="">
                                    <h5 class="font-weight-bolder row text-center text-black my-3 mt-3">SISTEM INFORMASI USAHA KESEHATAN SEKOLAH</h5>
                                    <h1 class="h4 text-gray-900 mt-4 mb-3">Login Page</h1>
                                </div>

                                <?= $this->session->flashdata('massage'); ?>

                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                        <!-- error message -->
                                        <?= form_error('Email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <!-- error message -->
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bolder">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotPassword'); ?>">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account For Member</a>
                                </div>
                                <div class="text-center">
                                    <br>
                                    <a class="badge badge-danger" href="web">
                                        &laquo Back &raquo</a> </<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>