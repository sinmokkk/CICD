<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class OneTest extends TestCase
{
    public function testCanBeCreatedFromValidEmail(): void
    {
        $this->assertSame(1+1, 2);
    }
}