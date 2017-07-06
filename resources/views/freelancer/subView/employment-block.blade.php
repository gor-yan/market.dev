<div class="row">
    <p class="text-center text-uppercase text-header">Employment    <span class="to-add">

        Add new
        <i class="fa fa-plus-circle" data-toggle="modal" data-target="#add_employment_modal"></i>
        </span>
    </p>
    <div class="col-sm-8 col-sm-offset-2">

        @include('freelancer.subView.employment-add')

        <div class="clearfix"></div>

        @forelse ($userEmployments as $employment)
            @include('freelancer.subView.employment-item')
        @empty
            <p>No Added Employment history</p>
        @endforelse

        <div id="edit_employment_modal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Employment</h4>
                    </div>
                    <div class="modal-body">
                        <form id="edit_employment_form" action="#" name="edit_employment_form">
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
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            <input type="hidden" name="id" value="">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submit_edit_emp_form" form="edit_employment_form" type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>