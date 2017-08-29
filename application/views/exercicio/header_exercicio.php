<!-- Header -->
<header class="w3-container" style="padding-top:22px">
    <h3><b><i class="fa fa-file-code-o"></i>&nbsp;<?php echo $topico['Nome']; ?></b></h3>

    <div class="w3-bar w3-light-grey w3-center">
        <?php if (isset($exercicios)): ?>
            <?php foreach ($exercicios as $row): ?>
                <?php if ($exercicio['idExercicio'] == $row['idExercicio']) { ?>
                    <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle_atual w3-gray" ><?php echo $row['n'] ?></span></a>&nbsp;
                <?php } else { ?>

                    <a href="<?= base_url("realizaexercicio_aluno") . "/" . $row['idExercicio'] ?>"><span class="circle w3-gray"><?php echo $row['n'] ?></span></a>&nbsp;
                    <?php } ?>
                <?php endforeach; ?>
            <?php endif; ?>

    </div>

</header>

