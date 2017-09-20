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

                <?php foreach ($exercicios as $row) { ?>

                    <?php if ($exercicio['idExercicio'] == $row['idExercicio']) { ?>

                        <?php if ($row['Resposta_Correta'] == 1) { ?>

                            <?php $status['green'] = true; ?>
                        <?php } else { ?>
                            <?php if ($row['Tentativas'] == 3) { ?>
                                <?php $status['red'] = true; ?>
                            <?php } ?>

                        <?php } ?>
                    <?php } ?>
                <?php } ?>

                <?php
                if ($status['green']) {
                    echo '<div class="w3-panel w3-border w3-round-xlarge"><h5 class="w3-center">Parabéns você acertou a questão, continue assim!</h5></div>';
                } elseif ($status['red']) {
                    echo '<div class="w3-panel w3-border w3-round-xlarge"><h5 class="w3-center">Infelizmente você não acertou a questão, mas continue você consegue!</h5></div>';
                } else {
                    ?>
                    <button class="w3-round-large w3-bar-item w3-btn w3-light-grey" style="font-size:32px;">
                        <i class="fa fa-check-square-o w3-round-large"	style="font-size:32px;color:green">
                        </i>
                        <h5>Confirmar</h5>
                    </button>

                    <button class="w3-round-large w3-bar-item w3-btn w3-light-grey" style="font-size:32px;">
                        <i class="fa fa-info-circle"	style="font-size:32px"></i>
                        <h5>Ajuda?</h5>
                    </button>
                    <button class="w3-bar-item w3-btn w3-light-grey" style="font-size:32px;" onclick="location.href = '<?php echo base_url('realizacurso_aluno') . "/" . $this->session->userdata['Curso_PIN']; ?>'" type="button">
                        <i class="fa fa-ban w3-btn	w3-round-large" style="font-size:32px;"></i>
                        <h5>Cancelar</h5>
                    </button>
<?php } ?>
            </p>
        </form>

    </div>
    
<!-- Animated Modal-->
  <div id="modal_acertou_exercicio" class="w3-modal" >
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container w3-green w3-center">
        <span onclick="document.getElementById('modal_acertou_exercicio').style.display='none'"
        class="w3-closebtn">&times;</span>
        <h2> Acertou o exercício! </h2>
      </header>
      <div class="w3-container w3-center">
        <h3>Ganhou <b>16</b> pontos!</h3>
      </div>
<!--      <footer class="w3-container w3-green">
        <p>Quanto mais você acertar seguidas, mais pontos ganhará!</p>
      </footer> -->
    </div>
  </div>