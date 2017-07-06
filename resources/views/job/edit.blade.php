@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/client/settings.css')}}">
@endsection
@section('content')
    @include('client.header')
    <div class="job_editing">
        <div class="container">

            <h3>Edit Job</h3>
            <div class="edit-job">
                <form action="{{url('client/job/edit')}}" class="form-horizontal" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-sm-12">
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <input id="title" type="text" class="form-control" name="title"
                                   value="{{ $errors->has('title') ? old('title') : $job->title }}"
                                   placeholder="Job Title" autofocus>
                            @if ($errors->has('title'))
                                <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="col-sm-12">

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <textarea placeholder="Description" class="form-control" name="description" id="description"
                                      cols="30"
                                      rows="10">{{ $errors->has('description') ? old('description') : $job->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="col-sm-12">

                        <div class="form-group">
                            Attach Files
                            <input class="form-control" type="file" name="attached_files"
                                   value="{{old('attached_files')}}"/>
                            <div>
                                @if ($job->attached_files)
                                    <a href="{{url("job/download/$job->attached_files")}}">Download Old Files</a>
                                @else
                                    <p>No Attached Files</p>
                                @endif
                            </div>
                            @if ($errors->has('attached_files'))
                                <span class="help-block">
                            <strong>{{ $errors->first('attached_files') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control validateWithData" name="categories[]"
                                id="categories" multiple="multiple"
                                data-has-error="{{ $errors->has('categories') ? 1 : 0 }}">
                            @forelse ($categories as $cat)
                                @if(in_array($cat->id, $jobCategories))
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
                                @if(in_array($cat->id, $jobCategories))
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
                        <select data-has-error="{{ $errors->has('skills') ? 1 : 0 }}"
                                class="validateWithData form-control" name="skills[]"
                                id="skills" multiple="multiple">
                            @forelse ($skills as $skill)
                                @if(in_array($skill->id, $jobSkills))
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
                    <div class="col-sm-4">
                        <label>
                            Fixed
                            <input type="radio" class="hourly {{ $errors->has('budget') ? ' has-error' : '' }}"
                                   name="type"
                                   value="fixed" {{$errors->has('budget') ? (old('type') == 'fixed' ? 'checked' : '') : ($job->type == 'fixed' ? 'checked' : '')}}
                            />
                        </label>
                        <label>
                            Hourly
                            <input class="hourly" type="radio" name="type" value="hourly"
                                    {{$errors->has('budget') ? (old('type') == 'hourly' ? 'checked' : '') : ($job->type == 'hourly' ? 'checked' : '')}}
                            />
                        </label>
                        @if ($errors->has('type'))
                            <span class="help-block">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        <label id="hourly_limit" class="hidden">
                            Hours per week
                            <input class="{{ $errors->has('hourly_limit') ? ' has-error' : '' }}" type="number"
                                   name="hourly_limit"
                                   value="{{ $errors->has('hourly_limit') ? old('hourly_limit') : $job->hourly_limit }}"/>
                        </label>
                        @if ($errors->has('hourly_limit'))
                            <span class="help-block">
                            <strong>{{ $errors->first('hourly_limit') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <label>
                            Budget
                            <input class="form-control {{ $errors->has('budget') ? ' has-error' : '' }}" type="number"
                                   step="0.01" name="budget"
                                   value="{{ $errors->has('budget') ? old('budget') : $job->budget }}"/>
                        </label>
                        @if ($errors->has('budget'))
                            <span class="help-block">
                            <strong>{{ $errors->first('budget') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-sm-4">
                        Closing Date
                        <input type="date" name="open_untill"
                               class="{{ $errors->has('open_untill') ? ' has-error' : '' }} form-control"
                               value="{{$errors->has('open_untill') ? old('open_untill') : $job->open_untill }}"/>
                        @if ($errors->has('open_untill'))
                            <span class="help-block">
                            <strong>{{ $errors->first('open_untill') }}</strong>
                        </span>
                        @endif
                    </div>
                    <input type="hidden" name="id" value="{{$job->id}}"/>
                    <div class="col-sm-12 edit-this-job">
                        <button type="submit" class="btn btn-success">Edit Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/client/settings.js')}}"></script>
@endsection