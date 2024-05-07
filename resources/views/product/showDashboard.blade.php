{{--
<section class="section-products">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach ($products as $key => $product)
                        <div class="col-md-5 mt-5 h-100">
                            <div class="card w-75">
                                <img src="{{ Storage::url($product->image) }}" class="card-img-top img-fluid"
                                    style="height: 200px; border:1px solid rgb(210, 210, 210);">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{!! Str::limit($product->description, 100, '...') !!}
                                    </p>
                                    <h3 class="product-price float-end">{{ $product->price }}</h3>
                                    <badge
                                        class="badge text-white float-start mt-5
                                    @if ($product->product_status == 'in-stock') bg-success @else bg-danger @endif"
                                        style="text-decoration: none">{{ $product->product_status }}</badge>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <style>
    .product-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
</style>
<div class="container">
    <div class="row">
        @foreach ($products as $key => $product)
            <div class="col-md-3 mt-5 mb-5">
                <div class="card product-card">
                    <img src="{{ Storage::url($product->image) }}" class="card-img-top img-fluid"
                        style="height: 200px; border:1px solid rgb(210, 210, 210);">

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{!! Str::limit($product->description, 100, '...') !!}
                        </p>
                        <h3 class="product-price float-end">{{ $product->price }}</h3>
                        <badge
                            class="badge text-white float-start mt-3
                                    @if ($product->product_status == 'in-stock') bg-success @else bg-danger @endif"
                            style="text-decoration: none">{{ $product->product_status }}</badge>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}

{{-- -------------------------------------------------------------------------------------------------- --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>

    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('product.index')" :inactive="request()->routeIs('product.show')">
                {{ __('Show Products') }}
            </x-nav-link>
            <x-nav-link :href="route('product.create')" :inactive="request()->routeIs('product.create')">
                {{ __('Add product') }}
            </x-nav-link>
        </div>
    </x-slot>

</x-app-layout>
