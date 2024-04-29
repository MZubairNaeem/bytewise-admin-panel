@extends('layouts.master')
@section('title')
    Group-links
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Group-links
        @endslot
    @endcomponent
    <div class="container my-5 d-flex justify-content-center align-items-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div class="col">
                        <h1 class="">Fellowship - Group Links</h1>
                        <div>
                            @include('partials.session')
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('store-links') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="my-2">
                            <label class="form-label">Laravel</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">UI/UX</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Django</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Flask</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Frontend</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">MERN</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Flutter</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Data Engg</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Cyber Security</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">C# .NET</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Data Science</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">NLP</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">AWS</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Machine Learning/Deep Learning</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">DevOps</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Product Management</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Game Dev</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">SEO</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">React/Next</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Android(Kotlin)</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Project Management</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Azure</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">iOS Dev</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Blockchain</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Personal & Profession Dev</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
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

    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
