<?php
/**
 * Created by PhpStorm.
 * User: jeffersson sinza
 * Date: 19/05/2015
 * Time: 9:46
 */

namespace App\Validators;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as  validar;
class  Validator {

    private $rules;
    private $request;
    private $messages;
    private $accept=false;

    function __construct($rules,Request $request)
    {
        $this->rules = $rules;
        $this->request=$request;
        $this->validator();
    }

    public   function  validator(){
        $validator=validar::make($this->request->all(),$this->rules);
        if ($validator->fails()){
           $this->messages=$validator->messages();
        }else{
            $this->accept=true;
        }
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setRequest($request)
    {
        $this->request = $request;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    public function isAccept()
    {
        return $this->accept;
    }


    public function setAccept($accept)
    {
        $this->accept = $accept;
    }



}