<div class="row justify-content-center">

  <div class="col-md-6">

    <div class="card">

      <div class="card-header">
        <h1 class="h4 text-center">Sistema suporte TOTVS</h1>
      </div><!-- .card-header -->

      <div class="card-body">

        <div id="infoMessage"><?= $message; ?></div><!-- .infoMessage -->

        <p class="text-center">Entre com seu e-mail e senha para acesso ao sistema.</p><hr>

        <?= form_open("auth/login", 'class="user"'); ?>

        <div class="form-group">
          <?= form_input($identity); ?>
        </div><!-- .form-group -->

        <div class="form-group">
          <?= form_input($password); ?>
        </div><!-- .form-group -->

        <p><?= form_submit('submit', "Acessar sistema", 'class="btn btn-primary btn-user btn-block btn-lg"'); ?></p>

        <?= form_close(); ?>

      </div><!-- .card-body -->
    </div><!-- .card -->

  </div><!-- .col-md-6 -->

</div><!-- .row .justify-content-center -->