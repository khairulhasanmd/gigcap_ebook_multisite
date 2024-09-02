<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        console.log('here');
        // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // console.log('token', CSRF_TOKEN);
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $.ajax({
            type: "GET",
            url: '{{ url("update-user-performance") }}',
            data:({
                sub_id: "{{ Request::get('sub_id') }}",
                concept_id: " {{ Request::get('concept_id') }}",
                subtopic_id: "{{ Request::get('subtopic_id') }}"
            }),
            dataType: 'JSON',
            success: function (response) {
                if (response.status) {
                    parent.postMessage({ message: "response"},"*");
                }
            },
            error: function () {
                alert('Something went wrong, Please try again.');
            }
        });
    });
</script>
