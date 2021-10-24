<?php
namespace App\Traits;

trait Quantity 
{
    protected $customAttributes = ['quantity'];

    public function getQuantityAttribute()
    {
        return $this->customAttributes['quantity'];
    }

    public function setQuantityAttribute($value)
    {
        return $this->customAttributes['quantity'] = $value;
    }
}