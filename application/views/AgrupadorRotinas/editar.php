<div class="container-fluid p-0">

    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12 mt-3">

                <h2>
                    <i class="fas fa-layer-group"></i> <?= $titulo; ?>

                    <span class="float-right">
                        <a href="<?= base_url($url); ?>" class="btn btn-primary">
                            <i class="fas fa-angle-left"></i> Voltar</a>
                    </span>
                </h2>

            </div><!-- col-md-12 mt-3 -->
        </div><!-- row -->
    </div><!-- container mb-3 -->

    <div class="card mb-4 rounded-0">

        <div class="card-body">

            <!-- Breadcrumb -->
            <nav>

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
                        <i class="fas fa-edit"></i> Editar <?= $titulo; ?>
                    </li>

                </ol>
            </nav>

            <!-- Form -->
            <form method="POST">
                <div class="row mb-4">

                    <div class="col-md-12">
                        <label for=""><strong>Agrupador de rotinas</strong></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="agrupador" name="agrupador" value="<?= $dados->agrupador; ?>">
                        </div>
                    </div>

                </div>

                <input type="hidden" name="R_E_C_N_O_" value="<?= $dados->id_agrupador_rotina; ?>">

                <div class="row mb-4">
                    <div class="col-md-12">

                        <button type="submit" class="btn btn-success btn-large btn-block pt-3 pb-3 text-uppercase font-weight-bold">
                            <i class="fas fa-check"></i> Alterar informações
                        </button>

                    </div>
                </div>

            </form>

        </div><!-- /.card-body -->

    </div><!-- /.card mb-4 -->
</div><!-- /.container-fluid -->