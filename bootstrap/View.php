<?php


namespace Core;


trait View
{
    /**
     * @throws \Exception
     */
    public function render($view, $params = [])
    {
        $position = strpos($view, ".");
        if ($position){
            $view = str_replace(".", "/", $view);
        }

        if (is_readable(APP_ROOT."/views/$view.php"))
        {
            return $this->generateView($view, $params);
        }else{
            throw new \Exception("404 PAGE NOT FOUND", 404);
        }
    }

    /**
     * @throws \Exception
     */
    private function generateView($view, $params)
    {
        foreach ($params as $key => $value){
            $$key = $value;
        }

        ob_start();
        require_once APP_ROOT."/views/$view.php";
        echo ob_get_clean();
        return true;
    }
}