
<?php 


include 'conection.php';

$query = $conn->query("SELECT * FROM cidade;");
$cidades = $query->fetchAll(PDO::FETCH_ASSOC);

include 'header.php';

?>

<main>
  <div class="container">

  <div class="card mt-5">
  <div class="card-header">
    <h3>Cadastro dados do cliente</h3>
  </div>
  <div class="card-body">
   

    <form action="create.php" method="post">

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="cpf_tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
          CPF
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="cnpj_tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
          CNPJ
        </button>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="cpf_tab">

        <div class="row">
          <div class="col-12">
              <div class="mb-3">
                <label>Nome do cliente *</label>
                <input type="text" name="nome_cliente" id="nome_cliente" class="form-control"  required>
              </div>
          </div>
          <div class="col-sm-4 col-12 ">
            <div class="mb-3">
              <label>CPF *</label>
              <input type="text" name="cpf" class="form-control" id="cpf" required>
            </div>
          </div>
          <div class="col-sm-4 col-12 ">
              <div class="mb-3">
                <label>Data Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control">
              </div>
          </div>
          <div class="col-sm-4 col-12 ">
            <div class="form-group">
              <label>Sexo</label>
              <select class="form-control" name="sexo">
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="cnpj_tab">

      <div class="row">
          <div class="col-12">
              <div class="mb-3">
                <label>Razão Social *</label>
                <input type="text" name="razao" class="form-control" id="razao"  required>
              </div>
          </div>
          <div class="col-sm-4 col-12 ">
              <div class="mb-3">
                <label>Nome Fantasia</label>
                <input type="text" name="fantasia" class="form-control" >
              </div>
          </div>
          <div class="col-sm-4 col-12 ">
            <div class="mb-3">
              <label>CNPJ *</label>
              <input type="text" name="cnpj" class="form-control" id="cnpj" required>
            </div>
          </div>
          <div class="col-sm-4 col-12 ">
              <div class="mb-3">
                <label>IE</label>
                <input type="text" name="ie" class="form-control" >
              </div>
          </div>
        </div>
      </div>
    </div>

    <nav class="mt-3" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Informações de endereço</li>
      </ol>
    </nav>

    <div class="row">
      <div class="col-12"> 
        <div class="mb-3">
          <label>Logradouro *</label>
          <input type="text" name="logradouro" class="form-control" required>
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <div class="mb-3">
          <label>Cidade *</label>
          <select class="custom-select form-control" name="id_cidade" required>
            <?php 
              foreach ($cidades as $cidade) {
                echo '<option value="'.$cidade['id_cidade'].'">'.$cidade['nome'].'</option>';
              }
            ?>
          </select>
          <div class="invalid-feedback">Example invalid custom select feedback</div>
        </div>
      </div>
      <div class="col-12 col-sm-6"> 
          <div class="mb-3">
            <label>Bairro</label>
            <input type="text" name="bairro" class="form-control">
          </div>
      </div>
      <div class="col-12 col-sm-4">
          <div class="mb-3">
            <label>Numero *</label>
            <input type="number" name="numero" class="form-control" required>
          </div>
      </div>
      <div class="col-12 col-sm-4">
          <div class="mb-3">
            <label>CEP *</label>
            <input type="number" name="cep" class="form-control cep" required>
          </div>
      </div>
      <div class="col-12 col-sm-4"> 
        <div class="form-group mb-3">
          <label>UF</label>
          <select class="form-control" name="uf">
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>
        </div>
      </div>
    
    </div>
      <button class="btn btn-primary" type="submit">Salvar</button>
    </form>
  </div>
  </div>
  </div>
</main>


<script>
  $( "#cpf_tab" ).click(function() {
      $('#razao').val("");
      $('#cnpj').val("");
    });
    
  $( "#cnpj_tab" ).click(function() {
    $('#nome_cliente').val("");
    $('#cpf').val("");
  });
</script>

<?php
  include 'footer.php';
?>