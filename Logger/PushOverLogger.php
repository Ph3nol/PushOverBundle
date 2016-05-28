<?php

namespace Sly\PushOverBundle\Logger;

use Psr\Log\LoggerInterface;
use Sly\PushOver\Model\PushInterface;
use Sly\PushOverBundle\Manager\PushesCollection;

/**
 * PushOverLogger.
 */
class PushOverLogger
{
    protected $logger;
    protected $sentPushes;

    /**
     * Constructor.
     *
     * @param LoggerInterface  $logger           A LoggerInterface instance
     * @param PushesCollection $pushesCollection Pushes collection
     */
    public function __construct(LoggerInterface $logger = null, PushesCollection $pushesCollection)
    {
        $this->logger     = $logger;
        $this->sentPushes = $pushesCollection;
    }

    /**
     * Log sent push.
     * 
     * @param PushInterface $push Push
     */
    public function logSentPush(PushInterface $push)
    {
        $this->sentPushes->set($push);
    }

    /**
     * Get sent pushes.
     * 
     * @return array
     */
    public function getSentPushes()
    {
        return (array) $this->sentPushes->getPushes();
    }
}
