<!-- Begin Page Content -->
<div class="container-fluid p-0">

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h2><i class="fas fa-eye"></i> <?= $descricao; ?></h2>
            </div>
        </div>
    </div>

    <!-- Breadcrumb -->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent rounded-0 pt-3 border-top pb-0">

            <li class="breadcrumb-item">
                <a href="<?= base_url('/') ?>">
                    <i class="fas fa-home"></i> Início
                </a>
            </li>

            <li class="breadcrumb-item">
                <a href="<?= base_url('usuarios') ?>">
                    <i class="fas fa-users"></i> Usuários
                </a>
            </li>

            <li class="breadcrumb-item active">
                <i class="far fa-eye"></i> Visualizar Usuário
            </li>

        </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card mb-4">

        <div class="card-body">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-md-12">

                                    <h3>
                                        <i class="fas fa-user-circle"></i> <?= $dados->first_name . ' ' . $dados->last_name; ?>
                                    </h3>

                                    <p>
                                        <i class="fas fa-building"></i> <?= $dados->company; ?>
                                        <br />
                                        <i class="fas fa-user"></i> <?= $dados->username; ?>
                                        <br />
                                        <i class="fas fa-at"></i> <?= $dados->email; ?>
                                        <br />
                                        <i class="fas fa-phone"></i> <?= $dados->phone; ?>
                                        <br />
                                        <cite><small><i class="fas fa-calendar-alt"></i> Desde <?= date('d/m/Y', $dados->created_on); ?></small></cite> |
                                        <small class="badge badge-success">Ativo</small>
                                    </p>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-md-12">

                                    <h5>
                                        <i class="fas fa-users"></i> Grupos do usuário:
                                    </h5>

                                    <?php foreach ($usergroups as $group) : ?>
                                        <p class="p-0 m-0"><i class="fas fa-chevron-right"></i> <?= strtoupper($group->name); ?>;</p>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- /.container-fluid -->