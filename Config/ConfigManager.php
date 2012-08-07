<?php

namespace Sly\PushOverBundle\Config;

use Sly\PushOverBundle\Model\Pusher;
use Sly\PushOverBundle\Manager\ManagerPushersCollection as PushersCollection;

/**
 * ConfigManager.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class ConfigManager
{
    protected $config;
    protected $pushers;

    /**
     * Constructor.
     *
     * @param array $config Configuration
     */
    public function __construct(array $config)
    {
        $this->config  = $config;
        $this->pushers = $this->__initAndGetPushers();
    }

    /**
     * Get PushesCollection.
     *
     * @return PushesCollection
     */
    public function getPushers()
    {
        return $this->pushers;
    }

    /**
     * Get PushersCollection from configuration.
     *
     * @return PushersCollection
     */
    private function __initAndGetPushers()
    {
        $pushers = new PushersCollection();

        foreach ($this->config['pushers'] as $name => $data) {
            $pusher = new Pusher();
            $pusher->setName($name);
            $pusher->setUserKey($data['user_key']);
            $pusher->setApiKey($data['api_key']);
            $pusher->setDevice($data['device']);
            $pusher->setEnabled((bool) $data['enabled']);

            $pushers->set($name, $pusher);
        }

        return $pushers;
    }
}
