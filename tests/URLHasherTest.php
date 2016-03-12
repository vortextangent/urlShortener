<?php

namespace knURLy;

use InvalidArgumentException;
use PHPUnit_Framework_TestCase;

/**
 * @covers  \knURLy\URLHasher
 */
class URLHasherTest extends PHPUnit_Framework_TestCase
{

    public function testCanNotCreateHasherWithInvalidFunction()
    {
        $this->setExpectedException(InvalidArgumentException::class, 'The specified algorithm is not available.');
        $hasher = new URLHasher('invalidalgorithm');
    }

    /**
     * @dataProvider urlProvider
     * @uses         \knURLy\URL
     */
    public function testGenerateExpectedHash($urlstring, $algorithm, $expectedHash)
    {
        $url    = new URL($urlstring);
        $hasher = new URLHasher($algorithm);
        $hash   = $hasher->hashUrl($url);
        $this->assertEquals($expectedHash, $hash);
    }

    public function testCanRetrieveAlgorithmName()
    {
        $algorithm = 'crc32b';
        $hasher    = new URLHasher($algorithm);
        $this->assertEquals($algorithm, (string) $hasher);
    }

    /**
     * @return array
     */
    public function urlProvider()
    {
        return [
            ['http://www.google.com/', 'crc32b', 'df3125c4'],
            ['https://www.google.com/?whatisyourquest=toseektheholygrail', 'crc32b', '4fd2dec3'],
        ];
    }
}
