<div class="col-12">
    <div class="error" id="messages-errors">
        @if (count($errors->all()))
            <div class="alert alert-danger" id="hasErrors">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
