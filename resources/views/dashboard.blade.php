@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <header>
                <h1>{{ __('app.dashboard') }}</h1>
            </header>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ul>
                        <li>
                            <a href="{{ route('products.index') }}">{{ __('app.products') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
