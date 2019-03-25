<?php
namespace Oefenweb;

use PHPUnit\Framework\TestCase;

class PromenadeTest extends TestCase
{
    private $promenade;

    public function setUp()
    {
        $this->promenade = new Promenade();
        parent::setUp();
    }

    /**
     * @dataProvider permutationsProvider
     */
    public function testDance($permutation, $expected)
    {
        $this->promenade->dance($permutation);
        $this->assertEquals($expected, $this->promenade->getPrograms());
    }

    public function permutationsProvider()
    {
        return [
            ['s15', 'bcdefghijklmnopa'],
            ['s3', 'nopabcdefghijklm'],
            ['s0', 'abcdefghijklmnop'],
            ['s16', 'abcdefghijklmnop'],
            ['x1/2','acbdefghijklmnop'],
            ['x3/8', 'abciefghdjklmnop'],
            ['x0/15', 'pbcdefghijklmnoa'],
            ['x0/0', 'abcdefghijklmnop'],
            ['x15/15', 'abcdefghijklmnop'],
            ['x8/8', 'abcdefghijklmnop'],
            ['pd/i', 'abciefghdjklmnop'],
            ['pa/p', 'pbcdefghijklmnoa'],
            ['pa/a', 'abcdefghijklmnop'],
            ['pp/p', 'abcdefghijklmnop'],
            ['ph/h', 'abcdefghijklmnop'],
            ['pa/c', 'cbadefghijklmnop'],
            ['s3,x1/2,pa/c', 'npocbadefghijklm']
        ];
    }
}
