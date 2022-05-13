    <!-- Begin Page Content -->
    <div class="container-fluid p-0">

        <div class="container mb-3">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h2><i class="fas fa-layer-group"></i> <?= $titulo; ?>

                        <?php if (isset($filtro)) : ?>
                            <span class="float-right">

                                <?php if ($filtro == FALSE) : ?>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#filtro">
                                        <i class="fas fa-filter"></i> Filtrar Dados
                                    </button>

                                <?php else : ?>

                                    <!-- Button trigger modal -->
                                    <a href="<?= base_url($url) ?>" class="btn btn-link btn-md text-right text-danger">
                                        <i class="fas fa-ban"></i> Cancelar Filtro
                                    </a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-link btn-md text-right" data-toggle="modal" data-target="#filtro">
                                        <i class="fas fa-filter"></i> Filtrar Dados
                                    </button>

                                <?php endif; ?>

                            </span>
                        <?php endif; ?>
                    </h2>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card rounded-0 border-left-0 border-right-0 border-bottom-0">

            <!-- Breadcrumb -->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent rounded-0 border-bottom border-top mb-0">

                    <li class="breadcrumb-item">
                        <a href="<?= base_url('/') ?>">
                            <i class="fas fa-home"></i> Início
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        <i class="fas fa-layer-group"></i> <?= $titulo; ?>
                    </li>

                </ol>
            </nav>

            <!-- Alerts -->
            <?php $this->load->view('template/_parts/_alerts'); ?>


            <div class="card-header py-3">
                <div class="row">
                    <div class="container-fluid">
                        <?php if (isset($SX2) && ($nomeTabela)) : ?>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="row">
                                        <h4 class="font-weight-bold text-uppercase">
                                            Registros Cadastrados na tabela <?= $nomeTabela ?> | <?= $SX2; ?>
                                        </h4>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <!-- Descrição da página/rotina -->
                                    <p class="mb-0 text-justify"><?= $descricao; ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable table-sm" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="C8R_ID;"></i> ID</th>
                                <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="C8R_ID;"></i> Código filial</th>
                                <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top" title="C8R_ID;"></i> Código ERP</th>
                                <th class="text-center no-sort">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listarDados as $idenTabRub) : ?>
                                <tr>
                                    <td class="text-center"><?= $idenTabRub->T3M_ID; ?></td>
                                    <td class="text-center"><?= $idenTabRub->T3M_FILIAL; ?></td>
                                    <td class="text-center"><?= $idenTabRub->T3M_CODERP; ?></td>
                                    <td class="text-center">
                                        <?php if ($idenTabRub->D_E_L_E_T_ == '*') : ?>

                                            <a href="javascript(void);" class="btn btn-outline-success btn-sm" data-tt="tooltip" data-placement="top" data-toggle="modal" data-target="#ativar-<?= $idenTabRub->R_E_C_N_O_; ?>" title="Recuperar registro">
                                                <i class="fas fa-check"></i>
                                            </a>

                                        <?php else : ?>

                                            <a href='<?= base_url($url . '/editar/' . $idenTabRub->R_E_C_N_O_) ?>' class='btn btn-outline-primary btn-sm' data-tt="tooltip" data-placement='top' data-target="#editar" title='Editar'>
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="javascript(void);" class="btn btn-outline-danger btn-sm" data-tt="tooltip" data-placement="top" title="Excluir" data-toggle="modal" data-target="#deletar-<?= $idenTabRub->R_E_C_N_O_; ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                        <?php endif; ?>

                                    </td>
                                </tr>
                                <!-- Carregando Modal - Ações -->
                                <!-- DELETANDO DADOS -->
                                <div class="modal fade" id="deletar-<?= $idenTabRub->R_E_C_N_O_; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content rounded-4 shadow">
                                            <form method="POST" action="<?= base_url($url . '/excluir/' . $idenTabRub->R_E_C_N_O_); ?>">
                                                <div class="modal-body p-4 text-center">
                                                    <h4 class="mb-0">Excluir Registro!</h4>
                                                    <br />
                                                    <p class="mb-0"><i class="fas fa-exclamation-triangle"></i> Tem certeza que deseja <strong>excluir</strong> o registro?</p>
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

                                <!-- ATIVANDO DADOS -->
                                <div class="modal fade" id="ativar-<?= $idenTabRub->R_E_C_N_O_; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content rounded-4 shadow">
                                            <form method="POST" action="<?= base_url($url . '/ativar/' . $idenTabRub->R_E_C_N_O_); ?>">
                                                <div class="modal-body p-4 text-center">
                                                    <h5 class="mb-0">Habilitar Registro!</h5>
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

    <!-- FILTRO -->
    <div class="modal fade" id="filtro" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-4 shadow">

                <!-- Begin CONTENT -->
                <div class="modal-body">

                    <form method="POST" action="<?= base_url($url . '/filtrar-dados'); ?>">

                        <div class="modal-body p-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-0"><i class="fas fa-filter"></i> Filtrar exibição dos registros</h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-4">

                            <!-- Begin T3M_ID -->
                            <div class="col-md-4">

                                <label for="T3M_ID">ID</label>

                                <div class="input-group">

                                    <input type="text" class="form-control" id="T3M_ID" name="T3M_ID">

                                    <!-- Begin TOOLTIP -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: T3M_ID;">?</button>
                                    </div>
                                    <!-- End TOOLTIP -->

                                </div>

                            </div>
                            <!-- End T3M_ID -->

                            <!-- End T3M_FILIAL -->
                            <div class="col-md-4">

                                <label for="T3M_FILIAL">Filial</label>

                                <div class="input-group">

                                    <input type="text" class="form-control" id="T3M_FILIAL" name="T3M_FILIAL">

                                    <!-- Begin TOOLTIP -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: T3M_FILIAL;">?</button>
                                    </div>
                                    <!-- End TOOLTIP -->

                                </div>
                            </div>
                            <!-- End T3M_FILIAL -->

                            <!-- Begin T3M_CODERP -->
                            <div class="col-md-4">

                                <label for="T3M_CODERP">Código ERP</label>

                                <div class="input-group">

                                    <input type="text" class="form-control" id="T3M_CODERP" name="T3M_CODERP">

                                    <!-- Begin TOOLTIP -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: T3M_CODERP;">?</button>
                                    </div>
                                    <!-- End TOOLTIP -->

                                </div>
                            </div>
                            <!-- End T3M_CODERP -->

                        </div>

                </div>
                <!-- End Content -->

                <div class="modal-footer flex-nowrap p-0">
                    <button type="submit" class="btn btn-lg btn-link text-decoration-none col-6 m-0 pt-3 pb-3 rounded-0 border-right">
                        <strong><i class="far fa-check-circle"></i> Filtrar dados!</strong></button>
                    <button type="button" class="btn btn-lg btn-link text-decoration-none col-6 m-1 rounded-0 text-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar filtro!</button>
                </div>

                </form>
                <!-- End FORM ON FOOTER -->

            </div>
        </div>
    </div>