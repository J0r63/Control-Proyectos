<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Project</b></h4>
                </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="project_add.php">
                  <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Nombre</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="budget" class="col-sm-3 control-label">Capital</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="budget" name="budget" required>
                    </div>
                </div>
              
            

                 <div class="form-group">
                    <label for="employee" class="col-sm-3 control-label">ScrumMaster</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="employee" id="employee" required>
                        <option value="" selected>- Select ScrumMaster -</option>
                        <?php
                          $sql = "SELECT * FROM employees WHERE  position_id = '5'";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['firstname']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="start" class="col-sm-3 control-label">Fecha_Inicio</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="start" name="start" required>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="finish" class="col-sm-3 control-label">Fecha_Terminacion</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="date" class="form-control" id="finish" name="finish" required>
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title"><b>Actualizar Proyecto:   <span class="project_id'"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="project_edit.php">
                <input type="hidden" class="proid" name="id">
                  <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Nombre</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="name">
                    </div>
                </div>
                  <div class="form-group">
                    <label for="edit_budget" class="col-sm-3 control-label">Capital</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_budget" name="budget">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_start" class="col-sm-3 control-label">Fecha_Inicio</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="edit_start" name="f_start">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_finish" class="col-sm-3 control-label">Fecha_Terminacion</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="edit_finish" name="f_finish">
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="project_id"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="project_delete.php">
                <input type="hidden" class="pid" name="id">
                <div class="text-center">
                    <p>ELIMINAR PROYECTO</p>
                    <h2 id="del_name" class="bold"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Borrar</button>
              </form>
            </div>
        </div>
    </div>
</div>