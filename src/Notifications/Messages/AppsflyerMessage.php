<?php

/**
 * Part of the Appsflyer Laravel package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Appsflyer Laravel
 * @version    1.0.0
 * @author     Jose Lorente
 * @license    BSD License (3-clause)
 * @copyright  (c) 2018, Jose Lorente
 */

namespace Jlorente\Laravel\Appsflyer\Notifications\Messages;

/**
 * Description of AppsflyerMessage
 *
 * @author Jose Lorente <jose.lorente.martin@gmail.com>
 */
class AppsflyerMessage
{

    /**
     * The message content.
     *
     * @var string
     */
    public $platform;

    /**
     * The phone number the message should be sent from.
     *
     * @var array
     */
    public $payload;

    /**
     * Create a new appsflyer message instance.
     * 
     * @param string $platform
     * @param array $payload
     */
    public function __construct($platform = null, array $payload = null)
    {
        if ($platform) {
            $this->platform($platform);
        }
        if ($payload) {
            $this->payload($payload);
        }
    }

    /**
     * Set the platform to send the event.
     *
     * @param string $platform
     * @return $this
     */
    public function platform($platform)
    {
        $this->platform = $platform;
        return $this;
    }

    /**
     * Sets the payload for the appsflyer event.
     *
     * @param array $payload
     * @return $this
     */
    public function payload(array $payload)
    {
        $this->payload = $payload;
        return $this;
    }

}
