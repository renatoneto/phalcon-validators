<?php
namespace Skp\Mvc\Model\Validator;

use Phalcon\Mvc\Model\Validator;
use Phalcon\Mvc\Model\ValidatorInterface;

class LengthValidator extends Validator implements ValidatorInterface
{

    public function validate($model)
    {
        $field = $this->getOption('field');
        $value = (property_exists($this, $field)) ? $model->$field : false;

        if ($this->getOption('min') == '' && $this->getOption('max') == '') {
            throw new \LogicException('min or max is required for this validator');
        }

        return !(!$this->validateMin($value) || !$this->validateMax($value));
    }

    protected function validateMin($value)
    {
        $min = $this->getOption('min');

        if ($value < $min) {

            $this->appendMessage(
                sprintf('Can\'t be less than %s', $min),
                $this->getOption('field'),
                'LengthValidator.min'
            );

            return false;
        }

        return true;
    }

    protected function validateMax($value)
    {
        $max = $this->getOption('max');

        if ($value > $max) {

            $this->appendMessage(
                sprintf('Can\'t be greater than %s', $max),
                $this->getOption('field'),
                'LengthValidator.max'
            );

            return false;
        }

        return true;
    }

} 