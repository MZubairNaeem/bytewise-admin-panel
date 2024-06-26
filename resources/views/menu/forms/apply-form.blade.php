@extends('layouts.master-without-nav')
@section('title')
    Apply
@endsection

@section('content')
    <div class="container my-5 d-flex justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div class="col">
                        <h1 class="">Bytewise Limited - Fellowship - Batch 3</h1>
                        <div class="row">
                            <img src="{{ URL::asset('images/header-white.png') }}" alt="">
                        </div>
                        <div>
                            @include('partials.session-apply')
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('submitform') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="my-2">
                            <label class="form-label">Email<span class="text-danger"> *</span></label>
                            <input class="form-control" required type="text" name="email">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Full Name<span class="text-danger"> *</span></label>
                            <input class="form-control" required type="text" name="name">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Phone Number(WhatsApp)<span class="text-danger"> *</span></label>
                            <input required class="form-control" type="text" name="phone">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Resume<span class="text-danger"> *</span></label>
                            <input required class="form-control" id="resume" type="file" name="resume">
                            <span id="resume-error" class="text-danger"></span>
                        </div>

                        <div class="my-2">
                            <label class="form-label">{{ $questions[0]->question }}<span class="text-danger">
                                    *</span></label>
                            <div class="col-12">
                                <textarea required name="q{{ $questions[0]->id }}" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="my-2">
                            <label class="form-label">{{ $questions[1]->question }}<span class="text-danger">
                                    *</span></label>
                            <div class="col-12">
                                <textarea required name="q{{ $questions[1]->id }}" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="my-2">
                            <label class="form-label">{{ $questions[2]->question }}</label>
                            <textarea name="q{{ $questions[2]->id }}" class="form-control" rows="2"></textarea>

                        </div>
                        <div class="my-2">
                            <label class="form-label">{{ $questions[3]->question }}<span class="text-danger">
                                    *</span></label>
                            @foreach ($tracks as $track)
                                <div class="track-row">
                                    <input required type="radio" id="track_{{ $track->id }}"
                                        name="q{{ $questions[3]->id }}" value="{{ $track->name }}{{ $track->id }}">
                                    <label for="track_{{ $track->id }}">{{ $track->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="my-2">
                            <label class="form-label">{{ $questions[4]->question }}</label>
                            <textarea name="q{{ $questions[4]->id }}" class="form-control" rows="2"></textarea>

                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/password-addon.init.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('resume').addEventListener('change', function() {
            var fileInput = this;
            var file = fileInput.files[0];
            var allowedTypes = ['application/pdf'];
            var maxFileSize = 2 * 1024 * 1024; // 2MB

            if (file) {
                if (allowedTypes.indexOf(file.type) === -1) {
                    document.getElementById('resume-error').textContent = 'Please select a PDF file.';
                    fileInput.value = ''; // Clear the file input
                } else if (file.size > maxFileSize) {
                    document.getElementById('resume-error').textContent = 'File size exceeds 2MB.';
                    fileInput.value = ''; // Clear the file input
                } else {
                    document.getElementById('resume-error').textContent = '';
                }
            }
        });
    });
</script>
