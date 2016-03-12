<?php

namespace knURLy;

use InvalidArgumentException;
use PHPUnit_Framework_TestCase;

/**
 * Class URLTest
 * @package URLShortener
 * @covers  \knURLy\URL
 */
class URLTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider invalidUrlProvider
     */
    public function testDoesNotAllowInvalidUrls($urlString, $expectedErrorMessage)
    {
        $this->setExpectedException(InvalidArgumentException::class, $expectedErrorMessage);
        $url = new URL($urlString);
    }

    /**
     * @dataProvider restrictedUrlSchemeProvider
     */
    public function testDoesNotAllowUrlsWithRestrictedSchemes($urlString, $expectedErrorMessage)
    {
        $this->setExpectedException(InvalidArgumentException::class, $expectedErrorMessage);
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
            [
                "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~:/?#[]@!$&\\\'()*+,;=",
                "This is not a valid URL."
            ]
        ];
    }

    /**
     * @return array
     */
    public function restrictedUrlSchemeProvider()
    {

        return [
            ['mailto:test@me.com', "URL scheme is not allowed."],
            ['ftp://user:none@none.com', "URL scheme is not allowed."]
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
