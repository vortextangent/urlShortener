<?php


namespace URLShortener;

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
     * @param string $url
     */
    private function setUrl($url)
    {
        $this->ensureIsValidURL($url);
        $this->url = $url;
    }

    /**
     * URL constructor.
     * @param $urlString
     */
    public function __construct($urlString)
    {
        $this->setUrl($urlString);
    }

    public function __toString()
    {
        return (string)$this->url;
    }

    /**
     * @param $url
     * @throws \InvalidArgumentException
     * @return bool
     */
    public function ensureIsValidURL($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('This is not a valid URL.');
        }
        return true;
    }


}