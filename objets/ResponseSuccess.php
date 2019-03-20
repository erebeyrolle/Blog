<?php
class ResponseSuccess extends Response
{
    public $_object;

    function __construct($success,$message,$object){
        parent::__construct($success,$message);
        $this->_object = $object;
    }
}
?>