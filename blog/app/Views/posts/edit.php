<?= $this->extend('default') ?>
<?= $this->section('content') ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item" aria-current="page">List of registered posts</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit post</li>
                    </ol>
                </nav>
            </div>
        </div>
        <form method="POST"> 
            <div clas="card">
                <div class="card-body bg-white">     
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="title"><strong>Title</strong></label>
                            <input type="text" class="form-control <?= isInvalid($validation_error,'title') ?>" id="title" name="title" value="<?= $post_data['title'] ?>" placeholder="Title">
                            <?= invalidFeedback($validation_error, 'title') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <label for="cod_category"><strong>Category</strong></label>
                            <select class="form-control <?= isInvalid($validation_error,'cod_category') ?>" name="cod_category" id="cod_category">
                                <option value="">Selecione</option>
                                <?php foreach($list_categories as $row) { ?>
                                    <?php $selected = ($row['cod_category'] == $post_data['cod_category']) ? 'selected' : '' ?>
                                    <option value="<?= $row['cod_category'] ?>" <?= $selected ?>><?= $row['category_description'] ?></option>    
                                <?php } ?>
                            </select>
                            <?= invalidFeedback($validation_error, 'cod_category') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="rg"><strong>Description</strong></label>
                            <textarea class="form-control <?= isInvalid($validation_error,'description') ?>" name="description" id="description" rows="5">
                                <?= $post_data['description'] ?>
                            </textarea>
                            <?= invalidFeedback($validation_error, 'description') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="text"><strong>Post text</strong></label>
                            <textarea class="form-control <?= isInvalid($validation_error,'text') ?>" name="text" id="text" rows="10">
                                <?= $post_data['text'] ?>
                            </textarea>
                            <?= invalidFeedback($validation_error, 'text') ?>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="row mt-4">
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <button class="btn btn-dark" type="submit"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                    <a href="<?= site_url().'posts/list' ?>" class="btn btn-info" type="submit"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Return</a>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>