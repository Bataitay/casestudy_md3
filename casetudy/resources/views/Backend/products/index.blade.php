@extends('Backend.main')
@section('content')
    <div class="col-12">
        <div class="dashboard_header mb_50">
            <div class="row">
                <div class="col-lg-6">
                    <div class="dashboard_header_title">
                        <h5> Chúc {{ Auth::user()->name ?? 'user_name' }} một ngày làm việc vui vẻ!</h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="dashboard_breadcam text-end">
                        @can('Product create')
                            <p><a href="index.html">Danh sách Sản Phẩm</a> <i class="fas fa-caret-right"></i> Thêm sản phẩm</p>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-secondary  d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Quản lý sản phẩm</h3>
                        <div class="card-btn">
                            <a href="{{ route('product.create') }}" class="btn btn-light" style="--clr:#ff1867">
                                </i><span>Thêm!</span><i></i></a>
                        </div>
                    </div>
                    <div class="card-body" id="show_all_products">

                        <div class="bin col-md-12">
                            <div class="col-md-6">
                                <a href="{{ route('products.trashed') }}" class="btn btn-primary btn-sm">Thùng rác</a>
                            </div>

                        </div>
                        <div class="card-body" id="show_all_products">
                            @if (Session::has('message'))
                                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                    class="col-sm-6 alert alert-success">
                                    <strong>Success!</strong>{{ session::get('message') }}
                                </div>
                            @endif
                            <table class="table table-striped table-sm text-center align-middle">
                                <thead>
                                    <tr>
                                        <th class="text-danger ">Mã sản phẩm</th>
                                        <th>Tên</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Màu</th>
                                        <th>thao tác</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">

                                    @if ($products->count() > 0)
                                            @foreach ($products as $product)
                                                <tr class="item-{{ $product->id }}">
                                                    <td>{{ $product->id }}</td>
                                                    <td>
                                                        {{ $product->name }}<br>
                                                        <span
                                                            class="badge bg-primary">chip:{{ $product->config->chip }}</span>
                                                        <span class="badge bg-danger">bộ
                                                            nhớ{{ $product->config->memory }}</span>
                                                        <span class="badge bg-warning">pin:{{ $product->config->pin }}</span>
                                                    </td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>{{ $product->color }}</td>
                                                <td class="">
                                                    @if (request()->has('view_deleted'))
                                                        <a href="{{ route('product.restore', $product->id) }}"
                                                            class="text-success mx-1 "><i
                                                                class="bi bi-reply-all h4"></i></a>
                                                    @else
                                                        @can('Product edit')
                                                            <a href="{{ route('product.edit', $product->id) }}"><i
                                                                    class="bi-pencil-square h4"></i></a>
                                                        @endcan
                                                        <a href="{{ route('product.show', $product->id) }}"><i
                                                                class="bi bi-eye h4"></i></a>
                                                    @endif
                                                    @can('Product delete')
                                                        <a href="#" id="{{ $product->id }}"
                                                            class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <h5 class="text-center text-secondary my-5">No record present in the database!</h5>
                                    @endif
                                </tbody>
                            </table>
                            {{ $products->onEachSide(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('product.destroy', 0) }}',
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(res) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            $('.item-' + id).remove();

                        }

                    });
                }
            })
        });

        $(document).ready(function() {
            $('#myInput').on('keyup', function(event) {
                event.preventDefault();
                let key = $(this).val().toLowerCase();
                $('#myTable tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(key) > -1);
                });
            });
        });
    </script>
@endsection
