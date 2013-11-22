<?php
namespace Skp\Mvc\Model\Validator;

use Phalcon\Mvc\Model\Validator;
use Phalcon\Mvc\Model\ValidatorInterface;

/**
 * Code by Respect\Validation\Rules\Cpf
 * https://github.com/Respect/Validation/blob/develop/library/Respect/Validation/Rules/Cpf.php
 */
class CpfValidator extends Validator implements ValidatorInterface
{

    public function validate($model)
    {
        $field = $this->getOption('field');
        $value = (property_exists($model, $field)) ? $model->$field : false;

        if ($value === false) {
            throw new \InvalidArgumentException('field not found');
        }

        // Code ported from jsfromhell.com
        $c = preg_replace('/\D/', '', $value);

        if (strlen($c) != 11 || preg_match("/^{$c[0]}{11}$/", $c)) {
            return false;
        }

        for ($s = 10, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);

        if ($c[9] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        for ($s = 11, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);

        if ($c[10] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        return true;
    }

} 