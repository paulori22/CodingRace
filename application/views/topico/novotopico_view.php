<body class="w3-light-grey">

<?php $this->load->view('commons/menulateral')?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <?php $this->load->view('commons/menupagina')?>

    <div class="w3-container w3-content w3-center">
        <div class="w3-container w3-left">
            <?php if ($this->session->flashdata('error') == TRUE): ?>
                <p><?php echo $this->session->flashdata('error'); ?></p>
            <?php endif; ?>
        </div>
        <?php echo validation_errors();?>
        <form class="w3-container w3-light-grey w3-text-black w3-margin" method="post" enctype="multipart/form-data">
            <h2 class="w3-center">Novo Tópico</h2>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-book"></i></div>
                <div class="w3-rest">
                    <input class="w3-input w3-border" name="nome" id="nome" type="text" placeholder="Nome do Tópico" >
                </div>
            </div>

            <p class="w3-center">
                <button class="w3-btn w3-section w3-black w3-ripple" type="submit" value="salvar"> Salvar </button>
                <?php if ($this->router->fetch_class() == 'Admin'): ?>
                    <button onclick="location.href='<?php echo base_url('topicos_admin');?>'" type="button" class="w3-btn w3-section w3-black w3-ripple"> Cancelar </button>
                <?php elseif ($this->router->fetch_class() == 'Professor'): ?>
                    <button onclick="location.href='<?php echo base_url('topicos_professor');?>'" type="button" class="w3-btn w3-section w3-black w3-ripple"> Cancelar </button>
                <?php endif; ?>
            </p>
        </form>

    </div>