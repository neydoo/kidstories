@extends('admin.layouts.app', ['title' => __('Manage Stories')])

@section('content')
    @include('admin.stories.partials.header', ['title' => __('Story Detail')])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Manage Stories') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin.stories.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" 
                            autocomplete="off" enctype="multipart/form-data">
                            <h6 class="heading-small text-muted mb-4">{{ __('Story information') }} 
                               <span>
                                <a href="{{ route('admin.stories.edit',['id'=>$story->slug]) }}" class="btn btn-sm btn-primary">{{ __('edit') }}</a>
                            </span>
                        </h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }} </label>
                                    <input  type="text" value="{{$story->title}}" 
                                        class="form-control form-control-alternative" disabled>
                                </div>         
                                <div class="form-group">
                                    <img src="{{$story->image_url ?? '/images/placeholder.png'}}" style="height:15rem" alt="" 
                                        class="form-control img">
                                </div>   
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Tags') }} </label>
                                    <select name="tags[]" id="tags" multiple disabled
                                        class="form-control form-control-alternative">
                                        <option value=""></option>
                                        @foreach ($story->tags as $tag)
                                            <option selected>
                                                {{$tag->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tags'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tags') }}</strong>
                                        </span>
                                    @endif
                                </div>                
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Content') }} </label>
                                    <textarea style="height:200px" type="text" 
                                         class="form-control form-control-alternative" 
                                        disabled >
                                        {{$story->body}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Created By') }} </label>
                                    <input  type="text" 
                                        value="{{$story->user->fullName}}"
                                        class="form-control form-control-alternative" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Created On') }} </label>
                                    <input  type="text" 
                                        value="{{$story->created_at->toDayDateTimeString()}}"
                                        class="form-control form-control-alternative" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Age') }} </label>
                                    <input  type="text" value="{{$story->age}}"
                                        class="form-control form-control-alternative" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Author') }} </label>
                                    <input  type="text" value="{{$story->author}}"
                                        class="form-control form-control-alternative" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Category') }} </label>
                                    <input  type="text" value="{{$story->category->name}}"
                                        class="form-control form-control-alternative" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Reading Time') }} </label>
                                    <input  type="text" value="{{$story->readingTime}}"
                                        class="form-control form-control-alternative" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-title">{{ __('Subscription') }} </label>
                                    <input  type="text" value="{{$story->subscription}}"
                                        class="form-control form-control-alternative" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footers.auth')
    </div>
@endsection
@push('js')
    <script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
    <script type="text/javascript" src="{{asset('js/select2_init.js')}}"></script>
@endpush