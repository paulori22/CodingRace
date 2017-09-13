<?php $chances = 3 - $tentativas;

    if($chances == 0 ){
        $header_color =  "w3-red";
        $texto = "Você não tem mais tentativas, o próximo você acerta ;)";
    }

    else {
        $header_color =  "w3-yellow";
        $texto = "Não desista, você tem mais ".$chances." tentativas.";
    }
?>

<!-- Animated Modal-->
<div id="modal_errou_exercicio" class="w3-modal" style="display: block">
    <div class="w3-modal-content w3-animate-top w3-card-8">

        <header class="w3-container <?= $header_color ?> w3-center">
        <span onclick="document.getElementById('modal_errou_exercicio').style.display='none'"
              class="w3-closebtn">&times;</span>
            <h2> Infelizmente você errou</h2>
        </header>

        <div class="w3-container w3-center">
            <h3> <?= $texto ?></h3>
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('modal_errou_exercicio');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>