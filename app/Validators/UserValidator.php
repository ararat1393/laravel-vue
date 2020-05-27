<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

trait UserValidator
{
    protected $validator;
    protected $errors;
    protected $scenario;

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:6',
            'phone' => 'required|min:7|unique:users',
            'cover_photo' => 'required'
        ];
    }
    /**
     * @param $scenario
     */
    public function setScenario( $scenario )
    {
        $this->scenario = $scenario;
    }

    /**
     * Array keys must be same user keys
     * @param array $array
     * @return User|void
     */
    public function loadAttributes( Array $array = [] )
    {
        $this->attributes = $array;
    }
    /**
     * @param array $input
     * @param int $id
     * @return bool
     */
    public function validate()
    {
        $validator = Validator::make($this->attributes, $this->rules());

        if ($validator->passes()) return true;

        $this->errors =  $validator->errors();

        return false;
    }

    /**
     * @param string $coulmn
     * @return mixed
     */
    public function getErrors(string $coulmn = '')
    {
        if( empty($coulmn) ){
            $errors = new \stdClass();
            foreach ($this->errors->getMessages() as $key => $message){
                $errors->$key = $message[0];
            }
            return $errors;
        }
        return $this->errors->get( $coulmn );
    }
}
