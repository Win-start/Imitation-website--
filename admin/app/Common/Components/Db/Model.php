<?php

namespace App\Common\Components\Db;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;

//use Illuminate\Database\Eloquent\Model;

class Model extends \Illuminate\Database\Eloquent\Model {

    /**
     * 模型中日期字段的存储格式
     *  U
     * @var string
     */
    protected $dateFormat = 'U';

    public function validateData(array $options = array())
    {
        Validator::make();
        if (!$this->validate()) {
            return false;
        }
//        return Validator::make($data, $this->rules());
        return parent::save($options);
    }
    
    public function loadField(Request $request)
    {
        
    }
    
//
//    public function rules()
//    {
//        return [];
//    }
//
//    public function attributes()
//    {
//        return [];
//    }

}
