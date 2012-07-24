<?php

namespace Sly\PushOverBundle\Manager;

use Sly\PushOverBundle\Config\ConfigManager;
use Sly\PushOverBundle\Entity\Relation;
use Sly\PushOverBundle\Manager\ManagerInterface;

use Sly\PushOver\Push\Push as PushService;
use Sly\PushOver\Push\PushInterface as PushServiceInterface;

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
     * @param PushServiceInterface $push   Push service
     * @param ConfigManager        $config ConfigManager service
     */
    public function __construct(PushServiceInterface $push, ConfigManager $config)
    {
        $this->push   = $push;
        $this->config = $config;
    }
}
