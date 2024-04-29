@extends('layouts.master')
@section('title')
    Roles
@endsection
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Roles
        @endslot
    @endcomponent
    @include('partials.session')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Roles</h5>
                    <div class="text-end">
                       
                        <a class="btn btn-primary" href="{{ route('add-role') }}">Add New Role</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="status">
                                        <span class="badge badge-soft-success text-uppercase">
                                            @if ($role->permissions->count() > 0)
                                                @if ($role->name != 'SuperAdmin')
                                                    <i class="las la-info-circle"
                                                        style="font-size:14px;color:rgb(39, 207, 39)" data-bs-toggle="modal"
                                                        data-bs-target="#permissionModel{{ $key }}"></i>
                                                @elseif($role->name == 'SuperAdmin')
                                                    All Permission
                                                @else
                                                    No Permission
                                                @endif
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <div>
                                            @if ($role->name != 'SuperAdmin')
                                            <a class="btn btn-primary btn-sm" href="{{ route('edit-role', $role->id) }}">
                                                <i class="ri-pencil-line"></i>
                                            </a>
                                            @endif 
                                            @if ($role->name != 'SuperAdmin')
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteRole{{ $key }}">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade bs-example-modal-sm" id="permissionModel{{ $key }}"
                                    role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mySmallModalLabel">Permissions</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="px-4 py-2">
                                                @foreach ($permissions as $permission)
                                                    @if ($role->permissions->contains($permission->id))
                                                        <h6 class=" text-left">{{ $permission->name }}</h6>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <a href="javascript:void(0);" class="btn btn-link link-success fw-medium"
                                                    data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
                                                    Close</a>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <div class="modal fade" id="deleteRole{{ $key }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $key }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $key }}">Confirm
                                                    Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do you sure you want to delete this role?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form method="POST"
                                                    action="{{ route('delete-role', $role->id) }}
                                                ">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>

    <!-- Widget init -->
    <script src="{{ URL::asset('assets/js/pages/widgets.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection

<script>
    function isClicked() {
        console.log('clicked');
    }
</script>
