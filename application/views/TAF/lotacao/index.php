    <!-- Begin Page Content -->
    <div class="container-fluid p-0">

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
                                <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C99_ID;"></i> ID</th>
                                <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C99_FILIAL;"></i> Filial</th>
                                <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C99_DTINI;"></i> Início</th>
                                <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C99_CODIGO"></i> CÓDIGO</th>
                                <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C99_EVENTO;"></i> Evento</th>
                                <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C99_STATUS;"></i> Status</th>
                                <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C92_ATIVO;"></i>
                                    Ativo</th>
                                <th class="text-center no-sort">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listarDados as $lotacao) : ?>
                                <tr>
                                    <td class="text-center"><?= $lotacao->C99_ID; ?></td>
                                    <td class="text-center"><?= $lotacao->C99_FILIAL; ?></td>

                                    <td class="text-center"><?= $lotacao->C99_DTINI; ?></td>

                                    <td class="text-center">
                                        <?= $lotacao->C99_CODIGO; ?>
                                    </td>

                                    <td class="text-center">

                                        <?php if ($lotacao->C99_EVENTO == 'I') : ?>
                                            <span class="badge badge-success">Inclusão</span>
                                        <?php elseif ($lotacao->C99_EVENTO == 'A') : ?>
                                            <span class="badge badge-warning">Alteração</span>
                                        <?php elseif ($lotacao->C99_EVENTO == 'E') : ?>
                                            <span class="badge badge-danger">Exclusão</span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if ($lotacao->C99_STATUS == '') : ?>
                                            <span class="badge badge-primary">Não processado</span>
                                        <?php elseif ($lotacao->C99_STATUS == '1') : ?>
                                            <span class="badge badge-primary">Válido</span>
                                        <?php elseif ($lotacao->C99_STATUS == '2') : ?>
                                            <span class="badge badge-info">Aguardando retorno</span>
                                        <?php elseif ($lotacao->C99_STATUS == '3') : ?>
                                            <span class="badge badge-danger">Inconsistente</span>
                                        <?php elseif ($lotacao->C99_STATUS == '4') : ?>
                                            <span class="badge badge-success">Aceito RET</span>
                                        <?php elseif ($lotacao->C99_STATUS == '6') : ?>
                                            <span class="badge badge-info">Aguardando retorno Exclusão</span>
                                        <?php elseif ($lotacao->C99_STATUS == '7') : ?>
                                            <span class="badge badge-danger">Excluído RET</span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if ($lotacao->C99_ATIVO == '1') : ?>
                                            <span class="badge badge-success">Sim</span>
                                        <?php else : ?>
                                            <span class="badge badge-danger">Não</span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if ($lotacao->D_E_L_E_T_ == '*') : ?>

                                            <a href="javascript(void);" class="btn btn-outline-success btn-sm" data-tt="tooltip" data-placement="top" data-toggle="modal" data-target="#ativar-<?= $lotacao->R_E_C_N_O_; ?>" title="Recuperar registro">
                                                <i class="fas fa-check"></i>
                                            </a>

                                        <?php else : ?>

                                            <a href='<?= base_url($url . '/editar/' . $lotacao->R_E_C_N_O_) ?>' class='btn btn-outline-primary btn-sm' data-tt="tooltip" data-placement='top' data-target="#editar" title='Editar'>
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="javascript(void);" class="btn btn-outline-danger btn-sm" data-tt="tooltip" data-placement="top" title="Excluir" data-toggle="modal" data-target="#deletar-<?= $lotacao->R_E_C_N_O_; ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                        <?php endif; ?>
                                </tr>
                                <!-- Carregando Modal - Ações -->
                                <!-- DELETANDO DADOS -->
                                <div class="modal fade" id="deletar-<?= $lotacao->R_E_C_N_O_; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content rounded-4 shadow">
                                            <form method="POST" action="<?= base_url($url . '/excluir/' . $estabelecimento->R_E_C_N_O_); ?>">
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
                                <div class="modal fade" id="ativar-<?= $lotacao->R_E_C_N_O_; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content rounded-4 shadow">
                                            <form method="POST" action="<?= base_url($url . '/ativar/' . $estabelecimento->R_E_C_N_O_); ?>">
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
                                <div class="col-md-6">
                                    <button id="btn-service-list" class="btn btn-link text-secondary float-right" type="button" data-toggle="collapse" data-target="#moreFilter">
                                        [+] Exibir mais opções de filtro
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-4">

                            <!-- Begin C99_ID -->
                            <div class="col-md-4">

                                <label for="C99_ID">ID</label>

                                <div class="input-group">

                                    <input type="text" class="form-control" id="C99_ID" name="C99_ID">

                                    <!-- Begin TOOLTIP -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: C99_ID;">?</button>
                                    </div>
                                    <!-- End TOOLTIP -->

                                </div>

                            </div>
                            <!-- End C99_ID -->

                            <!-- End C99_FILIAL -->
                            <div class="col-md-4">

                                <label for="C99_FILIAL">Filial</label>

                                <div class="input-group">

                                    <input type="text" class="form-control" id="C99_FILIAL" name="C99_FILIAL">

                                    <!-- Begin TOOLTIP -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: C99_FILIAL;">?</button>
                                    </div>
                                    <!-- End TOOLTIP -->

                                </div>
                            </div>
                            <!-- End C99_FILIAL -->

                            <!-- Begin C99_DTINI -->
                            <div class="col-md-4">

                                <label for="C99_DTINI">Data de início</label>

                                <div class="input-group">

                                    <input type="text" class="form-control" id="C99_DTINI" name="C99_DTINI">

                                    <!-- Begin TOOLTIP -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: C99_DTINI;">?</button>
                                    </div>
                                    <!-- End TOOLTIP -->

                                </div>
                            </div>
                            <!-- End C99_DTINI -->

                        </div>

                        <div class="row mb-4">

                            <!-- Begin C99_CODIGO -->
                            <div class="col-md-12">

                                <label for="C99_CODIGO">Código de lotação tributária</label>

                                <div class="input-group">

                                    <input type="text" class="form-control" id="C99_CODIGO" name="C99_CODIGO">

                                    <!-- Begin TOOLTIP -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: C99_CODIGO;">?</button>
                                    </div>
                                    <!-- End TOOLTIP -->

                                </div>

                            </div>
                            <!-- End C99_CODIGO -->

                        </div>

                        <div class="row mb-4 collapse" id="moreFilter">

                            <!-- Begin C99_EVENTO -->
                            <div class="col-md-4">

                                <label for="C99_EVENTO">Tipo do evento</label>

                                <div class="input-group">

                                    <select class="form-control form-select custom-select" name="C99_EVENTO">
                                        <option value="">Não informar</option>
                                        <option value="I">Inclusão</option>
                                        <option value="A">Alteração</option>
                                        <option value="A">Exclusão</option>
                                    </select>

                                    <!-- Begin TOOLTIP -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: C99_EVENTO;">?</button>
                                    </div>
                                    <!-- End TOOLTIP -->

                                </div>

                            </div>
                            <!-- End C99_EVENTO -->

                            <!-- Begin C99_STATUS -->
                            <div class="col-md-4">

                                <label for="C99_STATUS" class="form-label">Status</label>

                                <div class="input-group">

                                    <select class="form-control form-select custom-select" name="C99_STATUS">
                                        <option value="">Não informar</option>
                                        <option value="0">Válido</option>
                                        <option value="1">Inválido</option>
                                        <option value="2">Aguardando retorno</option>
                                        <option value="3">Inconsistente</option>
                                        <option value="4">Aceito RET</option>
                                        <option value="6">Aguardando Exclusão</option>
                                        <option value="7">Excluído RET</option>
                                    </select>

                                    <!-- Begin TOOLTIP -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: C99_STATUS;">?</button>
                                    </div>
                                    <!-- End TOOLTIP -->

                                </div>

                            </div>
                            <!-- End C99_STATUS -->

                            <!-- Begin C99_ATIVO -->
                            <div class="col-md-4">

                                <label for="C99_ATIVO" class="form-label">Ativo</label>

                                <div class="input-group">

                                    <select class="form-control form-select custom-select" name="C99_ATIVO">
                                        <option value="">Não informar</option>
                                        <option value="1">Sim</option>
                                        <option value="2">Não</option>
                                    </select>

                                    <!-- Begin TOOLTIP -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" data-tt="tooltip" data-placement="top" title="Campo: C99_ATIVO;">?</button>
                                    </div>
                                    <!-- End TOOLTIP -->

                                </div>

                            </div>
                            <!-- End C99_ATIVO -->

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