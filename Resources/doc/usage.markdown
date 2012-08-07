SlyPushOverBundle
====================

# Usage

## 1. Configuration bundle informations

You have to define all your relationships from your project `config.yml` file,
with an associated key. Here is an example with a `friendship` key relation:

```yaml
sly_push_over:
    pushers:
        myPusherName:
            user_key: myUs3rK3y
            api_key: myT0k3nK3y
```

You can specify a global user and API keys to easily use pushers. Here is an example:

```yaml
sly_push_over:
    user_key: myUs3rK3y
    api_key: myT0k3nK3y
    pushers:
        myFirstPusher: ~
        mySecondPusher: ~
        myThirdPusher:
            device: My-Device-Name
            enabled: false
```

Each pusher accepts an `enabled` parameter. Switch it to `false` to simulate a
notification has been sent. You can set a global `enabled` parameter too which affect
all pushers.

## 2. Use PushOver service

For native PushOver service utilization, you can take a look  at its
[documentation](https://github.com/Ph3nol/PushOver/blob/master/README.md).

The principle is to create a Push, which has a message and an optional title.
This Push will be passed through a PushManager service, from this bundle.

Here is an example:

```php
<?php

    // ...

    $push = $this->container->get('sly_pushover');

    $myPush = new \Sly\PushOver\Model\Push();
    $myPush->setMessage('Pony is powerful!');

    /**
     * 'myPusherName' is your pusher name, defined into your config file.
     */
    if (true === $push->push('myPusherName', $myPush))
    {
        /**
         * The message has been pushed.
         * Do what you want now!
         */
    }

    // ...
```

-----

To be continued.