<?php

namespace Spko;

/**
 * Class MultiException
 * @package Spko
 */
class MultiException extends \Exception
{
    protected $errors = [];

    /**
     * @param \Exception $e object
     */
    public function add(\Exception $e)
    {
        $this->errors[] = $e;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->errors;
    }

    /**
     * @return bool
     */
    public function empty()
    {
        return empty($this->errors);
    }
}
