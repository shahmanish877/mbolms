@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ $user->name }}'s Profile </div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <tr>
                                <td>Name</td>
                                <td> {{ $user->name }} </td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td> {{ $user->user_name }} </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td> {{ $user->email }} </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td> {{ $user->address }} </td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td> {{ $user->gender }} </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    {{ status($user->user_status) }}
                                    @if($user->user_type != 1)
                                        @can('is_admin')
                                            <form action="{{ route('toggle_user_status') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{$user->id}}" name="user_id">
                                                <button type="submit" value="1" name="user_status" class="btn btn-success"> Accept </button>
                                                <button type="submit" value="2" name="user_status" class="btn btn-warning"> Pending </button>
                                            </form>
                                        @endcan
                                    @endif
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
