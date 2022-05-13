    <!-- Begin Page Content -->
    <div class="container-fluid p-0">

        <!-- DataTales Example -->
        <div class="card rounded-0 border-left-0 border-right-0 border-bottom-0">

            <div class="container mb-3">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <h2><i class="far fa-newspaper"></i> <?= $titulo; ?>
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
            <?php $this->load->view('template/_parts/_alerts'); ?>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped dataTable table-sm" width="100%" cellspacing="0">

                        <thead>

                            <tr>
                                <th>TÍTULO</th>
                                <th>LINK</th>
                                <th>AGRUPADOR</th>
                                <th>ROTINA</th>
                                <th class="text-center no-sort">AÇÕES</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($listarDados as $artigo) : ?>

                                <tr>
                                    <td><?= $artigo->artigo; ?></td>
                                    <td><?= $artigo->link; ?></td>
                                    <td><?= strtoupper($artigo->agrupador); ?></td>
                                    <td><?= strtoupper($artigo->rotina); ?></td>

                                    <td class="text-center">
                                        <a href='<?= base_url('artigos/editar/' . $artigo->id_artigo) ?>' class='pt-0 pb-0 btn btn-outline-primary btn-sm' data-tt="tooltip" data-placement='top' data-target="#editar" title='Editar'>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript(void);" class="pt-0 pb-0 btn btn-outline-danger btn-sm" data-tt="tooltip" data-placement="top" title="Excluir" data-toggle="modal" data-target="#deletar-<?= $artigo->id_artigo; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>

                                </tr>

                                <!-- Carregando Modal - Ações -->
                                <!-- DELETANDO DADOS -->
                                <div class="modal fade" id="deletar-<?= $artigo->id_artigo; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content rounded-4 shadow">
                                            <form method="POST" action="<?= base_url('artigos/excluir/' . $artigo->id_artigo); ?>">
                                                <div class="modal-body p-4 text-center">
                                                    <h4 class="mb-0">Excluir Registro!</h4>
                                                    <br />
                                                    <p class="mb-0">
                                                        <i class="fas fa-exclamation-triangle"></i> Tem certeza que deseja <strong>excluir</strong> o registro?
                                                    </p>
                                                    <input type="hidden" class="form-control" id="D_E_L_E_T_" name="D_E_L_E_T_" value="*">
                                                </div>
                                                <div class="modal-footer flex-nowrap p-0">
                                                    <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right">
                                                        <strong><i class="far fa-check-circle"></i> Sim, excluir!</strong></button>
                                                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 text-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Não!</button>
                                                </div>
                                            </form>
                                            <!-- End FORM ON FOOTER -->
                                        </div>
                                    </div>
                                </div>

                                <!-- DELETANDO DADOS -->

                                <!-- ATIVANDO DADOS -->
                                <div class="modal fade" id="ativar-<?= $artigo->id_artigo; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content rounded-4 shadow">
                                            <form method="POST" action="<?= base_url('artigos/ativar/' . $artigo->id_artigo); ?>">
                                                <div class="modal-body p-4 text-center">
                                                    <h4 class="mb-0">Habilitar Registro!</h4>
                                                    <br />
                                                    <p class="mb-0"><i class="fas fa-exclamation-triangle"></i> Tem certeza que deseja <strong>habilitar</strong> o registro?</p>
                                                    <input type="hidden" class="form-control" id="D_E_L_E_T_" name="D_E_L_E_T_" value="">
                                                </div>
                                                <div class="modal-footer flex-nowrap p-0">
                                                    <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right">
                                                        <strong><i class="far fa-check-circle"></i> Sim, habilitar!</strong></button>
                                                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 text-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Não!</button>
                                                </div>
                                            </form>
                                            <!-- End FORM ON FOOTER -->
                                        </div>
                                    </div>
                                </div>
                                <!-- ATIVANDO DADOS -->
                                <!-- Carregando Modal - Ações -->

                            <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->