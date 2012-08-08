<?php

namespace Sly\PushOverBundle\DataCollector;

use Sly\PushOverBundle\Logger\PushOverLogger;

use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * PushesDataCollector.
 */
class PushesDataCollector extends DataCollector
{
    protected $logger;

    /**
     * Constructor.
     *
     * @param PushOverLogger $logger Logger service
     */
    public function __construct(PushOverLogger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $this->data = array(
            'sentPushes' => null !== $this->logger ? $this->logger->getSentPushes() : array(),
        );
    }

    /**
     * Returns an array of collected commands.
     *
     * @return array
     */
    public function getSentPushes()
    {
        return $this->data['sentPushes'];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sly_push_over';
    }
}