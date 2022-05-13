    <!-- Begin Page Content -->
    <div class="container-fluid p-0">

        <!-- DataTales Example -->
        <div class="card rounded-0 border-left-0 border-right-0 border-bottom-0">

            <div class="container mb-3">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <h2><i class="fas fa-users"></i> <?= $titulo; ?>
                            <span class="float-right">
                                <a href="<?= base_url($url . '/adicionar'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Criar registro</a>
                            </span>
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Breadcrumb -->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent rounded-0 border-bottom border-top">

                    <li class="breadcrumb-item">
                        <a href="<?= base_url('/') ?>">
                            <i class="fas fa-home"></i> Início
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        <i class="fas fa-object-group"></i> <?= $titulo; ?>
                    </li>

                </ol>
            </nav>
            <!-- Breadcrumb -->

            <!-- Alerts -->
            <div class="container">
                <?php $this->load->view('template/_parts/_alerts'); ?>
            </div>

            <div class="card-body">


                <div class="btn-group">

                    <button type="button" class="btn btn-default btn-filter rounded-top border border-bottom-0" data-ta="all">Todos</button>
                    <?php foreach ($agrupador as $group) : ?>
                        <button type="button" class="btn btn-default btn-filter rounded-top border border-bottom-0" data-ta="<?= $group->agrupador; ?>"><?= $group->nome_resumido; ?></button>
                    <?php endforeach; ?>

                </div>

                <div class="table-responsive">

                    <table class="table table-striped dataTable table-sm group-table">

                        <thead>

                            <tr>
                                <th>EVENTO</th>
                                <th>ROTINA</th>
                                <th>FUNÇÃO</th>
                                <!-- <th>CAMINHO DA ROTINA</th> -->
                                <th class="text-center no-sort">AÇÕES</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($agrupador as $group) : ?>
                                <?php foreach ($listarDados as $rotina) : ?>

                                    <tr data-st="<?= $group->agrupador; ?>" class="content">

                                        <?php if ($rotina->agrupador == $group->agrupador) : ?>

                                            <td><?= strtoupper($rotina->evento); ?></td>
                                            <td><?= strtoupper($rotina->rotina); ?></td>
                                            <td><?= strtoupper($rotina->funcao); ?></td>
                                            <!-- <td class="font-weight-bold font-italic"><?= $rotina->caminho_rotina; ?></td> -->

                                            <td class="text-center">
                                                <a href='<?= base_url($url . '/editar/' . $rotina->id_rotina) ?>' class='pt-0 pb-0 btn btn-outline-primary btn-sm' data-tt="tooltip" data-placement='top' data-target="#editar" title='Editar'>
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="javascript(void);" class="pt-0 pb-0 btn btn-outline-danger btn-sm" data-tt="tooltip" data-placement="top" title="Excluir" data-toggle="modal" data-target="#deletar-<?php echo $rotina->id_rotina; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        <?php endif; ?>
                                    </tr>

                                <?php endforeach; ?>
                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->