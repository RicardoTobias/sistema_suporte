    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Breadcrumb -->
        <?php $this->load->view('template/_parts/_breadcrumb'); ?>

        <!-- Alerts -->
        <?php $this->load->view('template/_parts/_alerts'); ?>

        <!-- DataTales Example -->
        <div class="card rounded-0 border-left-0 border-right-0 border-bottom-0">

            <!-- card-header -->
            <?php $this->load->view('template/_parts/_cardHeader'); ?>

            <div class="card-body">
                <div class="table-responsive">
                    <?php $this->load->view('menu/_parts/_table'); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- FILTRO -->
    <?php $this->load->view('admissaoPreliminar/_parts/_filter'); ?>