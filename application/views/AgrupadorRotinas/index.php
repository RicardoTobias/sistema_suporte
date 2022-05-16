<div class="container-fluid">

    <div class="card">

        <div class="container mb-3">
            <div class="row">
                <div class="col-md-8 mt-3">

                    <h2><i class="fas fa-layer-group"></i> <?= $titulo; ?></h2>

                </div><!-- col-md-8 mt-3 -->

                <div class="col-md-4 mt-3">
                    <span class="float-right">
                        <a href="<?= base_url($url . '/adicionar'); ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Criar registro
                        </a>
                    </span><!-- float-right -->

                </div><!-- col-md-4 mt-3 -->

            </div><!-- row -->
        </div><!-- container mb-3 -->

        <!-- Breadcrumb -->
        <nav>
            <ol class="breadcrumb bg-transparent rounded-0 border-bottom border-top">

                <li class="breadcrumb-item">
                    <a href="<?= base_url('/') ?>">
                        <i class="fas fa-home"></i> Início
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    <i class="fas fa-layer-group"></i> Agrupador de rotinas
                </li>

            </ol>
        </nav>

        <?php //Caso o alerta seja ativado, será exibido conforme rotina abaixo 
        ?>

        <?php if (isset($alert)) : ?>

            <div class="container-fluid">

                <?php
                /**  
                 * A cor do alerta irá depender do tipo de informação que o usuário ou o sistema irá informar.
                 * Verificar controller no método index
                 **/
                ?>

                <?php foreach ($alert as $a => $color) : ?>
                    <?php if ($msg = $this->session->flashdata($a)) : ?>

                        <div class="alert alert-<?= $color; ?> alert-dismissible fade show pt-4 pb-4" role="alert">

                            <span class="text-uppercase font-weight-bold">
                                <i class="fas fa-exclamation-triangle"></i> <?= $msg; ?>
                            </span>

                            <button type="button" class="close pt-4" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div><!-- alert -->

                    <?php endif; ?>
                <?php endforeach; ?>

            </div><!-- container-fluid -->
        <?php endif; ?>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-hover table-sm dataTable display">

                    <thead>
                        <tr>
                            <th>Agrupador de Rotinas</th>
                            <th class="text-right no-sort">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($listarDados as $grupoRotina) : ?>
                            <tr>
                                <td><?= strtoupper($grupoRotina->agrupador); ?></td>
                                <td class="text-center">
                                    <?php if ($grupoRotina->D_E_L_E_T_ == '*') : ?>
                                        <a href="javascript(void);" class="btn btn-outline-success btn-sm" data-tt="tooltip" data-placement="top" data-toggle="modal" data-target="#ativar-<?= $grupoRotina->id_agrupador_rotina; ?>" title="Recuperar registro">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    <?php else : ?>
                                        <a href='<?= base_url($url . '/editar/' . $grupoRotina->id_agrupador_rotina) ?>' class='btn btn-outline-primary btn-sm' data-tt="tooltip" data-placement='top' data-target="#editar" title='Editar'>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript(void);" class="btn btn-outline-danger btn-sm" data-tt="tooltip" data-placement="top" title="Excluir" data-toggle="modal" data-target="#deletar-<?= $grupoRotina->id_agrupador_rotina; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>

                            <!-- Carregando Modal - Ações -->
                            <!-- DELETANDO DADOS -->
                            <div class="modal fade" id="deletar-<?= $grupoRotina->id_agrupador_rotina; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-4 shadow">
                                        <form method="POST" action="<?= base_url($url . '/excluir/' . $grupoRotina->id_agrupador_rotina); ?>">

                                            <div class="modal-body p-4 text-center">

                                                <h4 class="mb-0">Excluir Registro!</h4><br />

                                                <p class="mb-0">
                                                    <i class="fas fa-exclamation-triangle"></i> Tem certeza que deseja <strong>excluir</strong> o registro?
                                                </p>

                                                <input type="hidden" class="form-control" id="D_E_L_E_T_" name="D_E_L_E_T_" value="*">

                                            </div><!-- modal-body p-4 text-center -->

                                            <div class="modal-footer flex-nowrap p-0">
                                                <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right">
                                                    <strong><i class="far fa-check-circle"></i> Sim, excluir!</strong></button>
                                                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 text-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Não!</button>
                                            </div><!-- modal-footer flex-nowrap p-0 -->

                                        </form><!-- End FORM ON FOOTER -->
                                    </div>
                                    <!--modal-content rounded-4 shadow -->
                                </div><!-- modal-dialog -->
                            </div><!-- modal fade -->

                            <!-- DELETANDO DADOS -->

                            <!-- ATIVANDO DADOS -->
                            <div class="modal fade" id="ativar-<?= $grupoRotina->id_agrupador_rotina; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-4 shadow">
                                        <form method="POST" action="<?= base_url($url . '/ativar/' . $grupoRotina->id_agrupador_rotina); ?>">
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

                </table><!-- table table-hover table-sm dataTable -->
            </div><!-- /.table-responsive -->
        </div><!-- /.card-body -->

    </div><!-- /.card -->
</div><!-- /.container-fluid -->