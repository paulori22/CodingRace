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
                <?php if ($medalhas == FALSE): ?>
                <h3>Você ainda não tem nenhuma medalha neste curso</h3>
                <?php else: ?>
                    <?php if (isset($medalhas)): ?>
                        <?php foreach ($medalhas as $row): ?>
                            <img src="<?php echo base_url().$row['Imagem'] ?>"
                                style="width:100px;height:100px;" class="w3-circle" alt="<?=  $row['Nome'] ?>" title="<?=  $row['Nome'] ?>">
                                <p><?= '<b>' . $row['Nome'] . '</b>' ?></p>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>
                </div>

                

            </div>
        </div>