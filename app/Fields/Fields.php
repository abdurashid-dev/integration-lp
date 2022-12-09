<?php

namespace App\Fields;

class Fields
{
    protected $name;
    protected $rules;
    protected $defaultRules;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
        return $this;
    }

    public function getRules()
    {
        $rules = explode('|', $this->rules);
        $defaultRules = explode('|', $this->defaultRules);
        return array_merge($rules, $defaultRules);
    }

    public static function make($name)
    {
        $class = get_called_class();
        return new $class($name);
    }
}
