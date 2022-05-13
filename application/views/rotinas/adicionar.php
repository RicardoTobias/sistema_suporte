<!-- Begin Page Content -->
<div class="container-fluid p-0">

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h2><i class="fas fa-user-edit"></i> <?= $descricao; ?></h2>
            </div>
        </div>
    </div>

    <!-- Breadcrumb -->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent rounded-0 pt-3 border-top pb-0">

            <li class="breadcrumb-item">
                <a href="<?= base_url('/') ?>">
                    <i class="fas fa-home"></i> Início
                </a>
            </li>

            <li class="breadcrumb-item">
                <a href="<?= base_url('rotinas') ?>">
                    <i class="fas fa-object-group"></i> Rotinas
                </a>
            </li>

            <li class="breadcrumb-item active">
                <i class="fas fa-object-group"></i> Adicionar rotina
            </li>

        </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card mb-4">

        <div class="card-body">

            <!-- Form -->
            <form method="POST" class="mt-0 rounded-0">

                <div class="row mb-4">

                    <div class="col-md-12">
                        <label for="">Agrupador de rotina</label>
                        <div class="input-group">
                            <select class="form-control form-select custom-select" name="agrupador_rotina_id">
                                <?php foreach ($tabelaFK_1 as $agrupador) : ?>
                                    <option value="<?= $agrupador->id_agrupador_rotina; ?>"><?= $agrupador->agrupador; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row mb-4">

                    <div class="col-md-4">
                        <label for="">Evento</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="evento" name="evento" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="">Rotina</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="rotina" name="rotina" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="">Função</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="funcao" name="funcao" value="">
                        </div>
                    </div>



                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label for="">Caminho da Rotina</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="caminho_rotina" name="caminho_rotina" value="">
                        </div>
                    </div>

                </div>

                <div class="row">
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

        </div>

    </div>
</div>
<!-- /.container-fluid -->