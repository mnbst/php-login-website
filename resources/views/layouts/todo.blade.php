
<div class="row justify-content-center">

<div class="form-group has-search col-md-2 col-xs-12">
    <span class="fa fa-search form-control-feedback"></span>
    <input type="text" id="todo-search" class="form-control" placeholder="Search">
  </div>

    <div class="panel panel-default col-md-5 col-xs-12">
    <h2>Todo</h2>

        <ul class="list-group group-todo">
           <!-- insert todo list-->
        </ul>

        <div class="panel-footer todo-footer">
            <!-- insert todo count-->
        </div>

        <!-- Button trigger modal -->
        <button href="#" class="btn btn-success show-todolist-modal" data-toggle="modal" data-target="#todolist-modal">Create New List</button>
    </div>

    <div class="panel panel-default col-md-5 col-xs-12">
    <h2>Done</h2>

        <ul class="list-group group-done text-wrap">
           <!-- insert done list-->
        </ul>

        <div class="panel-footer done-footer">
        <!-- insert done count-->
        </div>
    </div>
</div>


<!-- Modal create-->
<div class="modal fade" id="todolist-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create todo list</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label for="" class="control-label">List Name</label>
                        <input type="text" class="form-control input-lg input-title">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Description</label>
                        <textarea rows="2" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-change">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal edit-->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit todo list</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label for="" class="control-label">List Name</label>
                        <input type="text" class="form-control input-lg input-title">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Description</label>
                        <textarea rows="2" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-change">Update</button>
            </div>
        </div>
    </div>
</div>
