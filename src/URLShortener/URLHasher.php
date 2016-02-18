<?php

namespace URLShortener;

use InvalidArgumentException;

/**
 * Class Hasher
 * @package URLShortener
 */
class URLHasher extends Hasher
{

    /**
     * @param URL $string
     * @return string
     */
    public function getHash(URL $url)
    {
        return hash($this->algorithm, $url->asString());
    }

}