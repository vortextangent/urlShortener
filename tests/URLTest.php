<?php

namespace URLShortener;

/**
 * Class URLTest
 * @package URLShortener
 * @covers  \URLShortener\URL
 */
class URLTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider invalidUrlProvider
     * @expectedException \InvalidArgumentException
     */
    public function testDoesNotAllowInvalidUrls($urlString)
    {
        $url = new URL($urlString);
    }

    /**
     * @dataProvider validUrlProvider
     */
    public function testCanCreateInstanceWithValidUrl($urlstring)
    {
        $url = new URL($urlstring);
        $this->assertInstanceOf(URL::class, $url);
    }

    public function testCanRetrieveUrlAsString()
    {
        $urlstring = "http://www.tonyfixit.com/";
        $url       = new URL($urlstring);
        $this->assertEquals($urlstring, (string) $url);
    }

    /**
     * @return array
     */
    public function invalidUrlProvider()
    {
        return [
            ["ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~:/?#[]@!$&\\\'()*+,;="]
        ];
    }

    /**
     * @return array
     */
    public function validUrlProvider()
    {
        return [
            ['http://www.google.com/'],
            ['https://www.google.com/?whatisyourquest=toseektheholygrail'],
        ];
    }
}
