<form method="POST">
    <div class="row mb-4">

        <div class="col-md-6">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C99_ID;"></i>
                <strong>ID:</strong></label>
            <div class="input-group">
                <input type="text" class="form-control" id="C99_ID" value="<?php echo $dados->C99_ID; ?>" disabled
                    readonly>
            </div>
        </div>

        <div class="col-md-6">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top"
                    title="C99_FILIAL;"></i>
                Filial</label>
            <div class="input-group">
                <input type="text" class="form-control" id="C99_FILIAL" name="C99_FILIAL"
                    value="<?php echo $dados->C99_FILIAL; ?>">
            </div>
        </div>

    </div>

    <div class="row mb-4">

        <div class="col-md-6">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top"
                    title="C99_DTINI;"></i>
                Data de início</label>
            <div class="input-group">
                <input type="text" class="form-control" id="C99_DTINI" name="C99_DTINI"
                    value="<?php echo $dados->C99_DTINI; ?>">
            </div>
        </div>

        <div class="col-md-6">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="C99_CODIGO;"></i>
                <strong>Código da Lotação Tributária:</strong></label>
            <div class="input-group">
                <input type="text" class="form-control" id="C99_CODIGO" value="<?php echo $dados->C99_CODIGO; ?>" disabled
                    readonly>
            </div>
        </div>

    </div>

    <div class="row mb-4">

        <div class="col-md-4">
            <label for=""><i class="far fa-question-circle" data-tt="tooltip" data-placement="top"
                    title="C99_EVENTO;"></i>
                Tipo
                do evento</label>
            <div class="input-group">
                <select class="form-control form-select custom-select" name="C99_EVENTO">
                    <option value="I" <?php echo ($dados->C99_EVENTO == 'I' ? 'selected' : ''); ?>>Inclusão</option>
                    <option value="A" <?php echo ($dados->C99_EVENTO == 'A' ? 'selected' : ''); ?>>Alteração</option>
                    <option value="A" <?php echo ($dados->C99_EVENTO == 'E' ? 'selected' : ''); ?>>Exclusão</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top"
                    title="C99_STATUS;"></i> Status</label>
            <div class="input-group">
                <select class="form-control form-select custom-select" name="C99_STATUS">
                    <option value="" <?php echo ($dados->C99_STATUS == '' ? 'selected' : ''); ?>>Não processado</option>
                    <option value="0" <?php echo ($dados->C99_STATUS == '0' ? 'selected' : ''); ?>>Válido</option>
                    <option value="1" <?php echo ($dados->C99_STATUS == '1' ? 'selected' : ''); ?>>Inválido</option>
                    <option value="2" <?php echo ($dados->C99_STATUS == '2' ? 'selected' : ''); ?>>Aguardando retorno
                    </option>
                    <option value="3" <?php echo ($dados->C99_STATUS == '3' ? 'selected' : ''); ?>>Inconsistente
                    </option>
                    <option value="4" <?php echo ($dados->C99_STATUS == '4' ? 'selected' : ''); ?>>Aceito RET</option>
                    <option value="6" <?php echo ($dados->C99_STATUS == '6' ? 'selected' : ''); ?>>Aguardando Exclusão
                    </option>
                    <option value="7" <?php echo ($dados->C99_STATUS == '7' ? 'selected' : ''); ?>>Excluído RET</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top"
                    title="C99_PROTUL;"></i> Protocolo</label>
            <div class="input-group">
                <input type="text" class="form-control" id="filial" value="<?php echo $dados->C99_PROTUL; ?>"
                    name="C99_PROTUL">
            </div>
        </div>

    </div>

    <div class="row mb-4">

        <div class="col-md-12">
            <label for="tipoevento" class="form-label"><i class="far fa-question-circle" data-tt="tooltip"
                    data-placement="top" title="C99_ATIVO;"></i> Ativo</label>
            <div class="input-group">
                <select class="form-control form-select custom-select" name="C99_ATIVO">
                    <option value="1" <?php echo ($dados->C99_ATIVO == '1' ? 'selected' : ''); ?>>Sim</option>
                    <option value="2" <?php echo ($dados->C99_ATIVO == '2' ? 'selected' : ''); ?>>Não</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" data-toggle="tooltip" data-placement="top"
                        title="Campo: C99_ATIVO;">?</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="R_E_C_N_O_" value="<?php echo $dados->R_E_C_N_O_ ?>">
    <div class="row mb-4">
        <div class="col-md-12">

            <a href="<?php echo base_url("lotacao-tributaria"); ?> " class="btn btn-primary">
                <i class="fas fa-angle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-success">
                <i class="far fa-paper-plane"></i> Salvar dados
            </button>

        </div>
    </div>
</form>