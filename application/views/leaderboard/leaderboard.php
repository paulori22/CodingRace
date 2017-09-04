<body class="w3-light-grey">

    <?php $this->load->view('commons/menulateral') ?>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;margin-top:43px;">

        <?php $this->load->view('commons/menupagina') ?>

        <div class="w3-container">
            <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
                <h3>Ranking geral:</h3>
                <thead>
                    <tr class="w3-light-grey">
                        <th>Posição</th>
                        <th>Nome</th>
                        <th>Progresso Total</th>
                        <th>Troféus</th>
                        <th>Medalhas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($alunos_curso == FALSE): ?>
                        <tr><td colspan="2">Nenhum aluno registrado no curso</td></tr>
                    <?php else: ?>
                        <?php if (isset($alunos_curso)): ?>
                            <?php foreach ($alunos_curso as $row): ?>
                                <tr>
                                    <td><?= $row['Usuario_RA'] ?></td>
                                    <td><?= $row['Pontuacao'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            
        </div>