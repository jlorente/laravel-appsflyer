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

namespace Jlorente\Laravel\Appsflyer\Notifications\Channel;

use Illuminate\Notifications\Notification;
use Jlorente\Appsflyer\Appsflyer;

/**
 * Class AppsflyerChannel.
 * 
 * A notification channel to send in app events to Appsflyer.
 *
 * @author Jose Lorente <jose.lorente.martin@gmail.com>
 */
class AppsflyerChannel
{

    /**
     * The Appsflyer client instance.
     *
     * @var Appsflyer
     */
    protected $client;

    /**
     * Create a new Appsflyer channel instance.
     *
     * @param Appsflyer $client
     * @return void
     */
    public function __construct(Appsflyer $client)
    {
        $this->client = $client;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     * @return \Appsflyer\Model\ResultItem
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toAppsflyer($notifiable);
        if (config('services.appsflyer.is_active') === true) {
            return $this->client->inAppEvent()->create($message->platform, $message->payload);
        } else {
            return true;
        }
    }

}
