@extends('layouts.master')
@section('title')
    User
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
            User
        @endslot
    @endcomponent
    @include('partials.session')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Users</h5>
                    <div class="text-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" onclick="isClicked()"
                            data-bs-target="#addNewUser">Add New User</button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles[0]->name }}</td>
                                    <td>
                                        <div class="text-center">
                                            @if ($user->id != 1)
                                                <button class=" btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editUser{{ $key }}">
                                                    <i class="ri-pencil-line"></i>
                                                </button>
                                            @endif
                                            @if ($user->id != 1)
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteUser{{ $key }}">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <div id="editUser{{ $key }}" class="modal fade zoomIn" tabindex="-1"
                                    aria-labelledby="editUser{{ $key }}" aria-hidden="true"
                                    style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editUser{{ $key }}">Edit User
                                                    </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST"
                                                action="{{ route('update-user', $user->id) }}">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <div class="my-2">
                                                        <label class="form-label">Name</label>
                                                        <input name="name" value="{{ $user->name }}" required
                                                            class="form-control" type="text">
                                                    </div>
                                                    <div class="my-2">
                                                        <label class="form-label">Email</label>
                                                        <input name="email" required class="form-control"
                                                            value="{{ $user->email }}" type="text">
                                                    </div>
                                                    <div class="my-2">
                                                        <label class="form-label">Assign Role</label>
                                                        <select class="form-select" required
                                                            aria-label=".form-select-lg example" name="role">
                                                            @foreach ($roles as $role)
                                                                @if ($role->id != 1)
                                                                    <option
                                                                        @if ($user->roles[0]->name == $role->name) selected @endif
                                                                        value="{{ $role->name }}">
                                                                        {{ $role->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="row d-flex my-2">
                                                        <div class="col-6">
                                                            <label class="form-label">Password</label>
                                                            <input required class="form-control" type="password">
                                                        </div>
                                                        <div class="col-6">
                                                            <label class="form-label">Re-Type Pasword</label>
                                                            <input required class="form-control" type="password"
                                                                name="password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success ">Save</button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <div class="modal fade" id="deleteUser{{ $key }}" tabindex="-1"
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
                                                <p>Do you sure you want to delete this user?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form method="POST"
                                                    action="{{ route('delete-user', $user->id) }}">
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
    <div id="addNewUser" class="modal fade zoomIn" tabindex="-1" aria-labelledby="addNewUser"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="r">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('store-user') }}">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="my-2">
                            <label class="form-label">Name</label>
                            <input required name="name" required class="form-control" type="text">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Email</label>
                            <input required name="email" required class="form-control" type="text">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Assign Role</label>
                            <select class="form-select" required aria-label=".form-select-lg example" name="role">
                                @foreach ($roles as $role)
                                    @if ($role->id != 1)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="row d-flex my-2"">
                            <div class="col-6">
                                <label class="form-label">Password</label>
                                <input required required class="form-control" type="password">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Re-Type Pasword</label>
                                <input required class="form-control" type="password" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success ">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
