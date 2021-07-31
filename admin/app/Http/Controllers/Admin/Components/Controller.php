<?php

namespace App\Http\Controllers\Admin\Components;

use Illuminate\Support\Facades\Request;
use Illuminate\Routing\Router;

class Controller extends \App\Common\Components\Controller {

    public $viewPathPrefix = 'admin';
    public $viewPath;

    public function __construct(\Illuminate\Http\Request $request)
    {
        // 根据类名称获取
        if (!$this->viewPath) {
            $className = explode('\\', get_class($this));
            $lowerName = strtolower(array_pop($className));
            $posIndex = strripos($lowerName, 'Controller');
            $this->viewPath = substr($lowerName, 0, $posIndex);
        }
        return parent::__construct($request);
    }

    public function render($view = null, $data = [], $mergeData = [])
    {
        $admin = session()->get('admin');
        $data = array_merge($data, ['admin' => $admin]);
        return parent::render($view, $data, $mergeData);
    }

}
