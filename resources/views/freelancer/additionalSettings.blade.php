@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/freelancer/settings.css')}}">
@endsection
@section('content')
    @include('freelancer.header')
    <div class="wthree-services-grids">
        <div class="agile-heading">
            <h3>Profile Settings</h3>
        </div>
        <div class="container">
            <div class="wthree-services-grids">
                <div class="wthree-services">
                    <div class="col-sm-3" style="margin-top: 4px;">
                        @include('freelancer.settingsTabs')
                    </div>
                    <div class="col-sm-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="addSettings">
                                <div class="wthree-services-grid jobs-and-search-input">
                                    <form name="user_additional_info_form"
                                          action="{{url('/freelancer/settings/additional')}}" class="form-horizontal"
                                          method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="row p10">

                                            <div class="col-sm-3">
                                                @if(Auth::user()->image)
                                                    <span>Edit Image</span>
                                                @else
                                                    <span>Add Image</span>
                                                @endif
                                                @if (Auth::user()->image)
                                                    <label style="cursor: pointer" for="image_input">
                                                        <img class="img-responsive img-circle"
                                                             src="{{asset('storage/personal_img/'.Auth::user()->image)}}">
                                                    </label>
                                                @else
                                                    <label style="cursor: pointer" for="image_input">
                                                        <img class="img-responsive"
                                                             src="{{asset('assets/images/user-default.png')}}">
                                                    </label>
                                                @endif
                                                <input type="file" id="image_input" style="visibility: hidden;" name="image" value="{{ old('image') }}">
                                            </div>
                                            @if($errors->has('image'))
                                                <p>{{$errors->first('image')}}</p>
                                            @endif
                                            <div class="col-md-6 ">
                                                <h3> {{auth()->user()->getFullName() }}</h3>
                                                <h4 class="text-center">Web & Soft Developer </h4>
                                                <div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <h3>$35.00 /hr</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <hr>
                                        <div class="row mt40">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <select class="form-control validateWithData" name="categories[]"
                                                        id="categories" multiple="multiple"
                                                        data-has-error="{{ $errors->has('categories') ? 1 : 0 }}">
                                                    @forelse ($categories as $cat)
                                                        @if(in_array($cat->id, $userCategories))
                                                            <option value="{{$cat->id}}"
                                                                    selected>{{$cat->name}}</option>
                                                        @else
                                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endif
                                                    @empty
                                                        <option value="" disabled>Nothing</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control validateWithData" name="sub_categories[]"
                                                        id="sub_categories" multiple="multiple"
                                                        data-has-error="{{ $errors->has('subCategories') ? 1 : 0 }}">
                                                    @forelse ($sub_categories as $cat)
                                                        @if(in_array($cat->id, $userCategories))
                                                            <option value="{{$cat->id}}"
                                                                    selected>{{$cat->name}}</option>
                                                        @else
                                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endif
                                                    @empty
                                                        <option value="" disabled>Nothing</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <select data-has-error="{{ $errors->has('skills') ? 1 : 0 }}"
                                                        class="validateWithData form-control" name="skills[]"
                                                        id="skills" multiple="multiple">
                                                    @forelse ($skills as $skill)
                                                        @if(in_array($skill->id, $userSkills))
                                                            <option value="{{$skill->id}}"
                                                                    selected>{{$skill->name}}</option>
                                                        @else
                                                            <option value="{{$skill->id}}">{{$skill->name}}</option>
                                                        @endif
                                                    @empty
                                                        <option value="" disabled>Nothing</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <textarea name="description" id="description"
                                                          class="form-control {{ $errors->has('description') ? ' has-error' : '' }}"
                                                          rows="10"
                                                          placeholder="Description">{{ $errors->has('description') ? old('description') : auth()->user()->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2 text-center">
                                                <button type="submit" class="submit-info">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <br>
                                    <hr>
                                    @include('freelancer.subView.education-block')

                                    <hr>
                                    <br>
                                    <hr>
                                    @include('freelancer.subView.employment-block')

                                    <hr>
                                    <br>
                                    <hr>
                                    @include('freelancer.subView.portfolio-block')
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/freelancer/settings.js')}}"></script>
@endsection