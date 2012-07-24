<?php

namespace Sly\PushOverBundle\Model;

/**
 * Push interface.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
interface PushInterface
{
    /**
      * Get UserKey value.
      *
      * @return string UserKey value to get
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
      * @return string ApiKey value to get
      */
    public function getApiKey();
    
    /**
      * Set ApiKey value.
      *
      * @param string $apiKey ApiKey value to set
      */
    public function setApiKey($apiKey);

    /**
      * Get Name value.
      *
      * @return string Name value to get
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
      * @return string Device value to get
      */
    public function getDevice();
    
    /**
      * Set Device value.
      *
      * @param string $device Device value to set
      */
    public function setDevice($device);
}
