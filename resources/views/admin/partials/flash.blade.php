@if ($message = Session::get('success'))
    <div class="alert alert-success" id="success-alert">
        <p>{{ $message }}</p>
        <div class="progress-bar" id="success-progress"></div>
    </div>
@elseif ($message = Session::get('error'))
    <div class="alert alert-danger" id="error-alert">
        <p>{{ $message }}</p>
        <div class="progress-bar" id="error-progress"></div>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
    .progress-bar {
        height: 2px;
        background-color: #0095e8; /* Adjust the color as per your preference */
        width: 100%;
        animation: progressBarAnimation 5s ease-out forwards;
    }

    @keyframes progressBarAnimation {
        to {
            width: 0;
        }
    }
</style>

<script>
    // Use setTimeout to hide the success and error alerts after a certain time
    setTimeout(function () {
        document.getElementById('success-alert').style.display = 'none';
        document.getElementById('error-alert').style.display = 'none';
    }, 5000); // Adjust the time (in milliseconds) as per your requirement
</script>
