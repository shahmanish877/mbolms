@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div>
                    <form action="{{ route('loans.create')}}">
                        <input type="hidden" name="user_id" value="{{ app('request')->input('user_id') ?? '' }}">
                        <input type="submit" value="New Loan" class="btn btn-success">
                    </form>
                </div>

                <div class="card">
                    <div class="card-header row align-items-center">
                        <div class="col-md-8">
                            All Loans
                        </div>
                        <div class="col-md-4">
                            @include('loans.filter')
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Loan Type</th>
                                <th scope="col">Loan Status</th>
                                <th scope="col">Loan Terms</th>
                                <th scope="col">Inst. Amt. (Per Month)</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($loans as $loan)
                                <tr>
                                    <th scope="row"> {{ $loan->id }} </th>
                                    <td> {{ $loan->user->name }} </td>
                                    <td> {{ $loan->user->email }} </td>
                                    <td> {{ loan_type()[$loan->loan_type] }} </td>
                                    <td> {{ status($loan->loan_status) }} </td>
                                    <td> {{ $loan->loan_terms }} year </td>
                                    <td> Rs. {{ $loan->installment_amount }} </td>
                                    <td>
                                        <a href="{{ route('loans.show',$loan->id) }}" class="btn btn-primary"> View Loan </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $loans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
