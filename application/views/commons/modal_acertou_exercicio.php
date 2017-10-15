<!-- Animated Modal-->
<div id="modal_acertou_exercicio" class="w3-modal" style="display: block">
    <div class="w3-modal-content w3-animate-top w3-card-8">
        <header class="w3-container w3-green w3-center">
        <span onclick="document.getElementById('modal_acertou_exercicio').style.display='none'"
              class="w3-closebtn">&times;</span>
            <h2> Acertou o exercício!</h2>
        </header>
        <div class="w3-container w3-center">
            <h3>Ganhou <b><?= $pontos ?></b> pontos!</h3>
            <h3>Ganhou <b><?= $xp ?></b> de experiência!</h3>
        </div>
        <!--      <footer class="w3-container w3-green">
                <p>Quanto mais você acertar seguidas, mais pontos ganhará!</p>
              </footer> -->
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('modal_acertou_exercicio');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>