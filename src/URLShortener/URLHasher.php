<?php

namespace URLShortener;

use InvalidArgumentException;

/**
 * Class Hasher
 * @package URLShortener
 */
class URLHasher
{
    /**
     * @var
     */
    private $algorithm;

    /**
     * Hasher constructor.
     * @param string $algorithm
     */
    public function __construct($algorithm = 'crc32b')
    {
        $this->setAlgorithm($algorithm);
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return (string) $this->algorithm;
    }

    /**
     * @param string $algorithm
     * @return URLHasher
     */
    public function setAlgorithm($algorithm)
    {
        $this->ensureAlgorithmIsAvailable($algorithm);
        $this->algorithm = $algorithm;
    }

    /**
     * @param URL $string
     * @return string
     */
    public function hashUrl(URL $url)
    {
        return hash($this->algorithm, $url->asString());
    }

    /**
     * @param $algorithm
     * @return bool
     * @throws InvalidArgumentException
     */
    private function ensureAlgorithmIsAvailable($algorithm)
    {
        $available = hash_algos();
        if (!in_array($algorithm, $available)) {
            throw new InvalidArgumentException('The specified algorithm is not available.');
        }

        return true;
    }
}