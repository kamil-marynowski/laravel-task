@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">{{ __('app.dashboard') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('products.index') }}">{{ __('app.products') }}</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        {{ __('app.products') }}
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">{{ __('app.name') }}</label>
                            <input class="form-control" type="text" name="name" placeholder="{{ __('app.name') }}"
                                   maxlength="255" required
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">{{ __('app.description')  }}</label>
                            <textarea class="form-control" name="description" maxlength="1000" required></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success float-end" type="submit">{{ __('app.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
