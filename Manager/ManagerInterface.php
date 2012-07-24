<?php

namespace Sly\PushOverBundle\Manager;

interface ManagerInterface
{
    /**
     * Set message (with or without options).
     * 
     * @param string $message Message
     * @param array  $options Options
     */
    public function setMessage($message, array $options = array());

    /**
     * Push message.
     * 
     * @return boolean
     */
    public function push();
}
