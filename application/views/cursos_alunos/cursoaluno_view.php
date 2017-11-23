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
                    </tr>
                </thead>
                <tbody>
                    <?php if ($topicos == FALSE): ?>
                        <tr><td colspan="2">Nenhum tópico cadastrado</td></tr>
                    <?php else: ?>
                        <?php foreach ($exercicios_topicos as $nome => $topico) { ?>
                            <tr>
                                <td><?= $nome ?></td>

                                <td>
                                <?php $n = 1; ?>
                                <?php foreach ($topico as $row): ?>

                                <?php if ($row['Resposta_Correta'] == 1) { ?>

                                    <?php if ($row['Tentativas'] == 1) { ?>
                                            <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle w3-light-green" ><?php echo $n ?></span></a>

                                    <?php } else { ?>
                                            <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle w3-green" ><?php echo $n ?></span></a>&nbsp;
                                    <?php } ?>


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
                        </tr>
                        <?php } ?>
                <?php endif; ?>
                </tbody>
            </table>

            <div class="w3-container">
                Legenda:
                <table class="table-legenda">
                    <tbody>
                    <tr>
                        <td><span class="circle w3-light-green"></span></td>
                        <td>Acertou de 1ª o exercício</td>
                    </tr>
                    <tr>
                        <td><span class="circle w3-green"></span></td>
                        <td>Acertou o exercício</td>
                    </tr>
                    <tr>
                        <td><span class="circle w3-yellow"></span></td>
                        <td>Exercícios ainda com tentativas</td>
                    </tr>
                    <tr>
                        <td><span class="circle w3-red" ></span></td>
                        <td>Errou o exercício</td>
                    </tr>
                    <tr>
                        <td><span class="circle w3-gray" ></span></td>
                        <td>Ainda não realizou o exercício</td>
                    </tr>
                    </tbody>
                </table>

            </div>
