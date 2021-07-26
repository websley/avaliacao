<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted">Avaliação 2021.</span>
  </div>
</footer>


  </body>
</html>
<script>
   $(document).ready( function () {
    $('#datatable').DataTable();
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('#cep').mask('00000-000');


    $( "#cpf_tab" ).click(function() {
      $('#nome_cliente').prop("required", true);
      $('#cpf').prop("required", true);
      $('#razao').removeAttr("required");
      $('#cnpj').removeAttr("required");
    });
    
    $( "#cnpj_tab" ).click(function() {
      $('#nome_cliente').removeAttr("required");
      $('#cpf').removeAttr("required");
      $('#razao').prop("required", true);
      $('#cnpj').prop("required", true);
    });

  } );
      
  
</script>