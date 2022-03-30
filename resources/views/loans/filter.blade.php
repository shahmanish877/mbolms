<form action=""  class="d-flex">
    <select class="form-select form-select-sm" name="loan_type">
        <option value="" selected>All Loan Type</option>
        @foreach(loan_type() as $key => $value)
            <option value="{{ $key }}" {{ (old('loan_type', app('request')->input('loan_type')) == $key ? 'selected' : '') }}>
                {{$value}}
            </option>
        @endforeach
    </select>

    <input type="submit" value="Filter" class="btn btn-success">
</form>

