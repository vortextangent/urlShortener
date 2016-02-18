<?php

namespace URLShortener;

abstract class Hasher
{
    /**
     * @var string
     */
    protected $algorithm;

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
     * @return string
     */
    public function getHash($string)
    {
        return hash($this->algorithm, $string);
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
            throw new InvalidArgumentException('The specified algorithm does not exist');
        }

        return true;
    }
}