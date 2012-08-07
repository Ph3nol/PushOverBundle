<?php

namespace Sly\PushOverBundle\Model;

use Sly\PushOver\PushManager as BasePushManager;

/**
 * Pusher interface.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
interface PusherInterface
{
    /**
     * __toString.
     * 
     * @return string
     */
    public function __toString();

    /**
      * Get UserKey value.
      *
      * @return string
      */
    public function getUserKey();

    /**
      * Set UserKey value.
      *
      * @param string $userKey UserKey value to set
      */
    public function setUserKey($userKey);

    /**
      * Get ApiKey value.
      *
      * @return string
      */
    public function getApiKey();

    /**
      * Set ApiKey value.
      *
      * @param string $apiKey ApiKey value to set
      */
    public function setApiKey($apiKey);

    /**
      * Get Push value.
      *
      * @return BasePushManager
      */
    public function getPush();

    /**
      * Set Push value.
      *
      * @param BasePushManager $push Push value to set
      */
    public function setPush(BasePushManager $push);

    /**
      * Get Name value.
      *
      * @return string
      */
    public function getName();

    /**
      * Set Name value.
      *
      * @param string $name Name value to set
      */
    public function setName($name);

    /**
      * Get Device value.
      *
      * @return string
      */
    public function getDevice();

    /**
      * Set Device value.
      *
      * @param string $device Device value to set
      */
    public function setDevice($device);

    /**
      * Get Enabled value.
      *
      * @return string
      */
    public function getEnabled();

    /**
      * Set Enabled value.
      *
      * @param string $enabled Enabled value to set
      */
    public function setEnabled($enabled);    

    /**
     * getDefaultOptions.
     * 
     * @return array
     */
    public static function getDefaultOptions();
}
