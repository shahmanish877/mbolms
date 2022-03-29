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
