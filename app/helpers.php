<?php

if (! function_exists('loan_type')) {
    function loan_type()
    {
        return array(
          'PL' => 'Personal Loan',
          'HL' => 'Home Loan',
          'SL' => 'Student Loan',
          'AL' => 'Auto Loan'
        );

    }
}

if (! function_exists('status')) {
    function status($status)
    {
        if($status == 1){
            return 'Approved';
        }else if($status == 2){
            return 'Pending';
        }else if($status == 3){
            return 'Rejected';
        }

    }
}
