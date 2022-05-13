<!-- Begin Page Content -->
<div class="container-fluid p-0">

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h2><i class="fas fa-layer-group"></i> <?= $descricao; ?></h2>
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
                <a href="<?= base_url('agrupador-de-rotinas') ?>">
                    <i class="fas fa-layer-group"></i> Agrupador de rotinas
                </a>
            </li>

            <li class="breadcrumb-item active">
                <i class="fas fa-object-group"></i> Adicionar agrupador de rotinas
            </li>

        </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card mb-4">

        <div class="card-body">

            <!-- Form -->
            <form method="POST">
                <div class="row mb-4">

                    <div class="col-md-12">
                        <label for="">Agrupador de rotinas</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="agrupador" name="agrupador" value="">
                        </div>
                    </div>

                </div>

                <div class="row mb-4">
                    <div class="col-md-12">

                        <button type="submit" class="btn btn-success btn-large btn-block pt-3 pb-3 text-uppercase font-weight-bold">
                            <i class="fas fa-check"></i> Registrar informação
                        </button>

                    </div>
                </div>

            </form>

        </div>

    </div>
</div>
<!-- /.container-fluid -->