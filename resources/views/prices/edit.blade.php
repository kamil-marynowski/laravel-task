@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">{{ __('app.dashboard') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('products.index') }}">{{ __('app.products') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('products.prices.index', ['product' => $product]) }}">{{ __('app.prices') }}</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        {{ __('app.new_price') }}
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <header>
                <h1>{{ $product->name }} - {{ __('app.edit_price') }}</h1>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.prices.update', ['product' => $product, 'price' => $price]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('app.net') }}</label>
                                    <input class="form-control" type="number" name="net" value="{{ $price->net }}"
                                           min="0" step="0.01" required
                                    >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('app.gross') }}</label>
                                    <input class="form-control" type="number" name="gross" value="{{ $price->gross }}"
                                           min="0" step="0.01" required
                                    >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('app.vat_percentage') }}</label>
                                    <select class="form-control" name="vat_percentage">
                                        <option value="0" @if($price->vat_percentage === 0) selected @endif>0%</option>
                                        <option value="5" @if($price->vat_percentage === 5) selected @endif>5%</option>
                                        <option value="8" @if($price->vat_percentage === 8) selected @endif>8%</option>
                                        <option value="23" @if($price->vat_percentage === 23) selected @endif>23%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('app.vat') }}</label>
                                    <input class="form-control" type="number" name="vat" value="{{ $price->vat }}"
                                           min="0" step="0.01" required
                                    >
                                </div>
                            </div>
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
