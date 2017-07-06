<div class="pull-right">

    <div id="add_portfolio_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Portfolio</h4>
                </div>
                <div class="modal-body">
                    <form id="add_portfolio_form" action="#" name="add_portfolio_form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>
                                Add Image
                                <input type="file" name="image">
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="10" placeholder="Description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="submit_add_port_form" form="add_portfolio_form" type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>

        </div>
    </div>
</div>