<div class="portfolio-item">
    <div class="row">
        <div class="col-sm-5">
            @if($portfolio->image)
                <img src="{{asset("storage/portfolio/".($portfolio->image))}}" class="img-responsive image"/>
            @else
                <img src="{{asset("assets/images/default.jpg")}}" class="img-responsive image"/>
            @endif
        </div>
        <div class="col-sm-7">
            <h2>
                <span class="title"> {{$portfolio->title}} </span>
                <i class="fa fa-edit edit_portfolio_btn" data-toggle="modal" data-target="#edit_portfolio_modal"></i>
            </h2>
            <p class="description">{{$portfolio->description or ""}}</p>
            <span class="hidden id"> {{$portfolio->id}} </span>
        </div>
    </div>
</div>