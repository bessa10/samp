<?= $this->extend('default') ?>
<?= $this->section('content') ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">List of registered posts</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php if ($list_posts) { ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-ligth">
                            <tr>
                                <th scope="col">Title</th>
                                <th class="text-center" scope="col">Category</th>
                                <th class="text-center" scope="col">Register</th>
                                <th class="text-center" scope="col">Edit</th>
                                <th class="text-center" scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_posts as $key => $value) { ?>
                            <tr>
                                <td><?= $value['title'] ?></td>
                                <td class="text-center"><?= $value['category_description'] ?></td>
                                <td class="text-center"><?= $value['dth_insert'] ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url().'posts/edit/'.$value['cod_post'] ?>"  class="btn btn-small btn-info"
                                        ><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit
                                    </a>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-small btn-danger" onclick="removePost(<?= $value['cod_post'] ?>, '<?= $value['title'] ?>')">
                                        <i class="fa fa-trash"></i>&nbsp;&nbsp;Remove
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } else { ?>
                    <p>There are no registered posts</p>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <a href="<?= site_url().'posts/create' ?>" class="btn btn-dark"><i class="fa fa-plus"></i>&nbsp;&nbsp;create new post</a>

            </div>
        </div>
    </div>
<?= $this->endSection() ?>