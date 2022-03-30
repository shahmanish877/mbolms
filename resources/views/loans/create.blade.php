@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('loans.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="user_id" class="col-md-4 col-form-label text-md-end"> User </label>

                                <div class="col-md-6">
                                    <select name="user_id" id="user_id" class="form-control  @error('user_id') is-invalid @enderror" required>

                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ (old('user_id') == $user->id ? 'selected' : '') }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="loan_type" class="col-md-4 col-form-label text-md-end">{{ __('Loan Type') }}</label>

                                <div class="col-md-6">
                                    <select name="loan_type" id="loan_type" class="form-control  @error('loan_type') is-invalid @enderror" required>

                                        @foreach(loan_type() as $key => $value)
                                            <option value="{{ $key }}" {{ (old('loan_type') == $key ? 'selected' : '') }}>
                                                {{$value}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('loan_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="loan_terms" class="col-md-4 col-form-label text-md-end">{{ __('Loan Terms (in year)') }}</label>

                                <div class="col-md-6">
                                    <input id="loan_terms" type="number" step="1" class="form-control @error('loan_terms') is-invalid @enderror" name="loan_terms" value="{{ old('loan_terms') }}" required autocomplete="loan_terms" autofocus>

                                    @error('loan_terms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="installment_amount" class="col-md-4 col-form-label text-md-end">{{ __('Installment Amount(Per Month)') }}</label>

                                <div class="col-md-6">
                                    <input id="installment_amount" type="number" class="form-control @error('installment_amount') is-invalid @enderror" name="installment_amount" value="{{ old('installment_amount') }}" required autocomplete="installment_amount" autofocus>

                                    @error('installment_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register New Loan
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
