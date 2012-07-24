<?php

namespace Sly\PushOverBundle\Manager;

use Sly\PushOverBundle\Config\ConfigManager;
use Sly\PushOverBundle\Entity\Relation;
use Sly\PushOverBundle\Manager\ManagerInterface;

use Sly\PushOver\PushManager as BasePushManager;
use Sly\PushOver\PushManagerInterface as BasePushManagerInterface;

/**
 * Manager.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Manager
{
    protected $push;
    protected $config;

    /**
     * Constructor.
     *
     * @param BasePushManagerInterface $push   PushOver service
     * @param ConfigManager            $config ConfigManager service
     */
    public function __construct(BasePushManagerInterface $push, ConfigManager $config)
    {
        $this->push   = $push;
        $this->config = $config;
    }
}
