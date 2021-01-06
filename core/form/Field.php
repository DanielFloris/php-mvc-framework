<?php

namespace app\core\form;

use app\core\Model;


/**
 * Class Field
 * 
 * @author daMask
 * @package app\core\form
 */
class Field extends BaseField
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASS = 'password';
    public const TYPE_NUM = 'number';
    public Model $model;
    public string $attribute;
    public string $type;
    public function __construct( Model $model, string $attribute){
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute; 
    }

    public function renderInput(): string { 
        return sprintf('<input type="%s"  name="%s" value = "%s" class="form-control %s">',
            $this->type,
            $this->attribute, 
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
        );
    }
    public function __toString()
    {
       return sprintf('
            <div class="mb-3">
                <label class="form-label">%s</label>
                %s
                <div class="invalid-feedback">%s</div>
            </div>
        ', 
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
    public function passwordField(){
            $this->type = self::TYPE_PASS;
            return $this;
    }
}
