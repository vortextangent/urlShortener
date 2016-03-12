<?php

namespace knURLy;

use PHPUnit_Framework_TestCase;

/**
 * @covers \knURLy\URLShortener
 * @uses   \knURLy\URL
 * @uses   \knURLy\URLHasher
 */
class URLShortenerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var URLShortener
     */
    private $urlShortener;

    /**
     * @var string
     */
    private $urlString;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var URLHasher
     */
    private $hasher;

    /**
     * @var URL
     */
    private $url;

    public function setUp()
    {
        $this->urlString    = 'http://www.tonyfixit.com/';
        $this->url          = new URL($this->urlString);
        $this->hasher       = new URLHasher();
        $this->hash         = $this->hasher->hashUrl($this->url);
        $this->urlShortener = new URLShortener(new URL($this->urlString), $this->hasher);
    }

    public function testCanTestForEquivalentHash()
    {
        $this->assertTrue($this->urlShortener->hashEqualTo($this->hash));
    }

    public function testCanRetrieveURLFromShortener()
    {
        $this->assertEquals($this->urlString, $this->urlShortener->getUrlAsString());
    }

    public function testCanRetrieveURLHashFromShortener()
    {
        $this->assertEquals($this->hash, $this->urlShortener->getUrlHash());
    }
}
