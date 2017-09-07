<body class="w3-light-grey">

    <?php $this->load->view('commons/menulateral') ?>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <?php $this->load->view('commons/menupagina') ?>

        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-quarter">
                <h3>Troféus:</h3>
                <div class="w3-right">
                </div>
                <div class="w3-clear"></div>
                <img src=""
                     style="width:100px;height:100px;" class="w3-circle" alt="1a Medalha" title="Bem-vindo">
            </div>
        </div>

        <hr>

        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-quarter">
                <h3>Medalhas:</h3>
                <div class="w3-row">
                <img src="<?php echo $medalha['Imagem']?>"
                     style="width:100px;height:100px;" class="w3-circle" alt="1a Medalha" title="Bem-vindo">
                <p><?php echo '<b>'.$medalha['Nome'].'</b>'?></p>
                </div>
                
            </div>
        </div>