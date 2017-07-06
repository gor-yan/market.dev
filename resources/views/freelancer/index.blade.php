@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/freelancer/main.css')}}">
@endsection
@section('content')
    @include('freelancer.header')
    <div class="services" id="searchJob">
        <div class="container">
            <div class="agile-heading">
                <h3>Search Job</h3>
            </div>
            <div class="wthree-services-grids">
                <div class="wthree-services">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class=" wthree-services-grid jobs-and-search-input">
                                <div class="form-group relative">
                                    <input type="text" form="job-search-form" class="form-control" id="job-name"
                                           name="name" placeholder="Job Name"
                                           value="{{request()->input('name')}}"
                                    />
                                    <button type="submit" form="job-search-form" class="btn btn-default job-name-button">Submit</button>
                                </div>
                                <br>
                                <hr>
                                <div class="jobs">
                                    @forelse($jobs as $job)
                                        <div class="each-job">
                                            <h3>{{$job->title}}</h3>
                                            <div class="job-info-about">
                                                <span>{{$job->type}} , </span> <span>{{$job->updated_at}}</span>
                                            </div>
                                            <p class="job-small-desc">
                                                {{ str_limit($job->description, 200) }}
                                            </p>
                                            <div class="more-about">
                                                <span class="about-client">Verified  | Japan</span>
                                                <a href="{{url("/job/details/$job->id")}}"> Read More </a>
                                            </div>
                                        </div>
                                        <hr>
                                    @empty
                                        No Jobs yet
                                    @endforelse
                                    <div>{{$jobs->links()}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <form action="{{url('/freelancer')}}" id="job-search-form">
                                <div class=" wthree-services-grid row search-fields">
                                    <h3>Job Category</h3>
                                    <select name="categories" id="jobCategory" class="form-control job-category">
                                        @if(request()->input('categories') && request()->input('categories') == -1)
                                            <option value="-1" selected>All Categories</option>
                                        @else
                                            <option value="-1">All Categories</option>
                                        @endif
                                        @forelse($categories as $cat)
                                            @if(request()->input('categories') && request()->input('categories') == $cat->id)
                                                <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                                            @else
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endif
                                        @empty
                                            <option disabled value="">Empty</option>
                                        @endforelse
                                    </select>
                                    <br>
                                    <div class="subcategories">
                                        {{--<div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="subcategories[]" value="option1" aria-label="...">All
                                                subcategories
                                            </label>
                                        </div>--}}
                                    </div>
                                    <div class="submit-form">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        window.categories = <?php echo json_encode(request()->input('subcategories'))?>;
        console.log(window.categories);
    </script>
    <script src="{{asset('assets/js/freelancer/main.js')}}"></script>
@endsection