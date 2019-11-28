@extends('layouts.app')
@section('content')
    <h1 class="text-center">Add nation</h1>

    @include('_components.errors')

    <form action="{{route('nations.store')}}" method="post" id="submit-store-nation">
        @csrf
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="pwd">Code:</label>
            <input type="text" class="form-control" name="code" value="{{old('code')}}">
        </div>
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</button>
    </form>


{{--    <div class="modal fade" id="myModal">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}

{{--                <!-- Modal Header -->--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title">Confrim</h4>--}}
{{--                    <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                </div>--}}

{{--                <!-- Modal body -->--}}
{{--                <div class="modal-body">--}}
{{--                    Do you want to add the city ?--}}
{{--                </div>--}}

{{--                <!-- Modal footer -->--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-warning btn-submit-store">OK</button>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
@push('scripts')
    <script src="{{asset('js/nation.js')}}"></script>
@endpush
