  <!-- Create User -->
<div class="modal fade" id="create_usr" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Creator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="usr_name">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" name="usr_email">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="usr_passw">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="create_usr">Create</button>
        </form> 
    </div>
    </div>
  </div>
</div>

<!-- Create Tasks -->
<div class="modal fade" id="create_task" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Task Creator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">User ID</label>
            <input type="number" class="form-control" name="id_user">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" class="form-control" name="description">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Status</label>
            <select class="custom-select" name="task_status" required >
            <option selected hidden>Choose...</option>
            <option value="U">Upcoming</option>
            <option value="P">Progessing</option>
            <option value="H">Holding</option>
          </select>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="create_task">Create</button>
        </form> 
    </div>
    </div>
  </div>
</div>



