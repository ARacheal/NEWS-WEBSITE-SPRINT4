<?php
require_once __DIR__ .'/../controller/user-category-model.php';

use PHPUnit\Framework\TestCase;
/*5
1
2
1*/
final class UsercontrollerModelTest extends TestCase
{
    public function testgetUserId()
    {
        $userCategoryuser = new UserCategory(1, 1, 2, 1);

        $this->assertIsInt($userCategoryuser->getUserId(1));
        //$this->assertSame('', $user->mobile);
        //$this->assertSame('john@gmail.com', $user->password);        
    }
    public function testUserId()
    {
        $userCategoryuser = new UserCategory(1, 1, 2, 1);

        $this->assertSame(1, $userCategoryuser->getUserId(1));
        //$this->assertSame('', $user->mobile);
        //$this->assertSame('john@gmail.com', $user->password);        
    }

    public function testgetCategoryId()
    {
        $userCategoryuser = new UserCategory(1, 1, 2, 1);

        $this->assertIsInt($userCategoryuser->getCategoryId(2));
    }

    public function testCategoryId()
    {
        $userCategoryuser = new UserCategory(1, 1, 2, 1);

        $this->assertSame(2, $userCategoryuser->getCategoryId());
    }

    public function testgetId()
    {
        $userCategoryuser = new UserCategory(1, 1, 2, 1);

        $this->assertIsInt($userCategoryuser->getId(2));
    }
    public function testgetStatus()
    {
        $userCategoryuser = new UserCategory(1, 1, 2, 1);

        $this->assertIsInt($userCategoryuser->getStatus(2));
    }
    public function testStatus()
    {
        $userCategoryuser = new UserCategory(1, 1, 2, 1);

        $this->assertIsInt(1, $userCategoryuser->getStatus(2));
    }
}