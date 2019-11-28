<div class="col-lg-12">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(session('alert-' . $msg))
            <div class="flash-message animated fadeInLeft">
                <div class="alert alert-{{ $msg }}">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('alert-' . $msg) }}
                </div>
            </div>
        @endif
    @endforeach
</div>
