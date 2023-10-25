<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if (session('validation')) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            <?php foreach (session('validation')->getErrors() as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="productname">Product Name</label>
                                <input id="productname" name="productname" type="text" class="form-control" placeholder="Product Name">
                            </div>
                            <div class="mb-3">
                                <label for="manufacturername">Manufacturer Name</label>
                                <input id="manufacturername" name="manufacturername" type="text" class="form-control" placeholder="Manufacturer Name">
                            </div>
                            <div class="mb-3">
                                <label for="manufacturerbrand">Manufacturer Brand</label>
                                <input id="manufacturerbrand" name="manufacturerbrand" type="text" class="form-control" placeholder="Manufacturer Brand">
                            </div>
                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input id="price" name="price" type="text" class="form-control" placeholder="Price">
                            </div>
                        </div>

                        <!-- <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Category</label>
                                <select class="form-control select2">
                                    <option>Select</option>
                                    <option value="FA">Fashion</option>
                                    <option value="EL">Electronic</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="control-label">Features</label>

                                <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                                    <option value="WI">Wireless</option>
                                    <option value="BE">Battery life</option>
                                    <option value="BA">Bass</option>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="productdesc">Product Description</label>
                                <textarea class="form-control" id="productdesc" rows="5" placeholder="Product Description"></textarea>
                            </div>
                            
                        </div> -->
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                        <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-dark" style="border-radius: 15px 15px 0px 0px;">
                <h5 class="text-white">Category</h5>
            </div>
            <div class="card-body">
                <?php if (session('validation')) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            <?php foreach (session('validation')->getErrors() as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>
                <div class="row">
                    <div class="col-12">
                        <form action="<?= route_to('user_store')?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?= old('name') ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-dark" style="border-radius: 0px 0px 15px 15px">
                    <button type="submit" class="btn btn-success ms-2">Simpan</button>
                    <a href="<?=base_url('kategori')?>" class="btn btn-danger">Batal</a>
                </div>
            </form>
            </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?= $this->endSection(); ?>



