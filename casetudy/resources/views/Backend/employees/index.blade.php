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
                        <p><a href="">Nhân viên</a> <i class="fas fa-caret-right"></i> Address Book</p>
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
                        <h3 class="text-light">Quản lý Nhân viên</h3>
                        <div class="card-btn">
                            @can('Employee create')
                                <a href="{{ route('employee.create') }}" class="btn btn-light"></i><span>Thêm </span><i></i>
                                @endcan
                            </a>
                        </div>
                    </div>

                    <div class="card-body" id="all_employees">
                        <div class="card-body" id="all_employees">
                            @if (Session::has('message'))
                                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                    class="col-sm-6 alert alert-success">
                                    <strong>Success!</strong>{{ session::get('message') }}
                                </div>
                            @endif
                            <table class="table table-striped table-sm text-center align-middle">
                                <thead>
                                    <tr>
                                        <th class=" text-danger ">Mã nhân viên</th>
                                        <th>Tên</th>
                                        <th>vai trò</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @if ($employees->count() > 0)
                                        @foreach ($employees as $employee)
                                            <tr class="item-{{ $employee->id }}">
                                                <td>{{ $employee->id }}</td>
                                                <td>{{ $employee->name }}</td>
                                                    @foreach ($employee->roles as $role)
                                                        <td>{{ $role->name}}</td>
                                                    @endforeach
                                                <td class="">
                                                    @can('Employee update')
                                                        <a href="{{ route('employee.edit', $employee->id) }}"><i
                                                                class="bi-pencil-square h4"></i></a>
                                                    @endcan
                                                    @can('Employee delete')
                                                        <a href="#" id="{{ $employee->id }}"
                                                            class="text-danger mx-1 deleteIcon"><i
                                                                class="bi-trash h4 h4"></i></a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <h5 class="text-center text-secondary my-5">No record present in the database!</h5>;
                                    @endif
                                </tbody>
                            </table>
                            {{-- {{ $employees->appends(request()->query()) }} --}}
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
                        url: '{{ route('employee.destroy', 0) }}',
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
