<?php
namespace App\Event;

use Cake\Log\Log;
use Cake\Event\EventListenerInterface;

class UserListener implements EventListenerInterface {

    public function implementedEvents() {
        return [
            'Model.User.afterRegister' => 'sendVerificationLink',
        ];
    }

    public function sendVerificationLink($event,  $entity, $options) {
        Log::write(
            'info',
            'A verification email was sent to ' . $event->data['name']);
    }
}
