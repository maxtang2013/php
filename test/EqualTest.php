<?php

class Hi {
}

class EqualTest extends PHPUnit_Framework_TestCase
{
    public function testEquals() {
        $a = '1';
        $b = 1;
        $this->assertTrue( $a == $b );
        $this->assertFalse( $a === $b );

        $this->assertNotSame($a, $b);

        $a = new Hi();
        // unset($a);
        $this->assertNotEquals(NULL, $a);

        $this->assertEquals('12','0012');

        $this->assertSame(array(1,2,3), array(1,2,3));
    }

    public function testSameForArray() {
        $this->assertNotSame(array(1,2,3), array(1,3,2));
    }

    public function testNotSameForObjects() {
        $this->assertNotSame(new Hi(), new Hi());
    }

    public function testStringSame() {
        $this->assertSame("123", '123');
    }

    public function testStringNotSame2() {
        $this->assertNotSame("123", 123);
    }
}
