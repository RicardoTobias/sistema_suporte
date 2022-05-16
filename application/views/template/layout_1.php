<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- MetaTags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="<?= $descricao; ?>">
    <meta name="author" content="<?= $author; ?>">

    <!-- Título do site -->
    <title><?= $titulo; ?></title>

    <link href="<?= base_url('public/vendor/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/css/sb-admin-2.css'); ?>" rel="stylesheet">

    <link href="<?= base_url('public/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">

    <link href="<?= base_url('public/css/layout_1.css'); ?>" rel="stylesheet">

    <!-- Carregando estilos da página -->
    <?php if (isset($styles)) : ?>
        <?php foreach ($styles as $style) : ?>

            <link href="<?= base_url($style); ?>" rel="stylesheet">

        <?php endforeach; ?>
    <?php endif; ?>
    <!-- Carregando estilos da página -->

</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Page Wrapper -->

        <!-- Sidebar -->
        <?php $this->load->view('template/_parts/_menu'); ?>

        <div id="content-wrapper">

            <div id="content">

                <ul class="nav justify-content-end mr-2">
                    <a class="nav-link text-dark" href="<?= base_url('logout'); ?>">
                        <i class="fas fa-door-open"></i>
                        <span>Sair</span>
                    </a>
                </ul>


                <?= $contents; ?>

            </div>
            <!-- End of Main Content -->

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">

                        <span>Copyright &copy; TAF Testes - 2021</span>

                    </div><!-- End copyright text-center my-auto -->
                </div><!-- End container my-auto -->
            </footer><!-- End of Footer -->

        </div><!-- End of Content Wrapper d-flex flex-column -->

    </div><!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?= base_url('public/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('public/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('public/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Carregando SCRIPTS da página -->
    <?php if (isset($scripts)) : ?>
        <?php foreach ($scripts as $script) : ?>

            <script src="<?= base_url($script) ?>"></script>

        <?php endforeach; ?>
    <?php endif; ?>
    <!-- Carregando SCRIPTS da página -->

    <script src="<?= base_url('public/js/app.js') ?>"></script>

</body>

</html>