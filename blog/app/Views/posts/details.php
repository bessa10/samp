<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<div class="col-lg-12 col-md-12 col-md-12 col-sm-12">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-md-10 col-sm-10 ml-3 mt-3 mb-3">
            <img src="<?= site_url().'assets/img/logo_samp.png' ?>" width="300" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <span class="post-title">
                            <?= $post_data['title'] ?>
                        </span>
                        <span class="post-date float-right">
                            <?= $post_data['dth_insert'] ?>
                        </span>
                    </div>
                    <div class="post-text">
                        <?= $post_data['text'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-2 col-md-2 col-sm-2 mt-2 mb-4">
            <a href="<?= site_url().'posts' ?>" class="btn btn-info" type="submit"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Return</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>