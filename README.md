Phalcon Validators
==================

Extra validators for Phalcon PHP Framework

Validators usage
------------

### LengthValidator

    class Customers extends \Phalcon\Mvc\Model
    {

        public function validation()
        {
            $this->validate(new \Skp\Mvc\Model\Validator\LengthValidator(array(
                    'field' => 'total',
                    'min'   => 1,
                    'max'   => 10
            )));

            return $this->validationHasFailed() != true;
        }

    }