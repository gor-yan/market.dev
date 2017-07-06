<div class="employment-item">
    <h3 class="col-sm-6 pull-left m0">
        <span class="office_name">{{$employment->office_name}}</span>
        <i class="fa fa-edit edit_employment_btn" data-toggle="modal" data-target="#edit_employment_modal"></i>
    </h3>
    <div class="col-sm-6">
        <p class="">Years From <span class="from">{{$employment->from}}</span> - To <span
                    class="to">{{$employment->to}}</span></p>
        <div class="clearfix"></div>
        <p>Position - <span class="position"> {{$employment->position}} </span></p>
        <p class="description"> {{$employment->description}} </p>
        <span class="hidden id">{{$employment->id}}</span>
    </div>
</div>