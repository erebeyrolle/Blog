<?php
class ResponseFail extends Response
{
    function __construct($success,$message){
        parent::__construct($success,$message);
        
    }
}
?>