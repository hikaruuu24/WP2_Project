<?= $this->extend('layouts/app'); ?>
<?= $this->section('css'); ?>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <img class="rounded-circle" width="80px" height="80px"  src=<?= base_url("assets/images/login/avatar_user.png")?> alt="">
                <h5 class="font-size-15 mt-3"><a href="javascript: void(0);" class="text-dark"><?= ucfirst(user()->username)?></a></h5>
            </div>
            <div class="card-footer bg-transparent border-top">
                <a href="#" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">ID User :</th>
                                <td><?= user()->id?></td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail :</th>
                                <td><?= user()->email?></td>
                            </tr>
                            <tr>
                                <th scope="row">Username :</th>
                                <td><?= user()->username?></td>
                            </tr>
                            <tr>
                                <th scope="row">Role :</th>
                                <td><?= user()->role ?? 'Guest'?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

