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
        'email'         => '[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+[.]+[a-z-A-Z]'
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
        foreach ($payload as $index => $value) {
            $rules = explode(',', $rules[$index]);

            foreach ($rules as $rule) {
                $this->validateRule($rule, $value, $index);
            }
        }

        return $this->isValid
            ? $payload
            : $this->errors;
    }

    private function validateRule(string $rule, mixed $value, string $index): void
    {
        if ($rule === 'required' && !isset($value)) {
            $this->isValid = false;
            $this->errors[$index] = 'Обязательно к заполнению';
            return;
        }

        if (!preg_match($this->patterns[$rule], $value)) {
            $this->isValid = false;
            $this->errors[$index] = 'Неверный тип значения';
        }
    }
}
