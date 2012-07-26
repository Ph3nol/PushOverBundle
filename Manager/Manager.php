<?php

namespace Sly\PushOverBundle\Manager;

use Sly\PushOverBundle\Config\ConfigManager;

use Sly\PushOver\Model\PushInterface;
use Sly\PushOver\PushManager as BasePushManager;

/**
 * Manager.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Manager
{
    protected $config;
    protected $pushers;

    /**
     * Constructor.
     *
     * @param ConfigManager $config ConfigManager service
     */
    public function __construct(ConfigManager $config)
    {
        $this->config  = $config;
        $this->pushers = $this->config->getPushers();
        $this->message = null;

        $this->_attributeServicesToPushers();
    }

    /**
     * {@inheritdoc}
     */
    public function push($pusherName, PushInterface $push)
    {
        $pusherService = $this->pushers[$pusherName]->getPush();

        return $pusherService->push($push);
    }

    /**
     * Attribute PushService to each pushers.
     */
    protected function _attributeServicesToPushers()
    {
        foreach ($this->pushers as $pusher) {
            $pusher->setPush(
                new BasePushManager($pusher->getUserKey(), $pusher->getApiKey(), $pusher->getDevice())
            );
        }
    }
}
