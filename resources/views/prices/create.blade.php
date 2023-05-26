@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('products.index') }}">Products</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('products.prices.index', ['product' => $product]) }}">Prices</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        New price
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <header>
                <h1>{{ $product->name }} - New price</h1>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.prices.store', ['product' => $product]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('app.net') }}</label>
                                    <input class="form-control" type="number" name="net"
                                           min="0" step="0.01" required
                                    >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('app.gross') }}</label>
                                    <input class="form-control" type="number" name="gross"
                                           min="0" step="0.01" required
                                    >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('app.vat_percentage') }}</label>
                                    <select class="form-control" name="vat_percentage">
                                        <option value="0">0%</option>
                                        <option value="5">5%</option>
                                        <option value="8">8%</option>
                                        <option value="23">23%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group mb-3">
                                    <label class="form-label">{{ __('app.vat') }}</label>
                                    <input class="form-control" type="number" name="vat"
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
