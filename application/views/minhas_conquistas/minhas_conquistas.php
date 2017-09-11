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


        <!-- Photo grid -->
        <div class="w3-row-padding w3-margin-top">
            <h3>Medalhas:</h3>

                <?php if ($medalhas == FALSE): ?>
                    <h3>Você ainda não tem medalhas neste curso</h3>
                <?php else: ?>
                    <?php if (isset($medalhas)): ?>
                        <?php foreach ($medalhas as $row): ?>
                            <div class="w3-third">
                                <img src="<?php echo base_url() . $row['Imagem'] ?>"
                                     style="width:100%" onclick="onClick(this)" alt="<?= $row['Nome'] ?>" title="<?= $row['Nome'] ?>">
                            
                                <div class="w3-center"><b><?= $row['Nome'] ?></b></div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>
        </div>



    </div>



    <!-- Modal for full size images on click-->
    <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display = 'none'">
        <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
        <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
            <img id="img01" class="w3-image">
            <p id="caption"></p>
        </div>
    </div>