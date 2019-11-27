@extends('layouts.app')
@section('content')
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                Name
            </th>
            <th>
                Code
            </th>
            <th>
                Created
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($nations as $nation)
            <tr>
                <td>
                    {{ $nation->id }}
                </td>
                <td>{{$nation->name}}</td>
                <td>{{$nation->code}}</td>
                <td>{{$nation->created_at}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4"><h3 class="text-center">NO DATA</h3></td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $nations->appends(request()->query())->links() }}

@endsection
