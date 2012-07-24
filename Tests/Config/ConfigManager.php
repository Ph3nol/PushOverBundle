<?php

use Sly\PushOverBundle\Config\ConfigManager;

/**
 * ConfigManager tests.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
class ConfigManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test ConfigManager.
     */
    public function testConfigManager()
    {
        $config = $this->__getTestConfig();

        $this->markTestIncomplete('Todo: write some tests!');
    }

    /**
     * Get test configuration.
     *
     * @return array
     */
    private function __getTestConfig()
    {
        return array(
            'pushes' => array(
                'user_key' => 'myT3stUs3rK3y',
                'api_key'  => 'myT3st4p1K3y',
                'device'   => null,
            )
        );
    }
}
