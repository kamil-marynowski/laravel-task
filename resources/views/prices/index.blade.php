@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('app.dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('app.products') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('app.prices') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <header>
                <h1>{{ __('app.prices') }}</h1>
            </header>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <a class="btn btn-success" href="{{ route('products.prices.create', ['product' => $product]) }}">{{ __('app.new_price') }}</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <table class="table table-bordered table-striped table-responsive data-table">
                        <thead class="table-dark">
                        <tr>
                            <th>{{ __('app.id') }}</th>
                            <th>{{ __('app.product') }}</th>
                            <th>{{ __('app.net') }}</th>
                            <th>{{ __('app.gross') }}</th>
                            <th>{{ __('app.vat') }}</th>
                            <th>{{ __('app.vat') }} %</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prices as $price)
                            <tr>
                                <td>{{ $price->id }}</td>
                                <td>{{ $price->product->name }}</td>
                                <td>{{ $price->net }} zł</td>
                                <td>{{ $price->gross }} zł</td>
                                <td>{{ $price->vat }} zł</td>
                                <td>{{ $price->vat_percentage }} %</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('products.prices.edit', ['product' => $product, 'price' => $price]) }}">
                                        <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                        <span>{{ __('app.edit') }}</span>
                                    </a>
                                    <button class="btn btn-danger delete-btn" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete-modal"
                                            data-action="{{ route('products.prices.destroy', ['product' => $product, 'price' => $price]) }}"
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
