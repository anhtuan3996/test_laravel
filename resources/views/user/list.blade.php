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
                Email
            </th>
            <th>
                Created
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>
                    {{ $user->id }}
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4"><h3 class="text-center">NO DATA</h3></td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $users->appends(request()->query())->links() }}

@endsection
