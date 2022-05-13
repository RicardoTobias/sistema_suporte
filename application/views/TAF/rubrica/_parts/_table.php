<table class="table table-bordered dataTable table-sm" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C8R_ID;"></i> ID</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C8R_FILIAL;"></i> Filial</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C8R_DTINI;"></i> Início</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C8R_CODRUB;"></i> Rubrica</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C8R_IDTBRU;"></i> Identif.</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C8R_DESRUB;"></i> Descrição</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C8R_EVENTO;"></i> Evento</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C8R_STATUS;"></i> Status</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C8R_ATIVO;"></i> Ativo</th>
            <th class="text-center no-sort">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($listarDados as $rubrica) : ?>
        <tr>
            <td><?php echo $rubrica->C8R_ID; ?></td>
            <td><?php echo $rubrica->C8R_FILIAL; ?></td>
            <td><?php echo $rubrica->C8R_DTINI; ?></td>
            <td><?php echo $rubrica->C8R_CODRUB; ?></td>
            <td><?php echo $rubrica->C8R_IDTBRU; ?></td>
            <td><?php echo $rubrica->C8R_DESRUB; ?></td>
            <td>
                <?php if($rubrica->C8R_EVENTO == 'I') : ?>
                    <span class="badge badge-success">Inclusão</span>
                <?php elseif($rubrica->C8R_EVENTO == 'A') : ?>
                    <span class="badge badge-warning">Alteração</span>
                <?php elseif($rubrica->C8R_EVENTO == 'E') : ?>
                <span class="badge badge-danger">Exclusão</span>
                <?php endif; ?>
            </td>
            <td>
                <?php if($rubrica->C8R_STATUS == '') : ?>
                    <span class="badge badge-primary">Não processado</span>
                <?php elseif($rubrica->C8R_STATUS == '1') : ?>
                    <span class="badge badge-primary">Válido</span>
                <?php elseif($rubrica->C8R_STATUS == '2') : ?>
                    <span class="badge badge-info">Aguardando retorno</span>
                <?php elseif($rubrica->C8R_STATUS == '3') : ?>
                    <span class="badge badge-danger">Inconsistente</span>
                <?php elseif($rubrica->C8R_STATUS == '4') : ?>
                    <span class="badge badge-success">Aceito RET</span>
                <?php elseif($rubrica->C8R_STATUS == '6') : ?>
                    <span class="badge badge-info">Aguardando retorno Exclusão</span>
                <?php elseif($rubrica->C8R_STATUS == '7') : ?>
                    <span class="badge badge-danger">Excluído RET</span>
                <?php endif; ?>
            </td>
            <td class="text-center">
                <?php if($rubrica->C8R_ATIVO == '1') : ?>
                <span class="badge badge-success">Sim</span>
                <?php else : ?>
                <span class="badge badge-danger">Não</span>
                <?php endif; ?>
            </td>

            <td class="text-center">
                <?php if($rubrica->D_E_L_E_T_ == '*') : ?>

                <a href="javascript(void);" class="btn btn-outline-success btn-sm" data-tt="tooltip"
                    data-placement="top" data-toggle="modal" data-target="#ativar-<?php echo $rubrica->R_E_C_N_O_; ?>"
                    title="Recuperar registro">
                    <i class="fas fa-check"></i>
                </a>

                <?php else : ?>

                <a href='<?php echo base_url('rubricas/editar/'.$rubrica->R_E_C_N_O_) ?>'
                    class='btn btn-outline-primary btn-sm' data-tt="tooltip" data-placement='top' data-target="#editar"
                    title='Editar'>
                    <i class="fas fa-edit"></i>
                </a>

                <a href="javascript(void);" class="btn btn-outline-danger btn-sm" data-tt="tooltip" data-placement="top"
                    title="Excluir" data-toggle="modal" data-target="#deletar-<?php echo $rubrica->R_E_C_N_O_; ?>">
                    <i class="fas fa-trash-alt"></i>
                </a>

                <?php endif; ?>

            </td>

        </tr>
        <!-- Carregando Modal - Ações -->
        <!-- DELETANDO DADOS -->
        <div class="modal fade" id="deletar-<?php echo $rubrica->R_E_C_N_O_; ?>" tabindex="-1" role="dialog"
            aria-labelledby="filtro" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <form method="POST"
                            action="<?php echo base_url('rubricas/excluir/'.$rubrica->R_E_C_N_O_);?>">
                        <div class="modal-body p-4 text-center">
                            <h4 class="mb-0">Excluir Registro!</h4>
                            <br />
                            <p class="mb-0"><i class="fas fa-exclamation-triangle"></i> Tem certeza que deseja <strong>excluir</strong> o registro?</p>
                            <input type="hidden" class="form-control" id="D_E_L_E_T_" name="D_E_L_E_T_" value="*">
                        </div>
                        <div class="modal-footer flex-nowrap p-0">
                            <button type="submit"
                                class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right">
                                <strong><i class="far fa-check-circle"></i> Sim, excluir!</strong></button>
                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 text-danger"
                                data-dismiss="modal"><i class="far fa-times-circle"></i> Não!</button>
                        </div>
                    </form>
                    <!-- End FORM ON FOOTER -->
                </div>
            </div>
        </div>

        <!-- ATIVANDO DADOS -->
        <div class="modal fade" id="ativar-<?php echo $rubrica->R_E_C_N_O_; ?>" tabindex="-1" role="dialog"
            aria-labelledby="filtro" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <form method="POST"
                            action="<?php echo base_url('rubricas/ativar/'.$rubrica->R_E_C_N_O_);?>">
                        <div class="modal-body p-4 text-center">
                            <h5 class="mb-0">Habilitar Registro!</h5>
                            <br />
                            <p class="mb-0"><i class="fas fa-exclamation-triangle"></i> Tem certeza que deseja <strong>habilitar</strong> o registro?</p>
                            <input type="hidden" class="form-control" id="D_E_L_E_T_" name="D_E_L_E_T_" value="">
                        </div>
                        <div class="modal-footer flex-nowrap p-0">
                            <button type="submit"
                                class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right">
                                <strong><i class="far fa-check-circle"></i> Sim, habilitar!</strong></button>
                            <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 text-danger"
                                data-dismiss="modal"><i class="far fa-times-circle"></i> Não!</button>
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