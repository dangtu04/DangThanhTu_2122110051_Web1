{{-- @if (session('message'))
    @php
    $arrMessage = session('message');
    @endphp
    <div class="alert alert-{{ $arrMessage['type'] }} alert-dismissible fade show" role="alert">
        <strong>Thông báo</strong> {{ $arrMessage['msg'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
@endif --}}

@if (session('message'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div class="toast align-items-center text-bg-{{ session('message')['type'] }} border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('message')['msg'] }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
