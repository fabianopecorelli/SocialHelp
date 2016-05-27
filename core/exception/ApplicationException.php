<?php

/**
 * Created by PhpStorm.
 * User: Elvira
 * Date: 23/11/15
 * Time: 18:00
 */
class ApplicationException extends Exception {
    private $description;

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Construct the exception. Note: The message is NOT binary safe.
     * @link http://php.net/manual/en/exception.construct.php
     * @param string $message [optional] The Exception message to throw.
     * @param int $code [optional] The Exception code.
     * @param Exception $previous [optional] The previous exception used for the exception chaining. Since 5.3.0
     */
    public function __construct($message, $description = "", $code = 0, Exception $previous = null) {
        $this->description = $description;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    public function __toString() {
        return parent::__toString() . " description=" . $this->description;
    }
}