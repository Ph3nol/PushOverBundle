<?php

namespace Sly\PushOverBundle\Model;

use Sly\PushOverBundle\Model\PusherInterface;

use Sly\PushOver\PushManager as BasePushManager;

/**
 * Pusher model.
 *
 * @uses PusherInterface
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Pusher implements PusherInterface
{
    protected $userKey;
    protected $apiKey;
    protected $name;
    protected $device;

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->getName() ? $this->getName() : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserKey()
    {
        return $this->userKey;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setUserKey($userKey)
    {
        $this->userKey = $userKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getPush()
    {
        return $this->push;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setPush(BasePushManager $push)
    {
        $this->push = $push;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getDevice()
    {
        return $this->device;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setDevice($device)
    {
        $this->device = $device;
    }

    /**
     * {@inheritdoc}
     */
    public static function getDefaultOptions()
    {
        return array(
            'device' => null,
        );
    }
}
