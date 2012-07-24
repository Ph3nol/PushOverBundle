<?php

namespace Sly\PushOverBundle\Model;

use Sly\PushOverBundle\Model\PushInterface;

/**
 * Push model.
 *
 * @uses PushInterface
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Push implements PushInterface
{
    protected $userKey;
    protected $apiKey;
    protected $name;
    protected $device;

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
}
