<?php

namespace Sly\PushOverBundle\Manager;

use Sly\PushOver\Model\PushInterface;
use Sly\PushOverBundle\Manager\PushesCollection;

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

    /**
     * Get sent pushes.
     * 
     * @return PushesCollection
     */
    public function getSentPushes();
}
