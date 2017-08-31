<body class="w3-light-grey">

    <?php $this->load->view('commons/menulateral') ?>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <?php $this->load->view('commons/menupagina') ?>

        <div class="w3-container">
            

            <table class="w3-table-all">
                <h2 class="w3-left">Tópicos</h2>
                <thead>
                    <tr class="w3-light-grey">
                        <th>Nome</th>
                        <th>Exercícios</th>
                        <th>Concluído</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($topicos == FALSE): ?>
                        <tr><td colspan="2">Nenhum tópico cadastrado</td></tr>
                    <?php else: ?>
                        <?php while (list($nome, $topico) = each($exercicios_topicos)) { ?>
                            <tr>
                                <td><?= $nome ?></td>

                                <td>
                                <?php $n = 1; ?>
                                <?php foreach ($topico as $row): ?>

                                <?php if ($row['Resposta_Correta'] == 1) { ?>
                                    <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle w3-green" ><?php echo $n ?></span></a>&nbsp;

                                <?php } else { ?>
                                    <?php if ($row['Tentativas'] == 0) { ?>
                                        <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle w3-gray" ><?php echo $n ?></span></a>&nbsp;

                                    <?php } elseif ($row['Tentativas'] > 0 && $row['Tentativas'] < 3) { ?>
                                        <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle w3-yellow" ><?php echo $n ?></span></a>&nbsp;

                                    <?php } else { ?>
                                        <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle w3-red" ><?php echo $n ?></span></a>&nbsp;

                                    <?php } ?>

                                <?php } ?>

                            <?php $n++; ?>
                        <?php endforeach; ?>

                        </td>

                        <td></td>
                        </tr>
                        <?php } ?>
                <?php endif; ?>
                </tbody>
            </table>
