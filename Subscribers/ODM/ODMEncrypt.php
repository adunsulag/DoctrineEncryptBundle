<?php

namespace Adunsulag\DoctrineEncryptBundle\Subscribers\ODM;

use Adunsulag\DoctrineEncryptBundle\Subscribers\AbstractODMDoctrineEncryptSubscriber;
use Doctrine\ODM\MongoDB\Events;

/**
 * Description of ODMEncrypt
 *
 * @author wpigott
 */
class ODMEncrypt extends AbstractODMDoctrineEncryptSubscriber {

    /**
     * Realization of EventSubscriber interface method.
     * @return Array Return all events which this subscriber is listening
     */
    public function getSubscribedEvents() {
        return array(
            Events::prePersist,
            Events::preUpdate,
        );
    }

}
