<div class="pull-right">

    <br />
    <div id="add_employment_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Employment</h4>
                </div>
                <div class="modal-body">
                    <form id="add_employment_form" action="#" name="add_employment_form">
                        <div class="form-group">
                            <div class="col-sm-3 col-sm-offset-3">
                                <label for="from">From</label>
                                <input name="from" type="date" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label for="to">To</label>
                                <input name="to" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <label for="office_name">Office Name</label>
                            <input name="office_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input name="position" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="10" placeholder="Description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="submit_add_emp_form" form="add_employment_form" type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>

        </div>
    </div>
</div>