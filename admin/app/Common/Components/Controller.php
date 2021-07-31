<?php

namespace App\Common\Components;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class Controller extends \App\Http\Controllers\Controller {

    public $request;
    public $viewPathPrefix;
    public $viewPath;

    public function __construct(Request $request)
    {

        $this->request = $request;
//        if (method_exists($this, '__construct')) {
//            return parent::__construct();
//        }
        return true;
    }

    /**
     * 渲染模板
     * @param type $view
     * @param type $data
     * @param type $mergeData
     * @return type
     */
    public function render($view = null, $data = [], $mergeData = [])
    {
        return view($this->packPath($view), $data, $mergeData);
    }

    /**
     * 以json格式返回
     * @param type $data
     * @return Json
     */
    public function renderJson($data = [], $status = 200, array $headers = [], $options = 0)
    {
        return response()->json($data, $status, $headers, $options)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    /**
     * 跳转
     * @param type $to
     * @param type $status
     * @param type $headers
     * @param type $secure
     * @return type
     */
    public function redirect($to = null, $status = 302, $headers = [], $secure = null)
    {
        return redirect($this->packPath($to), $status, $headers, $secure);
    }

    /**
     * 拼接路径
     * @param type $path
     */
    protected function packPath($path)
    {
        if (stripos($path, '/') !== false || stripos($path, '.') !== false) {
//            $path = str_replace('/', '.', $path);
            return $path;
        }
        return $this->viewPathPrefix . '.' . $this->viewPath . '.' . $path;
    }

}
