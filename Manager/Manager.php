<?php

namespace Sly\PushOverBundle\Manager;

use Sly\PushOverBundle\Config\ConfigManager;
use Sly\PushOverBundle\Manager\ManagerInterface;

use Sly\PushOver\Model\PushInterface;
use Sly\PushOver\PushManager as BasePushManager;
use Sly\PushOverBundle\Manager\PushesCollection;

/**
 * Manager.
 *
 * @uses ManagerInterface
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Manager implements ManagerInterface
{
    protected $config;
    protected $pushers;
    protected $sentPushes;

    /**
     * Constructor.
     *
     * @param ConfigManager $config ConfigManager service
     */
    public function __construct(ConfigManager $config)
    {
        $this->config     = $config;
        $this->pushers    = $this->config->getPushers();
        $this->sentPushes = new PushesCollection();

        $this->_attributeServicesToPushers();
    }

    /**
     * {@inheritdoc}
     */
    public function push($pusherName, PushInterface $push)
    {
        if (false === $this->pushers->has($pusherName)) {
            throw new \InvalidArgumentException(sprintf('There is no "%s" pusher in your project config file', $pusherName));
        }

        $pusher        = $this->pushers->get($pusherName);
        $pusherService = $pusher->getPush();

        $sentPush = $pusherService->push($push, $pusher->getEnabled());

        $this->sentPushes->set(md5($sentPush->push->getSentAt()->format('u')), $sentPush->push);

        return (bool) $sentPush;
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

    /**
     * {@inheritdoc}
     */
    public function getSentPushes()
    {
        return $this->sentPushes;
    }
}
