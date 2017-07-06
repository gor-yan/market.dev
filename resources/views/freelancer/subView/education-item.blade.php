    <div class="education-item">
        <br>
        <h3 class="col-sm-6 pull-left m0">
            <span class="university_name">{{$education->university_name}}</span>
            <i class="fa fa-edit edit_education_btn" data-toggle="modal" data-target="#edit_education_modal"></i>
        </h3>
        <div class="col-sm-6">
            <p class=" ">Years <br> From <span class="from">{{$education->from}}</span> - To <span
                        class="to">{{$education->to}}</span></p>
            <div class="clearfix"></div>
            <p>Degree - <span class="degree">{{$education->degree}}</span></p>
            <p class="description">{{$education->description or ""}}</p>
            <span class="hidden id">{{$education->id}}</span>
        </div>
    </div>