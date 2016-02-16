<?php

namespace URLShortener;

/**
 * Class Hasher
 * @package URLShortener
 */
class Hasher
{
    /**
     * @var
     */
    private $algorithm;

    /**
     * @return mixed
     */
    public function __toString()
    {
        return (string)$this->algorithm;
    }

    /**
     * @param string $algorithm
     * @return Hasher
     */
    public function setAlgorithm($algorithm)
    {
        $this->ensureAlgorithmIsAvailable($algorithm);
        $this->algorithm = $algorithm;
    }

    /**
     * Hasher constructor.
     * @param string $algorithm
     */
    public function __construct($algorithm = 'crc32b')
    {
        $this->setAlgorithm($algorithm);
    }

    /**
     * @param $algorithm
     * @return bool
     * @throws \InvalidArgumentException
     */
    private function ensureAlgorithmIsAvailable($algorithm)
    {
        $available = hash_algos();
        if (!in_array($algorithm, $available)) {
            throw new \InvalidArgumentException('The specified algorithm does not exist');
        }
        return true;
    }

    /**
     * @param $string
     * @return string
     */
    public function hashString($string)
    {
        return hash($this->algorithm, $string);
    }

}