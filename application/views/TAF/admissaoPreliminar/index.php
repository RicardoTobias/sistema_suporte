    <!-- Begin Page Content -->
    <div class="container-fluid p-0">

        <!-- DataTales Example -->
        <div class="card rounded-0 border-left-0 border-right-0 border-bottom-0">

            <div class="container mb-3">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <h2>
                            <i class="fas fa-layer-group"></i> <?= $titulo; ?>

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
                                <i class="fas fa-home"></i> In??cio
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            <i class="fas fa-layer-group"></i> <?= $titulo; ?>
                        </li>

                    </ol>
                </nav>

                <div class="card-header py-3">

                    <!-- Alerts -->
                    <div class="container">
                        <?php $this->load->view('template/_parts/_alerts'); ?>
                    </div>

                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                
                                <?php if (isset($evento)) : ?>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <h3 class="h6 font-weight-bold">
                                                <i class="fas fa-angle-right"></i> Evento: <?= $evento; ?>
                                            </h3>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($SX2) && ($nomeTabela)) : ?>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <h4 class="font-weight-bold text-uppercase">
                                                Registros Cadastrados na tabela <?= $nomeTabela ?> | <?= $SX2; ?>
                                            </h4>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <!-- Descri????o da p??gina/rotina -->
                                        <p class="mb-0 text-justify"><?= $descricao; ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dataTable table-sm" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_ID;"></i> ID
                                    </th>

                                    <th class="text-center">
                                        <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_FILIAL;"></i> Filial
                                    </th>

                                    <th class="text-center">
                                        <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_CPF;"></i> CPF
                                    </th>

                                    <th class="text-center">
                                        <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_DTADMI;"></i> Admiss??o
                                    </th>

                                    <th class="text-center">
                                        <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_EVENTO;"></i> Evento
                                    </th>

                                    <th class="text-center">
                                        <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_STATUS;"></i> Status
                                    </th>

                                    <th class="text-center">
                                        <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_ATIVO;"></i> Ativo
                                    </th>

                                    <th class="text-center no-sort">A????es</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($listarDados as $admPrelim) : ?>

                                    <tr>
                                        <td class="text-center"><?= $admPrelim->T3A_ID; ?></td>
                                        <td class="text-center"><?= $admPrelim->T3A_FILIAL; ?></td>
                                        <td class="text-center"><?= $admPrelim->T3A_CPF; ?></td>
                                        <td class="text-center"><?= $admPrelim->T3A_DTADMI; ?></td>

                                        <td class="text-center">
                                            <?php if ($admPrelim->T3A_EVENTO == 'I') : ?>
                                                <span class="badge badge-success">Inclus??o</span>
                                            <?php elseif ($admPrelim->T3A_EVENTO == 'A') : ?>
                                                <span class="badge badge-warning">Altera????o</span>
                                            <?php elseif ($admPrelim->T3A_EVENTO == 'E') : ?>
                                                <span class="badge badge-danger">Exclus??o</span>';
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <?php if ($admPrelim->T3A_STATUS == ' ') : ?>
                                                <span class="badge badge-primary">N??o processado</span>
                                            <?php elseif ($admPrelim->T3A_STATUS == '1') : ?>
                                                <span class="badge badge-primary">V??lido</span>
                                            <?php elseif ($admPrelim->T3A_STATUS == '2') : ?>
                                                <span class="badge badge-info">Aguardando retorno</span>
                                            <?php elseif ($admPrelim->T3A_STATUS == '3') : ?>
                                                <span class="badge badge-danger">Inconsistente</span>
                                            <?php elseif ($admPrelim->T3A_STATUS == '4') : ?>
                                                <span class="badge badge-success">Aceito RET</span>
                                            <?php elseif ($admPrelim->T3A_STATUS == '6') : ?>
                                                <span class="badge badge-info">Aguardando retorno Exclus??o</span>
                                            <?php elseif ($admPrelim->T3A_STATUS == '7') : ?>
                                                <span class="badge badge-danger">Exclu??do RET</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <?php if ($admPrelim->T3A_ATIVO == '1') : ?>
                                                <span class="badge badge-success">Sim</span>
                                            <?php else : ?>
                                                <span class="badge badge-danger">N??o</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <?php if ($admPrelim->D_E_L_E_T_ == '*') : ?>

                                                <a href="javascript(void);" class="btn btn-outline-success btn-sm" data-tt="tooltip" data-placement="top" data-toggle="modal" data-target="#ativar-<?= $admPrelim->R_E_C_N_O_; ?>" title="Recuperar registro">
                                                    <i class="fas fa-check"></i>
                                                </a>

                                            <?php else : ?>

                                                <a href='<?= base_url($url . '/editar/' . $admPrelim->R_E_C_N_O_) ?>' class='btn btn-outline-primary btn-sm' data-tt="tooltip" data-placement='top' data-target="#editar" title='Editar'>
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="javascript(void);" class="btn btn-outline-danger btn-sm" data-tt="tooltip" data-placement="top" title="Excluir" data-toggle="modal" data-target="#deletar-<?= $admPrelim->R_E_C_N_O_; ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>

                                            <?php endif; ?>

                                        </td>

                                    </tr>

                                    <!-- Carregando Modal - A????es -->
                                    <!-- DELETANDO DADOS -->
                                    <div class="modal fade" id="deletar-<?= $admPrelim->R_E_C_N_O_; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content rounded-4 shadow">
                                                <form method="POST" action="<?= base_url($url . '/excluir/' . $admPrelim->R_E_C_N_O_); ?>">
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
                                                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 text-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> N??o!</button>
                                                    </div>
                                                </form>
                                                <!-- End FORM ON FOOTER -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- DELETANDO DADOS -->

                                    <!-- ATIVANDO DADOS -->
                                    <div class="modal fade" id="ativar-<?= $admPrelim->R_E_C_N_O_; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content rounded-4 shadow">
                                                <form method="POST" action="<?= base_url($url . '/ativar/' . $admPrelim->R_E_C_N_O_); ?>">
                                                    <div class="modal-body p-4 text-center">
                                                        <h4 class="mb-0">Habilitar Registro!</h4>
                                                        <br />
                                                        <p class="mb-0"><i class="fas fa-exclamation-triangle"></i> Tem certeza que deseja <strong>habilitar</strong> o registro?</p>
                                                        <input type="hidden" class="form-control" id="D_E_L_E_T_" name="D_E_L_E_T_" value="">
                                                    </div>
                                                    <div class="modal-footer flex-nowrap p-0">
                                                        <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right">
                                                            <strong><i class="far fa-check-circle"></i> Sim, habilitar!</strong></button>
                                                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 text-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> N??o!</button>
                                                    </div>
                                                </form>
                                                <!-- End FORM ON FOOTER -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ATIVANDO DADOS -->
                                    <!-- Carregando Modal - A????es -->
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
                                        <h4 class="mb-0">
                                            <i class="fas fa-filter"></i> Filtrar exibi????o dos registros
                                        </h4>
                                    </div>

                                    <div class="col-md-6">
                                        <button id="btn-service-list" class="btn btn-link text-secondary float-right" type="button" data-toggle="collapse" data-target="#moreFilter">
                                            [+] Exibir mais op????es de filtro
                                        </button>
                                    </div>

                                </div>
                            </div>

                            <hr>

                            <div class="row mb-4">

                                <!-- Begin T3A_ID -->
                                <div class="col-md-6">

                                    <label for="T3A_ID">ID</label>

                                    <div class="input-group">

                                        <input type="text" class="form-control" id="T3A_ID" name="T3A_ID">

                                        <!-- Begin TOOLTIP -->
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: T3A_ID;">?</button>
                                        </div>
                                        <!-- End TOOLTIP -->

                                    </div>

                                </div>
                                <!-- End T3A_ID -->

                                <!-- End T3A_FILIAL -->
                                <div class="col-md-6">

                                    <label for="T3A_FILIAL">Filial</label>

                                    <div class="input-group">

                                        <input type="text" class="form-control" id="T3A_FILIAL" name="T3A_FILIAL">

                                        <!-- Begin TOOLTIP -->
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: T3A_FILIAL;">?</button>
                                        </div>
                                        <!-- End TOOLTIP -->

                                    </div>
                                </div>
                                <!-- End T3A_FILIAL -->

                            </div>

                            <div class="row mb-4">

                                <!-- Begin T3A_CPF -->
                                <div class="col-md-6">

                                    <label for="T3A_CPF">CPF</label>

                                    <div class="input-group">

                                        <input type="text" class="form-control" id="T3A_CPF" name="T3A_CPF">

                                        <!-- Begin TOOLTIP -->
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: T3A_CPF;">?</button>
                                        </div>
                                        <!-- End TOOLTIP -->

                                    </div>
                                </div>
                                <!-- End T3A_CPF -->

                                <!-- Begin T3A_DTADMI -->
                                <div class="col-md-6">

                                    <label for="T3A_DTADMI">Data da admiss??o</label>

                                    <div class="input-group">

                                        <input type="text" class="form-control" id="T3A_DTADMI" name="T3A_DTADMI">

                                        <!-- Begin TOOLTIP -->
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: T3A_DTADMI;">?</button>
                                        </div>
                                        <!-- End TOOLTIP -->

                                    </div>
                                </div>
                                <!-- End T3A_CPF -->

                            </div>

                            <div class="row mb-4 collapse" id="moreFilter">

                                <!-- Begin T3A_EVENTO -->
                                <div class="col-md-4">

                                    <label for="T3A_EVENTO">Tipo do evento</label>

                                    <div class="input-group">

                                        <select class="form-control form-select custom-select" name="T3A_EVENTO">
                                            <option value="">N??o informar</option>
                                            <option value="I">Inclus??o</option>
                                            <option value="A">Altera????o</option>
                                            <option value="A">Exclus??o</option>
                                        </select>

                                        <!-- Begin TOOLTIP -->
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: T3A_EVENTO;">?</button>
                                        </div>
                                        <!-- End TOOLTIP -->

                                    </div>

                                </div>
                                <!-- End T3A_EVENTO -->

                                <!-- Begin T3A_STATUS -->
                                <div class="col-md-4">

                                    <label for="T3A_STATUS" class="form-label">Status</label>

                                    <div class="input-group">

                                        <select class="form-control form-select custom-select" name="T3A_STATUS">
                                            <option value="">N??o informar</option>
                                            <option value="0">V??lido</option>
                                            <option value="1">Inv??lido</option>
                                            <option value="2">Aguardando retorno</option>
                                            <option value="3">Inconsistente</option>
                                            <option value="4">Aceito RET</option>
                                            <option value="6">Aguardando Exclus??o</option>
                                            <option value="7">Exclu??do RET</option>
                                        </select>

                                        <!-- Begin TOOLTIP -->
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: T3A_STATUS;">?</button>
                                        </div>
                                        <!-- End TOOLTIP -->

                                    </div>

                                </div>
                                <!-- End T3A_STATUS -->

                                <!-- Begin T3A_ATIVO -->
                                <div class="col-md-4">

                                    <label for="T3A_ATIVO" class="form-label">Ativo</label>

                                    <div class="input-group">

                                        <select class="form-control form-select custom-select" name="T3A_ATIVO">
                                            <option value="">N??o informar</option>
                                            <option value="1">Sim</option>
                                            <option value="2">N??o</option>
                                        </select>

                                        <!-- Begin TOOLTIP -->
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: T3A_ATIVO;">?</button>
                                        </div>
                                        <!-- End TOOLTIP -->

                                    </div>

                                </div>
                                <!-- End T3A_ATIVO -->

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