<?php

namespace Adunsulag\DoctrineEncryptBundle\Interfaces;

/**
 * This interface is required to be implemented by entities that need to have
 * pre-existing data to be encrypted ie migrated.
 * @author snielson
 */
interface EncryptionMigratable {
    
    public function setEncryptionVersion($version);
    
    public function getEncryptionVersion();
}
