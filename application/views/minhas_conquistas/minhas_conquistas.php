<body class="w3-light-grey">

<?php $this->load->view('commons/menulateral') ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <?php $this->load->view('commons/menupagina') ?>

    <div class="w3-container">

        <!-- Trofeus grid -->
        <h3>Troféus:</h3>
        <div class="w3-row-padding w3-margin-top">


            <?php if ($trofeus == FALSE): ?>
                <h3>Você ainda não tem troféus neste curso</h3>
            <?php else: ?>
                <?php if (isset($trofeus)): ?>
                    <?php foreach ($trofeus as $row): ?>
                        <div class="w3-third" style="text-align: center">
                            <img src="<?php echo base_url() . $row['Imagem'] ?>"
                                 style="width:60%"
                                 onclick="onClick(this,'<?= $row['Descricao'] ?>','<?= DateTime::createFromFormat("Y-m-d H:i:s", $row["Data_Conquista"])->format('d/m/Y H:i:s') ?>')"
                                 alt="<?= $row['Nome'] ?>" title="<?= $row['Nome'] ?>">

                            <div><b><?= $row['Nome'] ?></b></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <hr>


        <h3>Medalhas:</h3>
        <!-- Medalhas grid -->
        <div class="w3-row-padding w3-margin-top">

            <?php if ($medalhas == FALSE): ?>
                <h3>Você ainda não tem medalhas neste curso</h3>
            <?php else: ?>
                <?php if (isset($medalhas)): ?>
                    <?php foreach ($medalhas as $row): ?>
                        <div class="w3-third" style="text-align: center">
                            <img src="<?php echo base_url() . $row['Imagem'] ?>"
                                 style="width:60%"
                                 onclick="onClick(this,'<?= $row['Descricao'] ?>','<?= DateTime::createFromFormat("Y-m-d H:i:s", $row["Data_Conquista"])->format('d/m/Y H:i:s') ?>')"
                                 alt="<?= $row['Nome'] ?>" title="<?= $row['Nome'] ?>">

                            <div><?= $row['Nome'] ?></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>

    </div>


</div>


<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display = 'none'">
    <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption"></p>
        <p id="descricao_modal"></p>
        <p id="data_modal"></p>
    </div>
</div>