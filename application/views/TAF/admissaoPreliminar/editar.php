<!-- Begin Page Content -->
<div class="container-fluid p-0">

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12 mt-3">
                
                <h2>
                    
                    <i class="fas fa-layer-group"></i> <?= $titulo; ?>
                    
                    <span class="float-right">
                        <a href="<?= base_url($url); ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> Voltar</a>
                    </span>
                    
                </h2>

            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card mb-4">

        <!-- Breadcrumb -->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent rounded-0 border-bottom border-top mb-0">

                <li class="breadcrumb-item">
                    <a href="<?= base_url('/') ?>">
                        <i class="fas fa-home"></i> Início
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a href="<?= base_url($url) ?>">
                        <i class="fas fa-layer-group"></i> <?= $titulo; ?>
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    <i class="fas fa-edit"></i> <?= 'Editar ' . $titulo; ?>
                </li>

            </ol>
        </nav>

        <div class="card-body">

            <form method="POST">
                <div class="row mb-4">

                    <div class="col-md-6">
                        <label for="">
                            <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_ID;"></i>
                            <strong>ID:</strong>
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="T3A_ID" value="<?= $dados->T3A_ID; ?>" disabled readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="">
                            <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_FILIAL;"></i>
                            <strong>Filial:</strong>
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="T3A_FILIAL" name="T3A_FILIAL" value="<?= $dados->T3A_FILIAL; ?>">
                        </div>
                    </div>

                </div>

                <div class="row mb-4">

                    <div class="col-md-6">
                        <label for="">
                            <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_CPF;"></i>
                            <strong>CPF</strong>
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="T3A_CPF" name="T3A_CPF" value="<?= $dados->T3A_CPF; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="">
                            <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_DTADMI;"></i>
                            <strong>Data admissão</strong>
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="T3A_DTADMI" name="T3A_DTADMI" value="<?= $dados->T3A_DTADMI; ?>">
                        </div>
                    </div>

                </div>

                <div class="row mb-4">

                    <div class="col-md-4">
                        <label for="">
                            <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_EVENTO;"></i>
                            <strong>Tipo do evento</strong>
                        </label>
                        <div class="input-group">
                            <select class="form-control form-select custom-select" name="T3A_EVENTO">
                                <option value="I" <?= ($dados->T3A_EVENTO == 'I' ? 'selected' : ''); ?>>Inclusão</option>
                                <option value="A" <?= ($dados->T3A_EVENTO == 'A' ? 'selected' : ''); ?>>Alteração</option>
                                <option value="A" <?= ($dados->T3A_EVENTO == 'E' ? 'selected' : ''); ?>>Exclusão</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">
                            <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_STATUS;"></i>
                            <strong>Status</strong>
                        </label>
                        <div class="input-group">
                            <select class="form-control form-select custom-select" name="T3A_STATUS">
                                <option value="" <?= ($dados->T3A_STATUS == '' ? 'selected' : ''); ?>>Não processado</option>
                                <option value="0" <?= ($dados->T3A_STATUS == '0' ? 'selected' : ''); ?>>Válido</option>
                                <option value="1" <?= ($dados->T3A_STATUS == '1' ? 'selected' : ''); ?>>Inválido</option>
                                <option value="2" <?= ($dados->T3A_STATUS == '2' ? 'selected' : ''); ?>>Aguardando retorno</option>
                                <option value="3" <?= ($dados->T3A_STATUS == '3' ? 'selected' : ''); ?>>Inconsistente</option>
                                <option value="4" <?= ($dados->T3A_STATUS == '4' ? 'selected' : ''); ?>>Aceito RET</option>
                                <option value="6" <?= ($dados->T3A_STATUS == '6' ? 'selected' : ''); ?>>Aguardando Exclusão</option>
                                <option value="7" <?= ($dados->T3A_STATUS == '7' ? 'selected' : ''); ?>>Excluído RET</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">
                            <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_PROTUL;"></i>
                            <strong>Protocolo</strong>
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="filial" value="<?= $dados->T3A_PROTUL; ?>" name="T3A_PROTUL">
                        </div>
                    </div>

                </div>

                <div class="row mb-4">

                    <div class="col-md-12">
                        <label for="tipoevento" class="form-label"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="T3A_ATIVO;"></i> Ativo</label>
                        <div class="input-group">
                            <select class="form-control form-select custom-select" name="T3A_ATIVO">
                                <option value="1" <?= ($dados->T3A_ATIVO == '1' ? 'selected' : ''); ?>>Sim</option>
                                <option value="2" <?= ($dados->T3A_ATIVO == '2' ? 'selected' : ''); ?>>Não</option>
                            </select>
                        </div>
                    </div>

                </div>

                <input type="hidden" name="R_E_C_N_O_" value="<?= $dados->R_E_C_N_O_ ?>">

                <div class="row mb-4">
                    <div class="col-md-12">

                        <button type="submit" class="btn btn-success btn-large btn-block pt-3 pb-3 text-uppercase font-weight-bold">
                            <i class="fas fa-check"></i> Alterar informações
                        </button>

                    </div>
                </div>
                
            </form>

        </div>

    </div>
</div>
<!-- /.container-fluid -->