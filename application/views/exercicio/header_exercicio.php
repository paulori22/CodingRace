<!-- Header -->
<header class="w3-container" style="padding-top:22px">
    <h3><b><i class="fa fa-file-code-o"></i>&nbsp;<?php echo $topico['Nome']; ?></b></h3>
    <div class="w3-bar w3-light-grey w3-center">
        <?php if (isset($exercicios)): ?>
        <?php $n = 1;?>
            <?php foreach ($exercicios as $row): ?>

                <?php if ($exercicio['idExercicio'] == $row['idExercicio']) { ?>

                    <?php if ($row['Resposta_Correta'] == 1) { ?>
                        <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle_atual w3-green" ><?php echo $n ?></span></a>&nbsp;
                        <?php $status['green'] = 1;?>
                    <?php } else { ?>
                        <?php if ($row['Tentativas'] == 0) { ?>
                            <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle_atual w3-gray" ><?php echo $n ?></span></a>&nbsp;

                        <?php } elseif ($row['Tentativas'] > 0 && $row['Tentativas'] < 3) { ?>
                            <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle_atual w3-yellow" ><?php echo $n ?></span></a>&nbsp;

                        <?php } else { ?>
                            <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle_atual w3-red" ><?php echo $n ?></span></a>&nbsp;
                            <?php $status['red'] = 1;?>
                        <?php } ?>

                    <?php } ?>

                <?php } else { ?>

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

                <?php } ?>
                            <?php $n++;?>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>

</header>

