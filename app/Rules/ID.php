<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ID implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     * @author yunis hawash <yunis.hawash@gmail.com>
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $empID)
    {

      if( ! strlen($empID)) {
        return true;
      }

      $primaryDigits = substr($empID, 0, -1);
      $primaryDigitsArray = str_split($primaryDigits, 1);
      $i = 2;// to check whether the digit must be multiplied by 1 or 2
      $sumDigitsString = '';//string concatinated from all digits multiplied

      foreach ($primaryDigitsArray as $key => $digit) {
        $result = (string)(($i%2 == 0)? ($digit * 1) : ($digit * 2));
        $sumDigitsString .= $result;
        $i++;
      }

      $sum = 0;

      $sumDigitsStringArray = str_split($sumDigitsString, 1);

      foreach ($sumDigitsStringArray as $key => $sumStringDigit) {
        $sum+= $sumStringDigit;
      }


      $lastCharInSum = substr((string)$sum, -1);
      $predictedIdLastDigit = ($lastCharInSum == 0 )?0:(10 - $lastCharInSum);
      $lastCharInId = substr((string) $empID, -1);

      return $predictedIdLastDigit == $lastCharInId;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('messages.validate_incorrect_palestinian_id');
    }
}
