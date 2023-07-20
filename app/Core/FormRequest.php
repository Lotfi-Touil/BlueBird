<?php

namespace App\Core;

use App\Requests\Abstract\AFormRequest;

class FormRequest extends AFormRequest
{
    private array $rules;
    private array $messages;
    private array $errors;

    public function __construct(array $rules, array $messages)
    {
        $this->rules  = $rules;
        $this->messages  = $messages;
        $this->errors = [];

        parent::__construct();
    }

    public function validate(): ?\ArrayObject
    {
        $data = $this->getRequest()->getPost();

        foreach ($this->rules as $field => $rules) {
            $fieldValue = isset($data[$field]) ? $data[$field] : null;
            $fieldErrors = $this->validateField($field, $fieldValue, $rules);

            if (!empty($fieldErrors)) {
                $this->errors[$field] = $fieldErrors;
            }
        }

        if (!empty($this->errors)) {
            $this->setOldInput($data);
            return null;
        }

        return $data;
    }

    private function validateField($field, $value, $rules): array
    {
        $fieldErrors = [];

        foreach (explode('|', $rules) as $rule) {
            $ruleParts = explode(':', $rule);
            $ruleName = $ruleParts[0];
            $ruleParams = isset($ruleParts[1]) ? explode(',', $ruleParts[1]) : [];

            switch ($ruleName) {
                case 'required':
                    $cleanedValue = strip_tags(html_entity_decode(trim($value)));
                    if (empty($cleanedValue)) {
                        $fieldErrors[] = $this->messages[$field . ".$rule"];
                    }
                    break;

                case 'string':
                    if (!is_string($value)) {
                        $fieldErrors[] = $this->messages[$field . ".$rule"];
                    }
                    break;

                case 'numeric':
                    if (!is_numeric($value)) {
                        $fieldErrors[] = $this->messages[$field . ".$rule"];
                    }
                    break;

                case 'date':
                    if (strtotime($value) === false) {
                        $fieldErrors[] = $this->messages[$field . ".$rule"];
                    }
                    break;

                case 'time':
                    if (strtotime($value) === false) {
                        $fieldErrors[] = $this->messages[$field . ".$rule"];
                    }
                    break;

                case 'integer':
                    if (!filter_var($value, FILTER_VALIDATE_INT)) {
                        $fieldErrors[] = $this->messages[$field . ".$rule"];
                    }
                    break;

                case 'email':
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fieldErrors[] = $this->messages[$field . ".$rule"];
                    }
                    break;

                case 'max':
                    $maxLength = intval($ruleParams[0]);
                    if (strlen($value) > $maxLength) {
                        $fieldErrors[] = $this->messages[$field . ".$rule"];
                    }
                    break;

                case 'min':
                    $minLength = intval($ruleParams[0]);
                    if (strlen($value) < $minLength) {
                        $fieldErrors[] = $this->messages[$field . ".$rule"];
                    }
                    break;

                case 'in':
                    $allowedValues = array_slice($ruleParams, 0);
                    if (!in_array($value, $allowedValues)) {
                        $fieldErrors[] = $this->messages[$field . ".$rule"];
                    }
                    break;

                case 'same':
                    $otherField = $ruleParams[0];
                    if ($value !== $this->getRequest()->getPost($otherField)) {
                        $fieldErrors[] = $this->messages[$field . ".$rule"];
                    }
                    break;

                default:
                    $fieldErrors[] = 'Une erreur est survenue';
                    break;
            }
        }

        return $fieldErrors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addError($field, $error): void
    {
        $this->errors[$field] = [$error];
    }

    public function getOld()
    {
        return isset($_SESSION['old_input']) ? $_SESSION['old_input'] : [];
    }

    public function setOldInput($data): void
    {
        $_SESSION['old_input'] = $data;
    }

}