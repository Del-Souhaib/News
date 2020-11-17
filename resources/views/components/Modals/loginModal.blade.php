<style>
    #loginmodal {
        color: white;
    }

    #loginmodal a:hover{
        color: white;
    }
    #loginmodal #passwordreset{
        cursor: pointer;
    }
</style>
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="login">تسجيل الدخول</h2>

                <button type="button" class="close2" data-dismiss="modal" aria-label="Close">
                    <svg width="40px" height="40px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <x-layouts.login/>
            </div>
        </div>
    </div>
</div>
