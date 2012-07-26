<?php

namespace Sly\PushOverBundle\Manager;

use Sly\PushOverBundle\Model\PusherInterface;

/**
 * ManagerPushers collection.
 *
 * @uses IteratorAggregate
 * @author Cédric Dugat <ph3@slynett.com>
 */
class ManagerPushersCollection implements \IteratorAggregate
{
    protected $coll;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->coll = new \ArrayIterator();
    }

    /**
     * @return array
     */
    public function getIterator()
    {
        return $this->coll;
    }

    /**
     * Set method.
     *
     * @param string          $name   Pusher Name
     * @param PusherInterface $pusher Pusher
     */
    public function set($name, PusherInterface $pusher)
    {
        $this->coll[$name] = $pusher;
    }

    /**
     * Get method.
     *
     * @param string $name Pusher name
     *
     * @return PushInterface
     */
    public function get($name)
    {
        return isset($this->coll[$name]) ? $this->coll[$name] : null;
    }

    /**
     * Has push or not.
     *
     * @param string $name Pusher name
     *
     * @return boolean
     */
    public function has($name)
    {
        return $this->coll->offsetExists($name);
    }

    /**
     * Get pushes.
     *
     * @return \ArrayIterator
     */
    public function getPushers()
    {
        return $this->coll;
    }
}
