<body class="w3-light-grey">

<?php $this->load->view('commons/menulateral')?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <?php $this->load->view('commons/menupagina')?>

    <!-- Medalhas grid -->
    <div class="w3-row-padding w3-margin-top">
        <h3>Últimas conquistas:</h3>

        <?php if ($conquista == FALSE): ?>
            <h3>Você ainda não tem conquistas</h3>
        <?php else: ?>
            <?php if (isset($conquista)): ?>
                <?php foreach ($conquista as $row): ?>
                    <div class="w3-col" style="text-align: center; width:20%">
                        <img src="<?php echo base_url() . $row['Imagem'] ?>"
                             style="width:60%" alt="<?= $row['Nome'] ?>" title="<?= $row['Nome'] ?>">

                        <div><?= $row['Nome'] ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
