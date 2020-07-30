<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Insert Data</h4>
                <button type="button" class="close" data-dismiss="modal" >&times;</button>
                
            </div>
            <div class="modal-body" >
                <form method="POST" id="insert-form" >
                <label>Name</label>
                <input type="hidden" id="id" name="id">
                <input type="text" id="fname" name="fname" class="form-control" required>
                <label>Lastname</label>
                <input type="text" id="lname" name="lname" class="form-control" required>
                <label>Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
                <label>Web</label>
                <input type="url" id="web" name="web" class="form-control" required>
                <br>
                <input type="submit" id="insert" class="btn btn-success" value="save"> 
                </form>

            </div>
            <div class="modal-footer">
                <button type="button"class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>