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

<style>
    .product-card {
        display: flex;
        flex-direction: column;
        height: 400px;
        position: relative;
    }

    .product-price {
        position: absolute;
        bottom: 10px;
        right: 10px;
    }

    .product-status {
        position: absolute;
        top: 10px;
        left: 10px;
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
                    </div>

                    <!-- Move the price and status outside card-body -->
                    <h3 class="product-price">{{ $product->price }}</h3>
                    <badge
                        class="product-status badge text-white
                        @if ($product->product_status == 'in-stock') bg-success @else bg-danger @endif"
                        style="text-decoration: none">{{ $product->product_status }}</badge>
                </div>
            </div>
        @endforeach
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .product-card {
        display: flex;
        flex-direction: column;
        height: 400px;
        position: relative;
    }

    .product-price {
        position: absolute;
        bottom: 40px;
        right: 10px;
    }

    .product-status {
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .rating {
        direction: rtl;
        unicode-bidi: bidi-override;
        color: #ddd;
        /* Personal choice */
        font-size: 8px;
        margin-left: -15px;
    }

    .rating input {
        display: none;
    }

    .rating label:hover,
    .rating label:hover~label,
    .rating input:checked+label,
    .rating input:checked+label~label {
        color: #ffc107;
        /* Personal color choice. Lifted from Bootstrap 4 */
        font-size: 8px;
    }

    .front-stars,
    .back-stars,
    .star-rating {
        display: flex;
    }

    .star-rating {
        align-items: left;
        font-size: 1.5em;
        justify-content: left;
        margin-left: -5px;
    }

    .back-stars {
        color: #ccc;
        position: relative;
    }

    .front-stars {
        color: #ffbc0b;
        overflow: hidden;
        position: absolute;
        top: 0;
        transition: all 0.5s;
    }

    .percent {
        color: #bb5252;
        font-size: 1.5em;
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

                    </div>

                    <!-- Move the price and status outside card-body -->
                    <h3 class="product-price">{{ $product->price }}</h3>
                    <!-- Add button to open modal -->
                    <button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal"
                        data-bs-target="#productModal{{ $key }}">
                        Add Comments
                    </button>
                    <badge
                        class="product-status badge text-white
                        @if ($product->product_status == 'in-stock') bg-success @else bg-danger @endif"
                        style="text-decoration: none">{{ $product->product_status }}</badge>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="productModal{{ $key }}" tabindex="-1"
                aria-labelledby="productModalLabel{{ $key }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            {{-- <h5 class="modal-title" id="productModalLabel{{ $key }}">{{ $product->name }}
                            </h5> --}}
                            <h3 class="h4 pb-3">Write a Review</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- <img src="{{ Storage::url($product->image) }}" class="img-fluid mb-3"
                                style="max-height: 300px;" alt="Product Image">
                            <p>{{ $product->description }}</p>
                            <p>Price: {{ $product->price }}</p>
                            <p>Status: <span
                                    class="badge bg-{{ $product->product_status == 'in-stock' ? 'success' : 'danger' }}">{{ $product->product_status }}</span>
                            </p> --}}

                            <label for="name">Name: {{ $users->username }}</label><br>

                            <label for="email">Email: {{ $users->email }}</label><br>

                            <label for="rating">Rating</label>
                            <br>
                            <div class="rating" style="width: 10rem; display:flex">
                                <input id="rating-5" type="radio" name="rating" value="5" /><label
                                    for="rating-5"><i class="fas fa-3x fa-star" style="font-size:larger"></i></label>
                                <input id="rating-4" type="radio" name="rating" value="4" /><label
                                    for="rating-4"><i class="fas fa-3x fa-star" style="font-size:larger"></i></label>
                                <input id="rating-3" type="radio" name="rating" value="3" /><label
                                    for="rating-3"><i class="fas fa-3x fa-star" style="font-size:larger"></i></label>
                                <input id="rating-2" type="radio" name="rating" value="2" /><label
                                    for="rating-2"><i class="fas fa-3x fa-star" style="font-size:larger"></i></label>
                                <input id="rating-1" type="radio" name="rating" value="1" /><label
                                    for="rating-1"><i class="fas fa-3x fa-star" style="font-size:larger"></i></label>
                            </div>
                        </div>
                        <div class="form-group mb-3 mx-3">
                            <label for="">How was your overall experience?</label>
                            <textarea name="review" id="review" class="form-control" cols="30" rows="10"
                                placeholder="How was your overall experience?"></textarea>
                        </div>
                        <div>
                            <button class="btn btn-dark float-end mb-4 me-3">Submit</button>
                        </div>

                    </div>
                </div>

            </div>
    </div>
</div>
</div>


</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <!-- Add any other modal footer buttons -->
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
