<form method="POST">
    <div class="row mb-4">

        
        <div class="col-md-6">
            <label for="">
                <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="Menu;"></i>
                Menu</label>
            <div class="input-group">
                <input type="text" class="form-control" id="Menu" name="Menu" value="<?= $dados->Menu; ?>">
            </div>
        </div>

        <div class="col-md-6">
            <label for="">
                <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="Link;"></i>
                Link</label>
            <div class="input-group">
                <input type="text" class="form-control" id="Link" name="Link" value="<?= $dados->Link; ?>">
            </div>
        </div>

    </div>

    <div class="row mb-4">

        <div class="col-md-6">
            <label for="">
                <i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="Link;"></i>
                Categoria</label>
            <div class="input-group">
                <select class="form-control form-select custom-select" name="MenuCategoriaID">
                    <?php foreach ($tabelaFK_1 as $categoria) : ?>
                        <option value="<?= $categoria->ID_Categoria; ?>" <?php echo ($categoria->ID_Categoria == $dados->MenuCategoriaID) ? 'selected' : '' ?>><?= $categoria->MenuCategoria; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <label for="tipoevento" class="form-label"><i class="far fa-question-circle" data-tt="tooltip" data-placement="top" title="Ativo;"></i> Ativo</label>
            <div class="input-group">
                <select class="form-control form-select custom-select" name="Ativo">
                    <option value="1" <?= ($dados->Ativo == '1') ? 'selected' : ''; ?>>Sim</option>
                    <option value="2" <?= ($dados->Ativo == '2') ? 'selected' : ''; ?>>Não</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">

            <a href="" class="btn btn-primary">
                <i class="fas fa-angle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-success">
                <i class="far fa-paper-plane"></i> Salvar dados
            </button>

        </div>
    </div>
</form>