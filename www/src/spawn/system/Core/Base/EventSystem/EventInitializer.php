<?php

namespace spawn\system\Core\Base\EventSystem;

use spawn\system\Core\Services\ServiceContainer;
use spawn\system\Core\Services\ServiceContainerProvider;

class EventInitializer {

    public static function registerSubscriberFromServices(ServiceContainer $serviceContainer) {
        $eventEmitter = EventEmitter::get();
        $subscriberServices = $serviceContainer->getServicesByTag('event.subscriber');

        foreach($subscriberServices as $subscriberService) {
            $subscriberClass = $subscriberService->getClass();

            if(in_array(EventSubscriberInterface::class, class_implements($subscriberClass))
            ) {
                /** @var EventSubscriberInterface $subscriberClass */
                $subscriptions = $subscriberClass::getSubscribedEvents();

                foreach($subscriptions as $eventClass => $listenerDefinition) {

                    if(is_string($listenerDefinition)) {
                        $eventEmitter->subscribe($eventClass, $subscriberService->getId(), $listenerDefinition);
                    }
                    elseif(is_array($listenerDefinition)) {
                        foreach($listenerDefinition as $listenerMethod) {
                            $eventEmitter->subscribe($eventClass, $subscriberService->getId(), $listenerMethod);
                        }
                    }

                }

            }
        }


    }


}