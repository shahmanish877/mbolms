@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Loan Calculator </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="loan_type" class="col-md-4 col-form-label text-md-end">Loan Type</label>

                            <div class="col-md-6">
                                <select id="loan_type" class="form-control">
                                    @foreach(loan_type() as $key => $value)
                                        <option value="{{ $key }}">
                                            {{$value}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="loan_terms" class="col-md-4 col-form-label text-md-end">Loan Terms (in year)</label>

                            <div class="col-md-6">
                                <input id="loan_terms" type="number" step="1" class="form-control" placeholder="Must be Greater than 1 year">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="installment_amount" class="col-md-4 col-form-label text-md-end">Installment Amount(Per Month)</label>

                            <div class="col-md-6">
                                <input id="installment_amount" type="number" class="form-control" placeholder="Must be Greater than 1000" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="amount_to_pay" class="col-md-4 col-form-label text-md-end">Total Amount to Pay</label>

                            <div class="col-md-6">
                                <input id="amount_to_pay" type="number" class="form-control"  value="0" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/my-js.js') }}" defer async></script>
@endsection
