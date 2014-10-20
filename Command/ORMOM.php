<?php

namespace Adunsulag\DoctrineEncryptBundle\Command;

use Adunsulag\DoctrineEncryptBundle\Interfaces\StandardizerInterface;
use Doctrine\ORM\EntityManager;
use Adunsulag\DoctrineEncryptBundle\Interfaces\EncryptionMigratable;

/**
 * Description of ODMOM
 *
 * @author wpigott
 */
class ORMOM implements StandardizerInterface {

    private $objectManager;

    public function __construct(EntityManager $documentManager) {
        $this->objectManager = $documentManager;
    }

    /**
     * 
     * @return EntityManager
     */
    public function getObjectManager() {
        return $this->objectManager;
    }
    
    public function scheduleObjectForUpdate(EncryptionMigratable $object) {
        // A hackish way to force the object to be flagged as 
        // updated (so it triggers the events) when it really is not.
        $object->setEncryptionVersion(1);
//        $this->getObjectManager()->getUnitOfWork()->setOriginalEntityData($object, array('__encrypt_version'=>'1'));        
    }

}
