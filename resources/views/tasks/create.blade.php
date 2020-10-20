@extends('layouts.app')

@section('content')
    @if(session()->get('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Create Task</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('task.store') }}" aria-label="{{ __('Upload') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="genre" class="col-sm-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <textarea id="description" name="description" rows="4" cols="50" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"></textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Upload') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

