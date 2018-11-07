<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Proyectos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Proyectos</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th> Codigo</th>
                   <th> Nombre</th>
                   <th> Capital </th>
                   <th> ScrumMaster </th>
                   <th> Fecha_Inicio </th>
                   <th> Fecha_Terminacion </th>
                   <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                   // $sql = "SELECT * FROM projects";

                  $sql = "SELECT *, projects.id AS otid, employees.employee_id AS empid FROM projects LEFT JOIN employees ON employees.id=projects.employee_id ORDER BY created_on DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['project_id']."</td>
                          <td>".$row['name']."</td>
                          <td>".'Q. '.number_format($row['budget'], 2)."</td>
                          <td>".$row['firstname'].' '.$row['lastname']."</td>
                          <td>".$row['f_start']."</td>
                          <td>".$row['f_finish']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>

                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/project_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'project_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
  
      $('.proid').val(response.proid);
      $('.proj').val(response.id);
      $('.project_id').html(response.project_id);
     // $('#del_name').html(response.name);
      
      $('.project_name').html(response.name);

      $('#edit_name').val(response.name);
      $('#edit_budget').val(response.budget);
      $('#edit_start').val(response.f_start);
      $('#edit_finish').val(response.f_finish);

    }
  });
}
</script>
</body>
</html>


