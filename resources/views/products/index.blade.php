@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('app.dashboard') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('app.products') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <header>
                <h1>{{ __('app.products') }}</h1>
            </header>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <a class="btn btn-success" href="{{ route('products.create') }}">{{ __('app.new_product') }}</a>
                </div>
                <div class="col">
                    <form action="{{ route('products.index') }}" method="get">
                        <div class="form-group mb-3">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{ $search }}"
                                       placeholder="{{ __('app.search') }}..."
                                >
                                <button class="btn btn-primary" type="submit">{{ __('app.search') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <table class="table table-bordered table-striped table-responsive data-table">
                        <thead class="table-dark">
                            <tr>
                                <th>@sortablelink('id', 'Id')</th>
                                <th>@sortablelink('name', 'Name')</th>
                                <th>@sortablelink('description', 'Description')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('products.prices.index', ['product' => $product]) }}">
                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                        <span>{{ __('app.prices') }}</span>
                                    </a>
                                    <a class="btn btn-warning" href="{{ route('products.edit', ['product' => $product]) }}">
                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                        <span>{{ __('app.edit') }}</span>
                                    </a>
                                    <button class="btn btn-danger delete-btn" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete-modal"
                                            data-action="{{ route('products.destroy', ['product' => $product]) }}"
                                    >
                                        <i class="fa-sharp fa-solid fa-trash"></i>
                                        <span>{{ __('app.delete') }}</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    @include('partials.modals.delete')
@endsection

@section('scripts')
    <script>
        const deleteForm = document.querySelector('#delete-modal-form');
        const deleteBtns = document.querySelectorAll('.delete-btn');
        for (const deleteBtn of deleteBtns) {
            deleteBtn.addEventListener('click', () => {
                deleteForm.action = deleteBtn.dataset.action;
            });
        }
    </script>
@endsection
