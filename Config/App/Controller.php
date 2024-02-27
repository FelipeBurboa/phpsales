<?php
class Controller
{
    protected $views, $model;
    public function __construct()
    {
        $this->views = new Views();
        $this->modelLoader();
    }
    public function modelLoader()
    {
        $model = get_class($this) . "Model";
        $ruta = "Models/" . $model . ".php";
        if (file_exists($ruta)) {
            require_once $ruta;
            $this->model = new $model();
        }
    }
}
