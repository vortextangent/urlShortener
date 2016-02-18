<?php

namespace URLShortener;

/**
 * Class URLHashTest
 * @package URL
 * @covers  \URLShortener\URLHasher
 */
class HasherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCanNotCreateHasherWithInvalidFunction()
    {
        $hasher = new URLHasher('invalidalgorithm');
    }

    /**
     * @dataProvider urlProvider
     * @uses         \URLShortener\URL
     */
    public function testGenerateExpectedHash($urlstring, $algorithm, $expectedHash)
    {
        $url    = new URL($urlstring);
        $hasher = new URLHasher($algorithm);
        $hash   = $hasher->getHash($url);
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
