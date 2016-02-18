<?php

namespace URLShortener;

use InvalidArgumentException;

/**
 * Class URL
 * @package URLShortener
 */
class URL
{
    /**
     * @var
     */
    private $url;

    /**
     * URL constructor.
     * @param $urlString
     */
    public function __construct($urlString)
    {
        $this->setUrl($urlString);
    }

    public function asString()
    {
        return (string) $this->url;
    }

    public function __toString()
    {
        return $this->asString();
    }

    /**
     * @param $url
     * @throws InvalidArgumentException
     * @return bool
     */
    public function ensureIsValidURL($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new InvalidArgumentException('This is not a valid URL.');
        }

        return true;
    }

    /**
     * @param string $url
     */
    private function setUrl($url)
    {
        $this->ensureIsValidURL($url);
        $this->url = $url;
    }
}