<div class="row justify-content-center">
    <div class="panel panel-default col-md-6 col-xs-6">
        <ul class="list-group group-todo">
            <h2>Todo</h2>
            <!-- use loop -->
            <li ontouchstart="" class="list-group-item text-wrap">
                <h4 class="list listgroup-item-heading"><!-- title --></h4>
                <p class="list-group-item-text"><!-- text --></p>
                <div class="buttons">
                    <button ontouchstart="" type="button" class="btn btn-info btn-xs show-edit-modal" data-toggle="modal" data-target="#edit-modal"
                        title="Edit">
                        <i class="fas fa-edit fa-xs" aria-hidden="true"></i>
                    </button>
                    <button ontouchstart="" type="button" class="btn btn-danger btn-xs move-done" title="Done">
                        <i class="fas fa-check fa-xs class-change" aria-hidden="true"></i>
                    </button>
                </div>
            </li>
            <!-- end -->
        </ul>
        <div class="panel-footer">
            <small><!--count --> list items</small>
        </div>
        <!-- Button trigger modal -->
        <button href="#" class="btn btn-success show-todolist-modal" data-toggle="modal" data-target="#todolist-modal">Create New List</button>
    </div>

    <div class="panel panel-default col-md-6 col-xs-6">
            <ul class="list-group group-done text-wrap">
                <h2>Done</h2>
                <!--use loop -->
                <li ontouchstart="" class="list-group-item">
                    <h4 class="list listgroup-item-heading"><!--title --></h4>
                    <p class="list-group-item-text"><!-- text --></p>
                    <div class="buttons">
                        <button ontouchstart="" type="button" class="btn btn-danger btn-xs delete-done" title="Delete">
                            <i class="fas fa-minus fa-xs" aria-hidden="true"></i>
                        </button>
                    </div>
                </li>
                <!--end -->
            </ul>
            <div class="panel-footer">
                <small><!--count --> list items</small>
            </div>
        </div>
</div>


        <!-- Modal create-->
<div class="modal fade" id="todolist-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
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
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
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
