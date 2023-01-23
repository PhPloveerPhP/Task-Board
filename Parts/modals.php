<!-- Add new Modal -->

<div class="modal fade" id="create_task" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group" required>
            <label for="TaskDescription">Description of the Task</label>
            <textarea class="form-control" name="task_description" rows="3"></textarea>
          </div>

          <select class="custom-select" name="task_status" required >
            <option selected hidden>Choose...</option>
            <option value="U">Upcoming</option>
            <option value="P">Progessing</option>
            <option value="H">Holding</option>
          </select>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>
