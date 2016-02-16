<?php


namespace URLShortener;

/**
 * Class URLHashTest
 * @package URL
 * @covers \URLShortener\Hasher
 */
class HasherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCanNotCreateHasherWithInvalidFunction()
    {
        $hasher = new Hasher('invalidalgorithm');
    }

    /**
     * @dataProvider urlProvider
     * @uses         \URLShortener\URL
     */
    public function testGenerateExpectedHash($urlstring, $algorithm, $expectedHash)
    {
        $url = new URL($urlstring);
        $hasher = new Hasher($algorithm);
        $hash = $hasher->hashString($url);
        $this->assertEquals($expectedHash, $hash);
    }

    public function testCanRetrieveAlgorithmName()
    {
        $algorithm = 'crc32b';
        $hasher = new Hasher($algorithm);
        $this->assertEquals($algorithm, (string)$hasher);
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
