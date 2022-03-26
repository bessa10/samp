<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<div class="col-lg-12 col-md-12 col-md-12 col-sm-12">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-md-12 col-sm-12 ml-3 mt-3 mb-3">
            <img src="<?= site_url().'assets/img/logo_samp.png' ?>" width="300" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <?php if ($list_posts) { ?>
                <?php foreach ($list_posts as $key => $value) { ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <span class="post-title">
                                            <?= $value['title'] ?>
                                        </span>
                                        <span class="post-date float-right"><?= $value['dth_insert'] ?></span>
                                    </div>
                                    <div class="post-text">
                                        <?= $value['description'] ?>
                                    </div>
                                    <div class="text-right">
                                        <a href="<?= site_url().'posts/details/'.$value['cod_post'] ?>" class="btn btn-dark">View more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>There are no registered posts</p>
            <?php } ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title text-center">
                                <span class="post-title">
                                    Categories
                                </span>
                            </div>
                            <ul class="list-group">
                                <?php foreach ($list_categories as $key => $value) { ?>
                                    <li class="list-group-item"><?= $value['category_description'] ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>