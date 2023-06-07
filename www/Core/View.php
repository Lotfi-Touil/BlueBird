<?php

namespace App\Core;

class View {

    private String $view;
    private String $template;
    private Array $data = [];
    private Array $scripts = [];

    public function __construct(String $view, String $template = "back") {
        $this->setView($view);
        $this->setTemplate($template);
    }

    public function assign(String $key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function addScript(String $scriptPath): void
    {
        if (file_exists($scriptPath)) {
            $this->scripts[] = $scriptPath;
        } else {
            die("La script ".$scriptPath." n'éxiste pas");
        }
    }

    /**
     * @param String $view
     * @return void
     */
    private function setView(String $view): void
    {
        $this->view = "Views/".$view.".view.php";
        if (!file_exists($this->view)) {
            die("La vue ".$this->view." n'éxiste pas");
        }
    }

    /**
     * @param String $template
     * @return void
     */
    private function setTemplate(String $template): void
    {
        $this->template = "Views/".$template.".tpl.php";
        if (!file_exists($this->view)) {
            die("Le template ".$this->view." n'éxiste pas");
        }
    }

    public function partial(String $name, array $config = [], array $errors = []) {
        if (!file_exists(PARTIALS_PATH.$name.PARTIALS_EXT)) {
            die("Le partial ".$name." n'éxiste pas");
        }
        include PARTIALS_PATH.$name.PARTIALS_EXT;
    }

    public function __destruct()
    {
        extract($this->data);
        include $this->template;
    }
}