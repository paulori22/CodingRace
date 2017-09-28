<body class="w3-light-grey">

    <?php $this->load->view('commons/menulateral') ?>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <?php $this->load->view('commons/menupagina') ?>

        <h5><i class="fa fa-line-chart"></i> Estatísticas Gerais do curso:</h5>

        <h6><i class="fa fa-pie-chart"></i> Total de erros por Categoria de Bloom</h6>
        <!-- Tabela dos erros por categoria de Bloom-->
        <table class="w3-table-all">
            <thead>
            <tr class="w3-light-grey">
                <th>Categoria de Bloom</th>
                <th>Nº de erros</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!isset($tabela_erros_por_bloom)): ?>
                <tr>
                    <td colspan="2">Você ainda não tem estatísticas</td>
                </tr>
            <?php else: ?>
                <tr>
                    <td>Lembrar</td>
                    <td><?= $tabela_erros_por_bloom[1] ?></td>
                </tr>
                <tr>
                    <td>Entender</td>
                    <td><?= $tabela_erros_por_bloom[2] ?></td>
                </tr>
                <tr>
                    <td>Aplicar</td>
                    <td><?= $tabela_erros_por_bloom[3]?></td>
                </tr>
                <tr>
                    <td>Analisar</td>
                    <td><?= $tabela_erros_por_bloom[4] ?></td>
                </tr>
                <tr>
                    <td>Avaliar</td>
                    <td><?= $tabela_erros_por_bloom[5]?></td>
                </tr>
                <tr>
                    <td>Criar</td>
                    <td><?= $tabela_erros_por_bloom[6]?></td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>

        <h6><i class="fa fa-pie-chart"></i> Total de erros por Tópico</h6>
        <!-- Tabela dos erros por Topico-->
        <table class="w3-table-all">
            <thead>
            <tr class="w3-light-grey">
                <th>Tópico</th>
                <th>Nº de erros</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!isset($tabela_erros_por_topico)): ?>
                <tr>
                    <td colspan="2">Você ainda não tem estatísticas</td>
                </tr>
            <?php else: ?>
                <?php foreach ($tabela_erros_por_topico as $topicoNome => $erros): ?>
                <tr>
                    <td><?= $topicoNome ?></td>
                    <td> <?= $erros ?></td>
                </tr>
                <?php endforeach;?>
            <?php endif; ?>

            </tbody>
        </table>

        <h5><i class="fa fa-line-chart"></i> Estatísticas Gerais dos alunos:</h5>
        <table class="w3-table-all">
            <thead>
            <tr class="w3-light-grey">
                <th>Aluno</th>

                <?php foreach ($tabela_erros_por_topico as $topicoNome => $erros): ?>
                    <th><?= $topicoNome ?></th>

            <?php endforeach;?>

            </tr>
            </thead>
            <tbody>
            <?php if (!isset($tabela_exercicios_por_aluno)): ?>
                <tr>
                    <td colspan="2">Você ainda não tem estatísticas</td>
                </tr>
            <?php else: ?>
                <?php foreach ($tabela_exercicios_por_aluno as $nomeAluno => $topicos): ?>
                    <tr>
                        <td><?= $nomeAluno ?></td>

                        <?php foreach ($topicos as $topico): ?>
                        <td>
                            <?php $n = 1; ?>
                            <?php foreach ($topico as $row): ?>

                                <?php if ($row['Resposta_Correta'] == 1) { ?>
                                    <span class="circle w3-green" ><?php echo $n ?></span>

                                <?php } else { ?>
                                    <?php if ($row['Tentativas'] == 0) { ?>
                                        <span class="circle w3-gray" ><?php echo $n ?></span>

                                    <?php } elseif ($row['Tentativas'] > 0 && $row['Tentativas'] < 3) { ?>
                                        <span class="circle w3-yellow" ><?php echo $n ?></span>

                                    <?php } else { ?>
                                        <span class="circle w3-red" ><?php echo $n ?></span>

                                    <?php } ?>

                                <?php } ?>

                                <?php $n++; ?>
                            <?php endforeach; ?>

                        </td>
                        <?php endforeach; ?>


                    </tr>
                <?php endforeach;?>
            <?php endif; ?>

            </tbody>
        </table>




    </div>