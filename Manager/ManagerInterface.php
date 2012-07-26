<?php

namespace Sly\PushOverBundle\Manager;

use Sly\PushOver\Model\PushInterface;

/**
 * ManagerInterface.
 */
interface ManagerInterface
{
    /**
     * Push message.
     *
     * @param string        $pusherName Pusher name
     * @param PushInterface $push       Push
     * 
     * @return boolean
     */
    public function push($pusherName, PushInterface $push);
}
