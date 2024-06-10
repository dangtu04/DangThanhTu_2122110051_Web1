@if (session('message'))
    @php
    $arrMessage = session('message');
    @endphp
    <div class="alert alert-{{ $arrMessage['type'] }} alert-dismissible fade show" role="alert">
        <strong>Thông báo</strong> {{ $arrMessage['msg'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>    
@endif
