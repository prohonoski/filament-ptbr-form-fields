<?php

namespace Proho\FilamentPtbrFormFields\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Proho\FilamentPtbrFormFields\FilamentPtbrFormFields
 */
class FilamentPtbrFormFields extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Proho\FilamentPtbrFormFields\FilamentPtbrFormFields::class;
    }
}
