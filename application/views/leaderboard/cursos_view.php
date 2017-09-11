    <body class="w3-light-grey">

        <?php $this->load->view('commons/menulateral')?>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

            <?php $this->load->view('commons/menupagina')?>

            <div class="w3-container ">

                <?php if ($this->router->fetch_class() == 'Aluno' || $this->router->fetch_class() == 'Professor'): ?>
                    <div class="w3-container w3-left">
                        <?php if ($this->session->flashdata('error') == TRUE): ?>
                            <p><?php echo $this->session->flashdata('error'); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php echo validation_errors();?>
                    
                <?php endif; ?>

                <table class="w3-table-all">
                    <thead>
                        <tr class="w3-light-grey">
                            <th>Nome</th>
                            <th>PIN</th>
                            <th>Ano</th>
                            <th>Período</th>
                            <th>Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($cursos == FALSE): ?>
                            <tr><td colspan="2">Você não está fazendo nenhum curso</td></tr>
                        <?php else: ?>
                            <?php if (isset($cursos)): ?>
                                <?php foreach ($cursos as $row): ?>
                                    <tr>
                                        <td><?=$row['Nome']?></td>
                                        <td><?=$row['PIN']?></td>
                                        <td><?=$row['Ano']?></td>
                                        <td><?=$row['Periodo']?></td>
                                        <td><a href="<?=base_url('leaderboard_curso')."/".$row['PIN']?>" style="text-decoration: none"><i class="w3-xlarge fa fa-eye">&nbsp;</i></a></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif; ?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>