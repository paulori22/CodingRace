<body class="w3-light-grey">

    <?php $this->load->view('commons/menulateral') ?>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <?php $this->load->view('exercicio/header_exercicio') ?>

        <div class="w3-container w3-content">
            <div class="w3-container w3-left">
                <?php if ($this->session->flashdata('error') == TRUE): ?>
                    <p><?php echo $this->session->flashdata('error'); ?></p>
                <?php endif; ?>
            </div>
            <?php echo validation_errors(); ?>

            </div>

            <form class="w3-container w3-light-grey w3-text-black w3-margin" method="post" enctype="multipart/form-data" action="<?= base_url('confereexercicio_aluno') . "/" . $exercicio['idExercicio']; ?>">


                <div class="w3-panel w3-border w3-round-xlarge">
                    <?php echo $exercicio['Pergunta']; ?>
                </div>


                <div class="w3-row w3-section">   

                        
                    <div class="w3-panel w3-round-jumbo">
                        <input class="w3-radio" type="radio" name="opcao" id="opcao" value="A"/>
                        <label class="w3-validate">a) <?php echo $alternativas['itemA']; ?></label>
                    </div>

                    <div class="w3-panel w3-round-jumbo">
                        <input class="w3-radio" type="radio" name="opcao" id="opcao" value="B"/>
                        <label class="w3-validate">b) <?php echo $alternativas['itemB']; ?></label>
                    </div>

                    <div class="w3-panel w3-round-jumbo">
                        <input class="w3-radio" type="radio" name="opcao" id="opcao" value="C"/>
                        <label class="w3-validate">c) <?php echo $alternativas['itemC']; ?></label>
                    </div>
                    <div class="w3-panel w3-round-jumbo">
                        <input class="w3-radio" type="radio" name="opcao" id="opcao" value="D"/>
                        <label class="w3-validate">d) <?php echo $alternativas['itemD']; ?></label>
                    </div>

                    <div class="w3-panel w3-round-jumbo">
                        <input class="w3-radio" type="radio" name="opcao" id="opcao" value="E"/>
                        <label class="w3-validate">e) <?php echo $alternativas['itemE']; ?></label>
                    </div>

                </div>

                <p class="w3-center">

                    <button class="w3-round-large w3-bar-item w3-btn w3-light-grey" style="font-size:32px;" onclick="document.getElementById('id01').style.display = 'block'">
                        <i class="fa fa-check-square-o w3-round-large"	style="font-size:32px;color:green">
                        </i>
                        <h5>Confirmar</h5>
                    </button>
                    
                    <button class="w3-round-large w3-bar-item w3-btn w3-light-grey" style="font-size:32px;" type="submit" value="salvar">
                        <i class="fa fa-fast-forward" style="font-size:32px"></i>
                        <h5>Pular</h5>
                    </button>
                    <button class="w3-round-large w3-bar-item w3-btn w3-light-grey" style="font-size:32px;">
                        <i class="fa fa-info-circle"	style="font-size:32px"></i>
                        <h5>Ajuda?</h5>
                    </button>
                    <button class="w3-bar-item w3-btn w3-light-grey" style="font-size:32px;" onclick="location.href = '<?php echo base_url('realizartopico_aluno') . "/" . $exercicio['Topico_idTopico']; ?>'" type="button">
                        <i class="fa fa-ban w3-btn	w3-round-large" style="font-size:32px;"></i>
                        <h5>Cancelar</h5>
                    </button>

                </p>
            </form>

        </div>
