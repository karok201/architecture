<?php

namespace App\Packages\UseCases;

class Validator
{
    public $patterns = array(
        'uri'           => '[A-Za-z0-9-\/_?&=]+',
        'url'           => '[A-Za-z0-9-:.\/_?&=#]+',
        'alpha'         => '[\p{L}]+',
        'words'         => '[\p{L}\s]+',
        'alphanum'      => '[\p{L}0-9]+',
        'int'           => '[0-9]+',
        'float'         => '[0-9\.,]+',
        'tel'           => '[0-9+\s()-]+',
        'text'          => '[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',
        'file'          => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+\.[A-Za-z0-9]{2,4}',
        'folder'        => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+',
        'address'       => '[\p{L}0-9\s.,()°-]+',
        'date_dmy'      => '[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}',
        'date_ymd'      => '[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}',
        'email'         => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i'
    );

    /**
     * Is form valid;
     *
     * @var bool
     */
    private bool $isValid = true;
    /**
     * List of errors, assoc array with error messages one per fieldName
     *
     * @var array
     */
    private array $errors = [];

    /**
     * @param array $rules list of rules
     * @param array $payload list of form parameters
     */
    public function validate(array $rules, array $payload): array
    {
        foreach ($rules as $index => $value) {
            $rule = str_contains($value, '|')
                ? explode('|', $value)
                : [$value]
            ;

            $this->validateRule($rule, $payload, $index);
        }

        return $this->isValid
            ? $payload
            : $this->errors;
    }

    private function validateRule(array $rule, array $payload, string $index): void
    {
        foreach ($rule as $value) {
            if ($value === 'required' && (!isset($payload[$index]) || $payload[$index] === '')) {
                $this->isValid = false;
                $this->errors[$index] = 'required';
                break;
            }

            if ($value !== 'required' && !preg_match($this->patterns[$value], $payload[$index])) {
                $this->isValid = false;
                $this->errors[$index] = 'incorrect type';
                break;
            }
        }
    }
}
