<?php

// this function converts any amount of EUR to USD or vice versa
function convertCurrency($amount, $currencyOutput){
    
    // checks if $amount if in the right data type
    if(is_int($amount) || is_float($amount)){
        
        //checks if $currencyOutput is in the correct form
        if($currencyOutput === 'USD'){
            return $currencyOutput * 1.24;
        } elseif ($currencyOutput === 'EUR'){
            return $currencyOutput * 0.81;
        }
    }
    // returns nothing if the input data was invalid
}
?>