<?php

namespace Sly\PushOverBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

use Sly\PushOverBundle\Model\Pusher;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @uses Extension
 * @author Cédric Dugat <ph3@slynett.com>
 */
class SlyPushOverExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('config.xml');
        $loader->load('manager.xml');

        $configuration = $configs[0];

        /* --- Configuration management and overloads --- */

        $configuration = array_merge($this->_getDefaultOptions(), $configuration);

        if (false === (bool) count($configuration['pushers']) && false === $this->_configurationHasKeys($configuration)) {
            throw new \InvalidArgumentException('You have to set global "user_key" and "api_key" into your project config file');
        }

        foreach ($configuration['pushers'] as $pusherName => $pusherConfig) {
            if (false === $this->_configurationHasKeys($configuration) && false === $this->_configurationHasKeys($pusherConfig)) {
                throw new \InvalidArgumentException(sprintf('"%s" pusher has to have a "user_key" and "api_key" into your project config file', $pusherName));
            }

            if (true === $this->_configurationHasKeys($configuration) && false === $this->_configurationHasKeys($pusherConfig)) {
                $pusherConfig['user_key'] = $configuration['user_key'];
                $pusherConfig['api_key']  = $configuration['api_key'];
            }

            $configuration['pushers'][$pusherName] = array_merge(Pusher::getDefaultOptions(), $pusherConfig);
        }

        $container->setParameter('sly_push_over.config', $configuration);
    }

    /**
     * _configurationHasKeys.
     *
     * @param array $config
     *
     * @return boolean
     */
    protected function _configurationHasKeys(array $config)
    {
        return true == $config['user_key'] && true == $config['api_key'];
    }

    /**
     * _getDefaultOptions.
     *
     * @return array
     */
    protected function _getDefaultOptions()
    {
        return array(
            'user_key' => null,
            'api_key'  => null,
            'pushers'  => array(),
        );
    }
}
