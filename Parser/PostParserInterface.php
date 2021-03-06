<?php

/*
 * This file is part of the NayzoApiDocBundle.
 *
 * (c) Nayzo <alakhefifi@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nayzo\ApiDocBundle\Parser;

/**
 * This is the interface parsers must implement in order to register a second parsing pass after the initial structure
 * is populated..
 */
interface PostParserInterface
{
    /**
     * Reparses an object for additional documentation details after it has already been parsed once, to allow
     * parsers to extend information initially documented by other parsers.
     *
     * Returns an array of class property metadata where each item is a key (the property name) and
     * an array of data with the following keys:
     *  - dataType          string
     *  - required          boolean
     *  - description       string
     *  - readonly          boolean
     *  - children          (optional) array of nested property names mapped to arrays
     *                      in the format described here
     *
     * @param  string $item       The string type of input to parse.
     * @param  array  $parameters The previously-parsed parameters array.
     * @return array
     */
    public function postParse(array $item, array $parameters);
}
