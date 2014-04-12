<?php
/**
 * Copyright 2011 Bas de Nooijer. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this listof conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * The views and conclusions contained in the software and documentation are
 * those of the authors and should not be interpreted as representing official
 * policies, either expressed or implied, of the copyright holder.
 *
 * @copyright Copyright 2011 Bas de Nooijer <solarium@raspberry.nl>
 * @license http://github.com/basdenooijer/solarium/raw/master/COPYING
 * @link http://www.solarium-project.org/
 *
 * @package Solarium
 * @subpackage Result
 */

/**
 * Select component grouping query group result
 *
 * @since 2.1.0
 *
 * @package Solarium
 * @subpackage Result
 */
class Solarium_Result_Select_Grouping_QueryGroup implements IteratorAggregate, Countable
{

    /**
     * Match count
     *
     * @var int
     */
    protected $_matches;

    /**
     * NumFound value
     *
     * @var int
     */
    protected $_numFound;

    /**
     * Start offset
     *
     * @var int
     */
    protected $_start;

    /**
     * Maximum score in group
     * 
     * @var float
     */
    protected $_maximumScore;

    /**
     * Group documents array
     *
     * @var array
     */
    protected $_documents;
    
    /**
     * Constructor
     *
     * @param int $matches
     * @param int $numFound
     * @param int $start
     * @param float $maximumScore
     * @param array $documents
     * @return void
     */
    public function __construct($matches, $numFound, $start, $maximumScore, $documents)
    {
        $this->_matches = $matches;
        $this->_numFound = $numFound;
        $this->_start = $start;
        $this->_maximumScore = $maximumScore;
        $this->_documents = $documents;
    }

    /**
     * Get matches value
     *
     * @return int
     */
    public function getMatches()
    {
        return $this->_matches;
    }

    /**
     * Get numFound value
     *
     * @return int
     */
    public function getNumFound()
    {
        return $this->_numFound;
    }

    /**
     * Get start value
     *
     * @return int
     */
    public function getStart()
    {
        return $this->_start;
    }

    /**
     * Get maximumScore value
     *
     * @return int
     */
    public function getMaximumScore()
    {
        return $this->_maximumScore;
    }

    /**
     * Get all documents
     *
     * @return array
     */
    public function getDocuments()
    {
        return $this->_documents;
    }
    
    /**
     * IteratorAggregate implementation
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_documents);
    }

    /**
     * Countable implementation
     *
     * @return int
     */
    public function count()
    {
        return count($this->_documents);
    }
}
