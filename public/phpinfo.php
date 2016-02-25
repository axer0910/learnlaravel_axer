<?php
interface IUser
{
    function getName();
}

class User implements IUser
{
    public function __construct( $id ) { }

    public function getName()
    {
        return "Jack";
    }

    public function getAName()
    {
        return 'Alex';
    }
}

class UserFactory
{
    public static function Create( $id )
    {
        return new User( $id );
    }
}

$uo = UserFactory::Create( 1 );
echo( $uo->getName()."\n" );
echo( $uo->getAName()."\n" );
?>