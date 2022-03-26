<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= site_url().'assets/css/style.css?v='.date('YmdHis') ?>">
        <link rel="stylesheet" href="<?= site_url().'assets/vendor/fontawesome/css/fontawesome.min.css' ?>">
        <title>Blog Samplemed</title>
    </head>
    <body>
        <?= $this->include('menu') ?>
        <?= msgAlert() ?>
        <?= $this->renderSection('content') ?>
        <script src="<?= site_url().'assets/js/jquery-3.6.0.slim.min.js'?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="<?= site_url().'assets/vendor/fontawesome/js/fontawesome.min.js' ?>"></script>
        <script src="<?= site_url().'assets/vendor/fontawesome/js/be1cab109c.js'?>"></script>
        <script src="<?= site_url().'assets/js/init.js?v='.date('YmdHis') ?>"></script>
        <script src="<?= site_url().'assets/vendor/ckeditor/ckeditor.js' ?>"></script>
        <?php 
        if (isset($ckeditor)) { 
            foreach ($ckeditor as $key => $value) {
        ?>
        <script type="text/javascript">
            CKEDITOR.replace('<?= $value['name'] ?>',{
                height:<?= $value['height'] ?>
            });
        </script>
        <?php 
            }
        } 
        ?>
    </body>
</html>