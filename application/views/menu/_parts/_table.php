<table class="table table-striped dataTable table-sm" width="100%" cellspacing="0">

    <a href="<?= base_url('menu/adicionar'); ?>" class="float-right btn btn-primary btn-sm">
        <i class="far fa-plus-square"></i> Adicionar
    </a>

    <thead>

        <tr>
            <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="Menu;"></i> Menu</th>
            <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="Menu;"></i> Categoria</th>
            <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="Menu;"></i> Rota (Link)</th>
            <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="Ativo;"></i> Ativo</th>
            <th class="text-center"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="D_E_L_E_T_;"></i> Deletado</th>
            <th class="text-center no-sort">Ações</th>
        </tr>

    </thead>

    <tbody>

        <?php foreach ($listarDados as $menu) : ?>

            <tr>

                <td class="text-center"><?= strtoupper($menu->Menu); ?></td>
                <td class="text-center"><?= strtoupper($menu->categoria); ?></td>
                <td class="text-center"><?= $menu->Link; ?></td>
                <td class="text-center"><?= $menu->Ativo; ?></td>
                <td class="text-center"><?= $menu->D_E_L_E_T_; ?></td>
                <td class="text-center">
                    <?php if ($menu->D_E_L_E_T_ == '*') : ?>

                        <a href="javascript(void);" class="btn btn-outline-success btn-sm" data-tt="tooltip" data-placement="top" data-toggle="modal" data-target="#ativar-<?= $menu->ID_Menu; ?>" title="Recuperar registro">
                            <i class="fas fa-check"></i>
                        </a>

                    <?php else : ?>

                        <a href='<?= base_url('menu/editar/' . $menu->ID_Menu) ?>' class='btn btn-outline-primary btn-sm' data-tt="tooltip" data-placement='top' data-target="#editar" title='Editar'>
                            <i class="fas fa-edit"></i>
                        </a>

                        <a href="javascript(void);" class="btn btn-outline-danger btn-sm" data-tt="tooltip" data-placement="top" title="Excluir" data-toggle="modal" data-target="#deletar-<?php echo $menu->ID_Menu; ?>">
                            <i class="fas fa-trash-alt"></i>
                        </a>

                    <?php endif; ?>

                </td>

            </tr>

            <!-- Carregando Modal - Ações -->
            <!-- DELETANDO DADOS -->
            <div class="modal fade" id="deletar-<?= $menu->ID_Menu; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content rounded-4 shadow">
                        <form method="POST" action="<?= base_url('menu/excluir/' . $menu->ID_Menu); ?>">
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
            <div class="modal fade" id="ativar-<?= $menu->ID_Menu; ?>" tabindex="-1" role="dialog" aria-labelledby="filtro" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content rounded-4 shadow">
                        <form method="POST" action="<?= base_url('menu/ativar/' . $menu->ID_Menu); ?>">
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