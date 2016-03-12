<?php

namespace knURLy;

use InvalidArgumentException;

class URL
{
    /**
     * @var string
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

    /**
     * @return string
     */
    public function asString()
    {
        return (string) $this->url;
    }

    /**
     * @return string
     */
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
        $this->ensureSchemeIsAllowed($url);
        $this->url = $url;
    }

    /**
     * @param string $url
     */
    private function ensureSchemeIsAllowed($url)
    {
        $allowedSchemes = [
            'http',
            'https'
        ];

        $urlScheme = parse_url($url, PHP_URL_SCHEME);

        if (!in_array($urlScheme, $allowedSchemes)) {
            throw new InvalidArgumentException('URL scheme is not allowed.');
        }
    }
}