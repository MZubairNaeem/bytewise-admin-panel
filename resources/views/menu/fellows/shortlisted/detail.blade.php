@extends('layouts.master')
@section('title')
    Fellow
@endsection
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
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
            Fellow
        @endslot
    @endcomponent

    <div class="container my-5 d-flex justify-content-center align-items-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div class="col">
                        <h1 class="">Bytewise Limited - Fellowship - Batch 3</h1>
                        <div>
                            @include('partials.session')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="my-2">
                        <h5 class="form-label">Email</h5>
                        <p>{{ $fellow->email }}</p>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label">Full Name</h5>
                        <p>{{ $fellow->name }}</p>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label">Phone Number(WhatsApp)</h5>
                        <p>{{ $fellow->phone }}</p>

                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label">Resume</h5>
                        <a href="{{ asset('storage/' . $fellow->resume) }}" target="_blank">View Resume</a>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label">{{ $questions[0]->question }}</h5>

                        <p>{{ $answer1 }}</p>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label">{{ $questions[1]->question }}</h5>
                        <p>{{ $answer2 }}</p>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label">{{ $questions[2]->question }}</h5>

                        <p>{{ $answer3 }}</p>

                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label">{{ $questions[3]->question }}</h5>

                        <p>{{ $answer4 }}</p>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label">{{ $questions[4]->question }}</h5>

                        <p>{{ $answer5 }}</p>

                    </div>
                    <hr>
                    <div class="mt-3">
                        <div>
                            <button
                                class="btn 
                                                {{ $fellow->shortlisted == 1 ? 'btn-success' : 'btn-danger' }}
                                             btn-sm"
                                id="shortlist"
                                onclick="
                                                {{ $fellow->shortlisted == 1 ? 'notShortlist(' . $fellow->id . ')' : 'shortlist(' . $fellow->id . ')' }}
                                                ">
                                {{ $fellow->shortlisted == 1 ? 'Shortlisted' : 'Not Shortlisted' }}
                            </button>

                            <button
                                class="btn 
                                                {{ $fellow->selected == 1 ? 'btn-success' : 'btn-danger' }}
                                             btn-sm"
                                id="shortlist"
                                onclick="
                                                {{ $fellow->selected == 1 ? 'notSelect(' . $fellow->id . ')' : 'openModal()' }}
                                                ">
                                {{ $fellow->selected == 1 ? 'Selected' : 'Not Selected' }}
                            </button>
                        </div>
                    </div>
                    <div id="select" class="modal fade zoomIn" tabindex="-1" aria-labelledby="select" aria-hidden="true"
                        style="display: none;">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="select">Select and Assign Lead
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('selected-fellow', $fellow->id) }}">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-body">
                                        <div class="my-2">
                                            <label class="form-label">Select Lead</label>
                                            <select class="form-select" required aria-label=".form-select-lg example"
                                                name="lead">
                                                @foreach ($leads as $lead)
                                                    <option value="{{ $lead->id }}">{{ $lead->name }}</option>
                                                @endforeach
                                            </select>
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

                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="{{ URL::asset('assets/js/pages/modal.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('assets/js/pages/select2.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

<script>
    function shortlist(id) {
        console.log(id);
        axios.get(`/fellows/shortlist/${id}`)
            .then(response => {
                console.log(response.data);
                location.reload();
            })
            .catch(error => {
                console.log(error);
            });
    }

    function onClick() {
        console.log('clicked');
    }

    function notShortlist(id) {
        axios.get(`/fellows/not-shortlist/${id}`)
            .then(response => {
                console.log(response.data);
                location.reload();
            })
            .catch(error => {
                console.log(error);
            });
    }

    // function select(id) {
    //     axios.get(`/fellows/selected/${id}`)
    //         .then(response => {
    //             console.log(response.data);
    //             location.reload();
    //         })
    //         .catch(error => {
    //             console.log(error);
    //         });
    // }

    function notSelect(id) {
        axios.get(`/fellows/not-selected/${id}`)
            .then(response => {
                console.log(response.data);
                location.reload();
            })
            .catch(error => {
                console.log(error);
            });
    }

    function openModal() {
        // Code to open your select modal goes here
        // For example, if you're using Bootstrap modal:
        $('#select').modal('show'); // Replace 'myModal' with the ID of your modal
    }
</script>
