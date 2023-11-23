@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    &nbsp;&nbsp;&nbsp;

                    @php
                        $users = \App\Models\User::all();
                    @endphp

                    <form action="{{ route('push') }}" method="post">
                        @csrf

                        <select name="users[]" multiple class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-outline-primary btn-block">
                            Make a Push Notification!</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
