<?php

namespace DeVos\Laravel\Validation\LicenseNumber\Rules;

class DutchLicenseNumber
{
    private const LICENSE_NUMBER_EXPRESSIONS = [
        '[^0-9]{2}\d{2}\d{2}', // XX-99-99
        '\d{2}\d{2}[A-Z]{2}', // 99-99-XX
        '\d{2}[A-Z]{2}\d{2}', // 99-XX-99
        '[A-Z]{2}\d{2}[A-Z]{2}', // XX-99-XX
        '[A-Z]{2}[A-Z]{2}\d{2}', // XX-XX-99
        '\d{2}[A-Z]{2}[A-Z]{2}', // 99-XX-XX
        '\d{2}[A-Z]{3}\d{1}', // 99-XXX-9
        '\d{1}[A-Z]{3}\d{2}', // 9-XXX-99
        '[A-Z]{2}\d{3}[A-Z]{1}', // XX-999-X
        '[A-Z]{1}\d{3}[A-Z]{2}', // X-999-XX
        '[A-Z]{3}\d{2}[A-Z]{1}', // XXX-99-X
        '[A-Z]{1}\d{2}[A-Z]{3}', // X-99-XXX
        '\d{1}[A-Z]{2}\d{3}', // 9-XX-999
        '\d{3}[A-Z]{2}\d{1}', // 999-XX-9
    ];

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @param array $parameters
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return bool
     */
    public function __invoke(
        $attribute,
        $value,
        $parameters,
        $validator
    ) {
        $licenseNumber = strtoupper(str_replace('-', '', $value));

        preg_match(
            sprintf('/%s/', implode('|', self::LICENSE_NUMBER_EXPRESSIONS)),
            $licenseNumber,
            $matches
        );

        return in_array($licenseNumber, $matches);
    }
}