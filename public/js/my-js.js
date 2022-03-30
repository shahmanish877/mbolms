jQuery(function($){
    $("#loan_type").change(function(){
        loan_calculator()
    });

    $("#loan_terms, #installment_amount").keyup(function(){
        if($('#installment_amount').val() >= 1000){
            loan_calculator()
        }
    });

    function loan_calculator(){
        var loan_type = $('#loan_type').val()
        var loan_terms = $('#loan_terms').val()
        var installment_amount = $('#installment_amount').val()

        var interest = 0;

        var amount_to_pay = 0

        switch (loan_type){
            case 'PL':
                interest = 1.5;
                break;
            case 'HL':
                interest = 2;
                break;
            case 'SL':
                interest = 2.5;
                break;
            case 'AL':
                interest = 3;
                break;
        }

        amount_to_pay = (loan_terms * 12) * installment_amount * interest
        $('#amount_to_pay').val(amount_to_pay)

    }

});
