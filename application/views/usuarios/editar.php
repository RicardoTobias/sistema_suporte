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
                <a href="<?= base_url('usuarios') ?>">
                    <i class="fas fa-users"></i> Usuários
                </a>
            </li>

            <li class="breadcrumb-item active">
                <i class="fas fa-user-edit"></i> Editar <?= $dados->username; ?>
            </li>

        </ol>
    </nav>

    <!-- DataTales Example -->
    <div class="card mb-4 rounded-0">



        <div class="card-body">

            <!-- Form -->
            <form method="POST" class="mt-0 rounded-0">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="">Nome</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $dados->first_name; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="">
                            Sobrenome</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $dados->last_name; ?>">
                        </div>
                    </div>

                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="">Empresa</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="company" name="company" value="<?= $dados->company; ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="">
                            Telefone</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="phone" name="phone" value="<?= $dados->phone; ?>">
                        </div>
                    </div>

                </div>

                <div class="row mb-4">

                    <div class="col-md-12">
                        <label for="">Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $dados->email; ?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">

                    <div class="col-md-12">
                        <label for="">Usuário</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="username" name="username" value="<?= $dados->username; ?>">
                        </div>
                    </div>
                </div>

                <div class="nested_boxes pt-0">
                    <div class="form-row">
                        <div class="row p-0 col-md-12">

                            <div class="row col-md-12 border-bottom mb-3 pb-1">
                                <h5>Perfil de acesso</h5>
                            </div>
                            <?php if (isset($groups)) : ?>

                                <?php foreach ($groups as $grupo) : ?>
                                    <div class="form-group">
                                        <div class="nested_check_in ">

                                            <?= form_checkbox(
                                                'groups[]',
                                                $grupo->id,
                                                set_checkbox('groups[]', $grupo->id, in_array($grupo->id, $usergroups)),
                                                array('class' => 'badgebox')
                                            );
                                            ?>

                                            <label class="nested_label">
                                                <?= ' ' . $grupo->name; ?>
                                            </label>

                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <?php echo form_hidden('user_id', $dados->id); ?>

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