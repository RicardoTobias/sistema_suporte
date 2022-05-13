<ul class="navbar-nav sidebar sidebar-dark menu-principal" id="accordionSidebar">

    <span class="navbar-brand logo">
        <img src="<?= base_url('public/img/totvs-logo.png') ?>" class="img-fluid">
    </span><!-- navbar-brand logo -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/') ?>">
            <i class="fas fa-home"></i>
            <span>Início</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Cadastros
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('agrupador-de-rotinas'); ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Agrupador de rotinas</span>
        </a>
    </li>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('rotinas'); ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Rotinas do sistema</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Utilidades
    </div>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('artigos'); ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Artigos KCS</span>
        </a>
    </li>

    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('issues'); ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Issues</span>
        </a>
    </li>

    <!-- Nav Item - MenuTAF_Collapse -->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuTAF" aria-expanded="true" aria-controls="menuTAF">
            <i class="fas fa-fw fa-cog"></i>
            <span>TAF Eventos</span>
        </a>

        <div id="menuTAF" class="collapse" aria-labelledby="menuTAF" data-parent="#accordionSidebar">

            <div class="bg-white collapse-inner rounded">

                <a class="collapse-item" href="<?php echo base_url('complemento-cadastral'); ?>">
                    <i class="fas fa-angle-right"></i> Complem. Cadastral
                </a>

                <a class="collapse-item" href="<?php echo base_url('estabelecimentos'); ?>">
                    <i class="fas fa-angle-right"></i> Estabelecimentos
                </a>

                <a class="collapse-item" href="<?php echo base_url('rubricas'); ?>">
                    <i class="fas fa-angle-right"></i> Rubricas
                </a>

                <a class="collapse-item" href="<?php echo base_url('identificador-rubricas'); ?>">
                    <i class="fas fa-angle-right"></i> Identif. de rubricas
                </a>

                <a class="collapse-item" href="<?php echo base_url('lotacao-tributaria'); ?>">
                    <i class="fas fa-angle-right"></i> Código de Lotação
                </a>

                <a class="collapse-item" href="<?= base_url('admissao-preliminar'); ?>">
                    <i class="fas fa-angle-right"></i> Admissão preliminar
                </a>

            </div><!-- bg-white collapse-inner rounded -->

        </div><!-- menuTAF -->

    </li><!-- Nav Item - MenuTAF_Collapse -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrador
    </div>

    <?php if ($this->ion_auth->in_group(array('admin'))) : ?>

        <!-- nav-item -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('usuarios'); ?>">
                <i class="fas fa-fw fa-cog"></i>
                <span>Usuários</span>
            </a>
        </li>

    <?php endif; ?>

    <!-- nav-item -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('usuarios'); ?>">
            <i class="fa fa-user"></i>
            <span>Acessar perfil</span>
        </a>
    </li>

</ul><!-- navbar-nav sidebar sidebar-dark menu-principal -->