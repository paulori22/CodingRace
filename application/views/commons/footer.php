            <!-- Footer -->
            <footer class="w3-container w3-padding-16 w3-light-grey">
                <h4>CodingRace</h4>
                <p>Desenvolvido por <a href="https://www.linkedin.com/in/paulo-ricardo-boneti-pinto-de-andrade-47827514a/" target="_blank">Paulo</a> e <a href="https://www.linkedin.com/in/jo%C3%A3o-gabriel-silveira-avila-678292138/" target="_blank">João</a></p>
            </footer>

        <!-- End page content -->
        </div>

        <script>

            $(document).ready(function(){
                $('#usuarios_table').DataTable({
                    responsive: true,

                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"
                        }
                    
                    }

                );

            });
            // Get the Sidenav
            var mySidenav = document.getElementById("mySidenav");

            // Get the DIV with overlay effect
            var overlayBg = document.getElementById("myOverlay");


            // Toggle between showing and hiding the sidenav, and add overlay effect
            function w3_open() {
                if (mySidenav.style.display === 'block') {
                    mySidenav.style.display = 'none';
                    overlayBg.style.display = "none";
                } else {
                    mySidenav.style.display = 'block';
                    overlayBg.style.display = "block";
                }
            }

            // Close the sidenav with the close button
            function w3_close() {
                mySidenav.style.display = "none";
                overlayBg.style.display = "none";
            }

            function ValidaForm() {
                email = formsalvar.email;
                confirmar_email = formsalvar.confirmar_email;
                compara = email.localeCompare(confirmar_email)
                if(compara == -1){
                    alert("Email deve ser igual");
                    return false
                }
                formsalvar.submit();
            }

            function PegaDados() {
                document.getElementById('editar').style.display='block'
            }

            function deletar(){
                return confirm('Você tem certeza que deletar?');
            }

            function sair() {
                return confirm('Você tem certeza que deseja sair do CodingRace?');
            }

            // Modal Image Gallery
            function onClick(element,descricao,data_conquista) {
              document.getElementById("img01").src = element.src;
              document.getElementById("modal01").style.display = "block";

              var captionText = document.getElementById("caption");
              var desc = document.getElementById("descricao_modal");
              var data = document.getElementById("data_modal");

              captionText.innerHTML = "Nome: " + element.alt;
              desc.innerHTML = "Descrição: " + descricao;
              data.innerHTML = "Data da conquista: " + data_conquista;
            }

        </script>
    </body>
</html>