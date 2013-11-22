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
                'field' => 'age',
                'min'   => 18,
                'max'   => 25
            )));

            return $this->validationHasFailed() != true;
        }

    }

### AtLeastOneValidator

    class Customers extends \Phalcon\Mvc\Model
    {

        public function validation()
        {
            $this->validate(new \Skp\Mvc\Model\Validator\AtLeastOne(array(
                'fields' => array('age', 'name', 'email')
            )));

            return $this->validationHasFailed() != true;
        }

    }

### CpfValidator

    class Customers extends \Phalcon\Mvc\Model
    {

        public function validation()
        {
            $this->validate(new \Skp\Mvc\Model\Validator\CpfValidator(array(
                'field' => 'cpf'
            )));

            return $this->validationHasFailed() != true;
        }

    }