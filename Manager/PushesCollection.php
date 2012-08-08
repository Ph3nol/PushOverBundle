<?php

namespace Sly\PushOverBundle\Manager;

use Sly\PushOver\Model\PushInterface;

/**
 * Pushes collection.
 *
 * @uses IteratorAggregate
 * @author Cédric Dugat <ph3@slynett.com>
 */
class PushesCollection implements \IteratorAggregate
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
     * @param string        $name Push Name
     * @param PushInterface $push Push
     */
    public function set($name, PushInterface $push)
    {
        $this->coll[$name] = $push;
    }

    /**
     * Get method.
     *
     * @param string $name Push name
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
     * @param string $name Push name
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
    public function getPushes()
    {
        return $this->coll;
    }
}
