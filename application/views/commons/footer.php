            <!-- Footer -->
            <footer class="w3-container w3-padding-16 w3-light-grey">
                <h4>CodingRace</h4>
                <p>Desenvolvido por <a href="#">Paulo e João</a></p>
            </footer>

        <!-- End page content -->
        </div>

        <script>
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
                return confirm('Tem certeza?');
            }
            // Modal Image Gallery
            function onClick(element) {
              document.getElementById("img01").src = element.src;
              document.getElementById("modal01").style.display = "block";
              var captionText = document.getElementById("caption");
              captionText.innerHTML = "Nome: " + element.alt;
            }
        </script>
    </body>
</html>