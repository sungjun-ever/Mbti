<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class IsValidPassword implements Rule
{
    /**
     * Determine if the Length Validation Rule passes.
     *
     * @var boolean
     */
    public $lengthPasses = true;

    /**
     * Determine if the Uppercase Validation Rule passes.
     *
     * @var boolean
     */
    public $uppercasePasses = true;

    /**
     * Determine if the Numeric Validation Rule passes.
     *
     * @var boolean
     */
    public $numericPasses = true;

    /**
     * Determine if the Special Character Validation Rule passes.
     *
     * @var boolean
     */
    public $specialCharacterPasses = true;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->lengthPasses = (Str::length($value) >= 10);
        $this->uppercasePasses = (Str::lower($value) !== $value);
        $this->numericPasses = ((bool) preg_match('/[0-9]/', $value));
        $this->specialCharacterPasses = ((bool) preg_match('/[^A-Za-z0-9]/', $value));

        return ($this->lengthPasses && $this->uppercasePasses && $this->numericPasses && $this->specialCharacterPasses);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        switch (true) {
            case ! $this->uppercasePasses
                && $this->numericPasses
                && $this->specialCharacterPasses:
                return '비밀번호는 최소 10글자 이상, 최소 한 개 이상의 대문자를 포함해야합니다.';

            case ! $this->numericPasses
                && $this->uppercasePasses
                && $this->specialCharacterPasses:
                return '비밀번호는 최소 10글자 이상, 최소 한 개 이상의 숫자를 포함해야합니다.';

            case ! $this->specialCharacterPasses
                && $this->uppercasePasses
                && $this->numericPasses:
                return '비밀번호는 최소 10글자 이상, 최소 한 개 이상의 특수문자를 포함해야합니다.';

            case ! $this->uppercasePasses
                && ! $this->numericPasses
                && $this->specialCharacterPasses:
                return '비밀번호는 최소 10글자 이상, 최소 한 개 이상의 대문자 및 숫자를 포함해야합니다.';

            case ! $this->uppercasePasses
                && ! $this->specialCharacterPasses
                && $this->numericPasses:
                return '비밀번호는 최소 10글자 이상, 최소 한 개 이상의 대문자 및 특수문자를 포함해야합니다.';

            case ! $this->uppercasePasses
                && ! $this->numericPasses
                && ! $this->specialCharacterPasses:
                return '비밀번호는 최소 10글자 이상, 최소 한 개 이상의 대문자, 숫자, 특수문자를 포함해야합니다.';

            default:
                return '비밀번호는 최소 10글자 이상입니다.';
        }
    }
}
