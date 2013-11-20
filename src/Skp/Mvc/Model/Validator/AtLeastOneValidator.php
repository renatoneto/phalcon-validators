<?php
namespace Skp\Mvc\Model\Validator;

use Phalcon\Validation\Validator;
use Phalcon\Validation\ValidatorInterface;

class AtLeastOneValidator extends Validator implements ValidatorInterface
{

    public function validate($validator = null)
    {
        $fields = $this->getOption('fields');
        if (empty($fields) || !is_array($fields)) {
            throw new \InvalidArgumentException('AtLeastOne need a list of fields');
        }

        foreach ($fields as $field) {
            if (!empty($validator->$field)) {
                return true;
            }
        }

        $this->appendMessage(
            'At least one field must be filled',
            reset($fields),
            'AtLeastOne'
        );

        return false;
    }

}