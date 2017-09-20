<body class="w3-light-grey">

<?php $this->load->view('commons/menulateral') ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <?php $this->load->view('commons/menupagina') ?>

    <!-- Medalhas grid -->
    <div class="w3-row-padding w3-margin-top">
        <h5><i class="fa fa-trophy"></i> Últimas conquistas:</h5>

        <?php if ($conquista == FALSE): ?>
            <h3>Você ainda não tem conquistas</h3>
        <?php else: ?>
            <?php if (isset($conquista)): ?>
                <?php foreach ($conquista as $row): ?>
                    <div class="w3-col" style="text-align: center; width:20%">
                        <img src="<?php echo base_url() . $row['Imagem'] ?>"
                             style="width:60%"
                             onclick="onClick(this,'<?= $row['Descricao'] ?>','<?= DateTime::createFromFormat ( "Y-m-d H:i:s", $row["Data_Conquista"] )->format('d/m/Y H:i:s') ?>')"
                             title="<?= $row['Nome'] ?>">

                        <div><?= $row['Nome'] ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <!-- Estatísticas -->
    <div class="w3-row-padding w3-margin-top">
        <h5><i class="fa fa-line-chart"></i> Estatísticas Gerais:</h5>

        <table class="w3-table-all">
            <thead>
            <tr class="w3-light-grey">
                <th>Descrição</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!isset($estatistica)): ?>
                <tr>
                    <td colspan="2">Você ainda não tem estatísticas</td>
                </tr>
            <?php else: ?>
                <tr>
                    <td>Total de Exercícios realizados</td>
                    <td><?= $estatistica['exercicios_realizados'] ?></td>
                </tr>
                <tr>
                    <td>Total de Exercícios acertados</td>
                    <td><?= $estatistica['exercicios_acertados'] ?></td>
                </tr>
                <tr>
                    <td>Total de Exercícios acertados de primeira</td>
                    <td><?= $estatistica['exercicios_acertados_primeira']?></td>
                </tr>
                <tr>
                    <td>Total de Exercícios errados</td>
                    <td><?= $estatistica['exercicios_errados'] ?></td>
                </tr>
                <tr>
                    <td>Total de Pontos</td>
                    <td><?= $estatistica['pontos']?></td>
                </tr>
                <tr>
                    <td>Total de Troféus</td>
                    <td><?= $estatistica['trofeus']?></td>
                </tr>
                <tr>
                    <td>Total de Medalhas</td>
                    <td><?= $estatistica['medalhas']?></td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>


        <!-- Modal for full size images on click-->
        <div id="modal01" class="w3-modal" style="padding-top:0" onclick="this.style.display = 'none'">
            <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
            <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
                <img id="img01" class="w3-image">
                <p id="caption"></p>
                <p id="descricao_modal"></p>
                <p id="data_modal"></p>
            </div>
        </div>