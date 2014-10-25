<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adunsulag\DoctrineEncryptBundle\Types;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
/**
 * Description of EncryptedDatetime
 *
 * @author snielson
 */
class EncryptedDatetime extends Type {
    
    const MYTYPE = 'encrypted_datetime'; // modify to match your type name
    
    
    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        // return the SQL used to create your column type. To create a portable column type, use the $platform.
        return 'TEXT';
    }
    
    /**
     * Converts the text string to a valid Datetime object
     * @param type $value
     * @param \Adunsulag\DoctrineEncryptBundle\Types\AbstractPlatform $platform
     * @return \DateTime
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        // This is executed when the value is read from the database. Make your conversions here, optionally using the $platform.
        if ($value != null) {
            return new \DateTime($value);
        }
    }

    public function convertToDatabaseValue(\DateTime $value, AbstractPlatform $platform)
    {
        // This is executed when the value is written to the database. Make your conversions here, optionally using the $platform.
        return $value->format("Y-m-d H:i:s");
    }

    public function getName()
    {
        return self::MYTYPE; // modify to match your constant name
    }
}
