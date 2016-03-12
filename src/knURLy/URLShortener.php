<?php

namespace knURLy;

class URLShortener
{
    /**
     * @var URL $url
     */
    private $url;

    /**
     * @var URLHasher $hasher
     */
    private $hasher;

    /**
     * @var string
     */
    private $urlHash;

    /**
     * @param URL $url
     * @param URLHasher $hasher
     */
    public function __construct(URL $url, URLHasher $hasher)
    {
        $this->url    = $url;
        $this->hasher = $hasher;

        $this->urlHash = $this->hasher->hashUrl($this->url);
    }

    public function getUrlHash()
    {
        return $this->urlHash;
    }

    public function hashEqualTo($hash) {
        return $this->urlHash === $hash;
    }

    public function getUrlAsString()
    {
        return $this->url->asString();
    }
}