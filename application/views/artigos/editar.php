<!-- Begin Page Content -->
<div class="container-fluid p-0">

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h2><i class="fas fa-layer-group"></i> <?= $titulo; ?>
                    <span class="float-right">
                        <a href="<?= base_url($url); ?>" class="btn btn-primary">
                        <i class="fas fa-angle-left"></i> Voltar</a>
                    </span>
                </h2>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card mb-4">

        <div class="card-body">

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
                            <i class="far fa-layer-group"></i> <?= $titulo; ?>
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        <i class="fas fa-edit"></i> Editar <?= $titulo; ?>
                    </li>

                </ol>
            </nav>

            <!-- Form -->
            <form method="POST" class="mt-0 rounded-0">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="">Rotina</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="rotina" name="rotina" value="<?= $dados->rotina; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="">Evento</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="evento" name="evento" value="<?= $dados->evento; ?>">
                        </div>
                    </div>

                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="">Caminho da Rotina</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="caminho_rotina" name="caminho_rotina" value="<?= $dados->caminho_rotina; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="">Categoria</label>
                        <div class="input-group">
                            <select class="form-control form-select custom-select" name="agrupador_rotina_id">
                                <?php foreach ($tabelaFK_1 as $agrupador) : ?>
                                    <option value="<?= $agrupador->id_agrupador_rotina; ?>" <?php echo ($agrupador->id_agrupador_rotina == $dados->agrupador_rotina_id) ? 'selected' : '' ?>><?= $agrupador->agrupador; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

                <?= form_hidden('id_rotina', $dados->id_rotina); ?>

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