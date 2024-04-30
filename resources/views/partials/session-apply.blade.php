<!-- Success Session Message -->
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" id="successMessage" role="alert">
        <strong>Success!</strong> {{ $message }}
        <div>
            <a href="https://chat.whatsapp.com/K4kGu8F0gM2JY9Y1z8vv2p" target="_blank">
                https://chat.whatsapp.com/K4kGu8F0gM2JY9Y1z8vv2p
            </a>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Warning Session Message -->
@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade show" id="successMessage" role="alert">
        <strong>Warning!</strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    // Function to hide the success message after 10 seconds
    // function hideSuccessMessage() {
    //     var successMessage = document.getElementById('successMessage');
    //     if (successMessage) {
    //         setTimeout(function() {
    //             successMessage.style.display = 'none';
    //         }, 15000); // 10 seconds
    //     }
    // }

    // // Call the function when the page is loaded
    // window.onload = hideSuccessMessage;
</script>
