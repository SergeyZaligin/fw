<?php

namespace engine\libs;

/**
 * Class for validation data
 *
 * @author sergey
 */
class Validator 
{
    public $data;

    public function __construct($data) 
    {
        $this->data = $data;
    }
}
