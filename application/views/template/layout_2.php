<!DOCTYPE html>

<html lang="pt-br">

<head>

    <!-- MetaTags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Título do site -->
    <title>Login | Sistema suporte TOTVS</title>

    <link href="<?= base_url('public/vendor/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">

    <link href="<?= base_url('public/css/login.css'); ?>" rel="stylesheet">

</head>

<body>

    <section id="login" class="d-flex">
        
        <div class="container align-self-center">
            
            <div class="row">

                <div class="col-md-12">
                    <?= $contents; ?>
                </div><!-- .col-md-12 -->

            </div><!-- .row -->

        </div><!-- .container .align-self-center -->

    </section><!-- #login .d-flex -->

    <script src="<?= base_url('public/vendor/jquery/jquery.min.js') ?>"></script>
    
</body>

</html>