
<?php 


include 'conection.php';

$query = $conn->query("SELECT * FROM cliente;");
$clientes = $query->fetchAll(PDO::FETCH_ASSOC);

include 'header.php';

?>
<main>


<div class="container">

  <div class="card mt-5">
  <div class="card-header">
    <h3>Listagem de clientes</h3>
  </div>
  <div class="card-body">
   

  <table class="table" id="datatable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Fantasia</th>
      <th scope="col">CPF/CNPJ</th>
      <th scope="col">IE</th>
      <th scope="col">Data Nascimento</th>
      <th scope="col">Sexo</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($clientes as $cliente) {
        echo '<tr>
                <th scope="row">'.$cliente['id_cliente'].'</th>
                <td>'.$cliente['nome_razao'].'</td>
                <td>'.$cliente['fantasia'].'</td>
                <td>'.$cliente['cpf_cnpj'].'</td>
                <td>'.$cliente['ie'].'</td>
                <td>'.$cliente['data_nascimento'].'</td>
                <td>'.$cliente['sexo'].'</td>
                <td> 
                  <a href="editar.php?id='.$cliente['id_cliente'].'" class="btn btn-primary">
                    <i class="bi bi-pen"></i>
                  </a> 
                  <a href="excluir.php?id='.$cliente['id_cliente'].'" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
              </tr>';
      }
    ?>
   
  </tbody>
</table>


  </div>
  </div>
</div>
</main>


<?php
  include 'footer.php';
?>