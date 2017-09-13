<!-- Animated Modal-->
<div id="modal_conquista" class="w3-modal" style="display: block">
    <div class="w3-modal-content w3-animate-top w3-card-8">
        <header class="w3-container w3-green w3-center">
        <span onclick="document.getElementById('modal_conquista').style.display='none'"
              class="w3-closebtn">&times;</span>
            <h2> Ganhou uma conquista!</h2>
        </header>
        <div class="w3-container w3-center w3-light-gray" style="text-align: center">

                <img src="<?php echo base_url() . $conquista['Imagem'] ?>"
                     style="width:50%"  alt="<?= $conquista['Nome'] ?>" title="<?= $conquista['Nome'] ?>">
            <h3><?= $conquista['Nome'] ?></h3>
            <h4><?= $conquista['Descricao']?></h4>
        </div>

        <footer class="w3-container w3-green">
            <p>Para mais informações sobre a conquista acesse Minhas Conquistas</p>
        </footer>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('modal_conquista');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>