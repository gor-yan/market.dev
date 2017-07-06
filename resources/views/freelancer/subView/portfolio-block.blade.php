<div class="row">
    <p class="text-center text-uppercase text-header">Portfolio
    <span class="to-add">
        Add new
    <i class="fa fa-plus-circle" data-toggle="modal" data-target="#add_portfolio_modal"></i>
    <br />
    </span></p>
    <div class="col-sm-8 col-sm-offset-2">

        @include('freelancer.subView.portfolio-add')

        <div class="clearfix"></div>

        @forelse ($userPortfolio as $portfolio)
            @include('freelancer.subView.portfolio-item')
        @empty
            <p>No Added Portfolio history</p>
        @endforelse


        <div id="edit_portfolio_modal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Portfolio</h4>
                    </div>
                    <div class="modal-body">
                        <form id="edit_portfolio_form" action="#" name="edit_portfolio_form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>
                                    Update Image
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
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <input type="hidden" name="id" value="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submit_edit_port_form" form="edit_portfolio_form" type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>