<table class="table table-bordered dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C99_ID;"></i> ID</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C99_FILIAL;"></i> Filial</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C99_DTINI;"></i> Início</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C99_LOTACAO;"></i> Lotação</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C99_EVENTO;"></i> Evento</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C99_STATUS;"></i> Status</th>
            <th class="text-center"><i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="C99_ATIVO;"></i> Ativo</th>
            <th class="text-center no-sort">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($listarDados as $lotacao) : ?>
        <tr>
            <td class="text-center"><?php echo $lotacao->C99_ID; ?></td>
            <td class="text-center"><?php echo $lotacao->C99_FILIAL; ?></td>
            <td class="text-center"><?php echo $lotacao->C99_DTINI; ?></td>
            <td class="text-center"><?php echo $lotacao->C99_CODIGO; ?></td>
            <td>
                <?php if($lotacao->C99_EVENTO == 'I') : ?>
                    <span class="badge badge-success">Inclusão</span>
                <?php elseif($lotacao->C99_EVENTO == 'A') : ?>
                    <span class="badge badge-warning">Alteração</span>
                <?php elseif($lotacao->C99_EVENTO == 'E') : ?>
                <span class="badge badge-danger">Exclusão</span>
                <?php endif; ?>
            </td>
            <td>
                <?php if($lotacao->C99_STATUS == '') : ?>
                    <span class="badge badge-primary">Não processado</span>
                <?php elseif($lotacao->C99_STATUS == '1') : ?>
                    <span class="badge badge-primary">Válido</span>
                <?php elseif($lotacao->C99_STATUS == '2') : ?>
                    <span class="badge badge-info">Aguardando retorno</span>
                <?php elseif($lotacao->C99_STATUS == '3') : ?>
                    <span class="badge badge-danger">Inconsistente</span>
                <?php elseif($lotacao->C99_STATUS == '4') : ?>
                    <span class="badge badge-success">Aceito RET</span>
                <?php elseif($lotacao->C99_STATUS == '6') : ?>
                    <span class="badge badge-info">Aguardando retorno Exclusão</span>
                <?php elseif($lotacao->C99_STATUS == '7') : ?>
                    <span class="badge badge-danger">Excluído RET</span>
                <?php endif; ?>
            </td>
            <td class="text-center">
                <?php if($lotacao->C99_ATIVO == '1') : ?>
                <span class="badge badge-success">Sim</span>
                <?php else : ?>
                <span class="badge badge-danger">Não</span>
                <?php endif; ?>
            </td>
            <td class="text-center">
                <?php if($lotacao->D_E_L_E_T_ == '*') : ?>

                <a href="javascript(void);" class="btn btn-outline-success btn-sm" data-tt="tooltip"
                    data-placement="top" data-toggle="modal" data-target="#ativar-<?php echo $lotacao->R_E_C_N_O_; ?>"
                    title="Recuperar registro">
                    <i class="fas fa-check"></i>
                </a>

                <?php else : ?>

                <a href='<?php echo base_url('lotacao-tributaria/editar/'.$lotacao->R_E_C_N_O_) ?>'
                    class='btn btn-outline-primary btn-sm' data-tt="tooltip" data-placement='top' data-target="#editar"
                    title='Editar'>
                    <i class="fas fa-edit"></i>
                </a>

                <a href="javascript(void);" class="btn btn-outline-danger btn-sm" data-tt="tooltip" data-placement="top"
                    title="Excluir" data-toggle="modal" data-target="#deletar-<?php echo $lotacao->R_E_C_N_O_; ?>">
                    <i class="fas fa-trash-alt"></i>
                </a>

                <?php endif; ?>

            </td>
        </tr>
        <!-- Carregando Modal - Ações -->
        <!-- DELETANDO DADOS -->
        <div class="modal fade" id="deletar-<?php echo $lotacao->R_E_C_N_O_; ?>" tabindex="-1" role="dialog"
            aria-labelledby="filtro" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <form method="POST"
                            action="<?php echo base_url('lotacao-tributaria/excluir/'.$lotacao->R_E_C_N_O_);?>">
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
        <div class="modal fade" id="ativar-<?php echo $lotacao->R_E_C_N_O_; ?>" tabindex="-1" role="dialog"
            aria-labelledby="filtro" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <form method="POST"
                            action="<?php echo base_url('lotacao-tributaria/ativar/'.$lotacao->R_E_C_N_O_);?>">
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