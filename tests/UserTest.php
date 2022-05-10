<?php
require_once __DIR__ .'/../controller/user-model.php';

use PHPUnit\Framework\TestCase;
/*1
ramya
ramyangel.john@gmail.com
123
user
active*/
final class UserTest extends TestCase
{
    public function testClassConstructor()
    {
        $user = new User(1, 'ramya','', 'ramyangel.john@gmail.com','123','user','active');

        $this->assertSame('ramya', $user->name);
        //$this->assertSame('', $user->mobile);
        //$this->assertSame('john@gmail.com', $user->password);
        return $user->name;        
    }

    public function testgetEmail()
    {
        $user = new User(1, 'ramya','', 'ramyangel.john@gmail.com','123','user','active');

        $this->assertSame('ramyangel.john@gmail.com', $user->getEmail());
        //$this->assertSame('', $user->mobile);
        //$this->assertSame('john@gmail.com', $user->password);        
    }

    public function testgetId()
    {
        $user = new User(1, 'ramya','', 'ramyangel.john@gmail.com','123','user','active');

        $this->assertIsInt($user->getId(1));
    }
    public function testId()
    {
        $user = new User(1, 'ramya','', 'ramyangel.john@gmail.com','123','user','active');

        $this->assertSame(1, $user->getId(1));
    }

    public function testgetRole()
    {
        $user = new User(1, 'ramya','', 'ramyangel.john@gmail.com','123','user','active');

        $this->assertIsString($user->getRole('user'));
    }
    public function testRole()
    {
        $user = new User(1, 'ramya','', 'ramyangel.john@gmail.com','123','user','active');

        $this->assertIsString('user',$user->getRole('user'));
    }
    public function testgetStatus()
    {
        $user = new User(1, 'ramya','', 'ramyangel.john@gmail.com','123','user','active');

        $this->assertIsString($user->getStatus('active'));
    }
    public function testStatus()
    {
        $user = new User(1, 'ramya','', 'ramyangel.john@gmail.com','123','user','active');

        $this->assertSame('active', $user->getStatus('active'));
    }

}