
<div class="modal fade" id="contactmodal" tabindex="-1" role="dialog" aria-labelledby="contact" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h2 class="modal-title">ارسال رسالة</h2>
                <button type="button" class="close2" data-dismiss="modal" aria-label="Close">
                    <svg width="40px" height="40px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <x-layouts.message/>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="success" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h2 class="modal-title"> رسالة</h2>
                <button type="button" class="close2" data-dismiss="modal" aria-label="Close">
                    <svg width="40px" height="40px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <p>تم ارسال رسالتك بنجاح !</p>
            </div>

        </div>
    </div>
</div>
<script>
    /**Ajax**/
    $('#contact').on('click', function () {
        $.ajax({
            url: "{{url('/sendmessage')}}",
            type: "post",
            data: {
                "_token":"{{csrf_token()}}",
                "name":document.getElementById("messagename").value,
                "email":document.getElementById("messageemail").value,
                "message":document.getElementById("message").value,
            },
            success: function () {
                $('#contactmodal').modal('hide')
                $('#successmodal').modal('show')
            },
            error: function (response) {
                $('#messageerrors').text('')
                $response = response.responseJSON
                $.each($response.errors, function (key, val) {
                    $('#messageerrors').append(
                      "<li>"+val[0]+"</li>"
                    )
                })
            }
        })
    });
</script>
