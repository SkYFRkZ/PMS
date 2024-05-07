{{-- style --}}

<link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">

<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">

<link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
<link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />

<link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">

<link rel="stylesheet" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">



{{-- end of style --}}

<style>
    .product-image img {
        width: 46px;
        height: 46px;
        object-fit: cover;
        border-radius: 50%;
    }
</style>



{{-- start of datatable --}}
<x-app-layout>

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb ">
                <a href="{{ route('category.create') }}" class="btn btn-light w-full rounded-0 p-3"><span
                        class="badge text-bg-info rounded p-3 float-end">Add Category</span></a>
            </ol>
        </nav>

        {{-- start of datatable --}}

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                        <th>Products</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <div class="btn-group" style="display: inline-block; p:0;">
                                                    <a href="{{ route('category.edit', $category->id) }}"
                                                        class="btn btn-warning">Update</a>
                                                    <a href="{{ route('category.delete', $category->id) }}"
                                                        class="btn btn-danger" id="delete">Delete</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group" style="display: inline-block; p:0;">
                                                    <a href="{{ route('product.show') }}" class="btn btn-success">Show
                                                        Products</a>
                                                </div>
                                            </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

</x-app-layout>


<script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>

<script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/template.js') }}"></script>

<script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript" src="{{ asset('backend/assets/js/code/code.js') }}"></script>


<script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('backend/assets/js/data-table.js') }}"></script>
