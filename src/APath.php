<?php

/**
 * Class APath
 * XPath-like data access for PHP arrays and objects
 *
 * @author  Vladimir Osipov
 * @date    26.05.2013
 */
class APath
{
    protected $varName;
    protected $object = array();

    /**
     * Constructor
     *
     * @param $object
     */
    public function __construct($object = null)
    {
        if ($object) $this->reInit($object);
    }

    /**
     * Initializes parser with an object
     *
     * @param $object
     */
    public function reInit($object)
    {
        $this->varName = '';
        $this->object  = $object;
    }

    /**
     * Returns a value from the specified node
     *
     * @param $varPath
     * @param bool $skipNulls
     * @param null $root
     * @return array|null
     * @throws Exception
     */
    public function get($varPath = '', $skipNulls = true, $root = null)
    {
        if (!$root)
        {
            $root = $this->object;
            $this->varName = $varPath;
        }
        $root = (array) $root;

        $varNames = (array) explode('/', $varPath, 2);

        if (empty($varNames[0])) return $root;

        if (count($varNames) == 2)
        {
            if (isset ($root[$varNames[0]])) return $this->get($varNames[1], $skipNulls, $root[$varNames[0]]);
            else if ($skipNulls)             return null;
        }
        else
        {
            if (isset ($root[$varNames[0]])) return $root[$varNames[0]];
            else if ($skipNulls)             return null;
        }

        // in the default case just report an error
        throw new Exception('Variable not found within [' . $this->varName . ']');
    }
}