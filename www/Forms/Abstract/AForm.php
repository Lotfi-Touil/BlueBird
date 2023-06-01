<?php
namespace App\Forms\Abstract;

use App\Forms\Interfaces\IForm;

abstract class AForm implements IForm
{
    abstract public function getConfig(): array;
    public function isSubmit(): bool
    {
        $data = ($this->getMethod() == "post")?$_POST:$_GET;
        if(empty($data["submit"]))
            return false;
        return true;
    }

    public function getMethod(): string
    {
        return strtolower($this->method);
    }
}