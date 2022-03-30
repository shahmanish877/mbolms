@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            {{ $loan->user->name }}'s Loan
                        </div>
                        <div>
                            <a href="{{ route('loans.index') }}" class="btn btn-warning">Back</a>
                        </div>
                     </div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <tr>
                                <td>Name</td>
                                <td> {{ $loan->user->name }} </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td> {{ $loan->user->email }} </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td> {{ $loan->user->address }} </td>
                            </tr>
                            <tr>
                                <td>Loan Type</td>
                                <td> {{ loan_type()[$loan->loan_type] }} </td>
                            </tr>
                            <tr>
                                <td>Loan Terms</td>
                                <td> {{ $loan->loan_terms }} Year </td>
                            </tr>
                            <tr>
                                <td>Installment Amount (Per Month)</td>
                                <td> Rs. {{ $loan->installment_amount }} </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    {{ status($loan->loan_status) }}
                                    @can('is_admin')
{{--                                        <a href="{{ route('toggle_loan_status',$loan->id) }}" class="btn btn-primary">--}}
{{--                                            @if($loan->loan_status == 1)--}}
{{--                                                Change to Pending--}}
{{--                                            @elseif($loan->loan_status == 2)--}}
{{--                                                Change to Active--}}
{{--                                            @endif--}}
{{--                                        </a>--}}
                                        <form action="{{ route('toggle_loan_status') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$loan->id}}" name="loan_id">
                                            <button type="submit" value="1" name="loan_status" class="btn btn-success"> Accept </button>
                                            <button type="submit" value="2" name="loan_status" class="btn btn-warning"> Pending </button>
                                            <button type="submit" value="3" name="loan_status" class="btn btn-danger"> Reject </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
