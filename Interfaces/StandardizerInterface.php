<?php

namespace Adunsulag\DoctrineEncryptBundle\Interfaces;

use Doctrine\Common\Persistence\ObjectManager;

/**
 *
 * @author wpigott
 */
interface StandardizerInterface {

    /**
     * @return ObjectManager
     */
    public function getObjectManager();

    public function scheduleObjectForUpdate(EncryptionMigratable $object);
}
