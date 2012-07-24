<?php

namespace Sly\PushOverBundle\Config;

use Sly\PushOverBundle\Model\Push;
use Sly\PushOverBundle\Model\PushesCollection;

/**
 * ConfigManager.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class ConfigManager
{
    protected $config;
    protected $pushes;

    /**
     * Constructor.
     *
     * @param array $config Configuration
     */
    public function __construct(array $config)
    {
        $this->config    = $config;
        $this->pushes = $this->__initAndGetPushes();
    }

    /**
     * Get PushesCollection.
     *
     * @return PushesCollection
     */
    public function getPushes()
    {
        return $this->pushes;
    }

    /**
     * Get PushesCollection from configuration.
     *
     * @return PushesCollection
     */
    private function __initAndGetPushes()
    {
        $pushes = new PushesCollection();

        foreach ($this->config['pushes'] as $name => $data) {
            $push = new Push();

            /**
             * @todo Set data from config.
             */
            $pushes->set($name, $push);
        }

        return $pushes;
    }
}
