<?php

namespace APath;

/**
 * Class APath
 * A way to access data for multidimensional PHP arrays and objects
 *
 * @author  Vladimir Osipov
 * @date    26.05.2013
 */
class APath
{
    /**
     * Returns a value from the specified node
     *
     * @param object|array $a   -- input array or object
     * @param string $k         -- path to the part you want to extract
     * @return mixed
     */
    static function get($a, $k = null)
    {
        // useful for programmatic control of path
        if (!$k)
        {
            return $a;
        }

        // check that the array actually exists
        if (empty ($a))
        {
            return null;
        }

        $k = [0, $k];
        $a = (array) $a;

        while (1)
        {
            $k = explode('.', $k[1], 2);

            if ((int) $k[0] == $k[0] && $k[0] > 0)
            {
                $k[0] = (int) $k[0];
            }

            if (isset ($a[$k[0]]))
            {
                // we need to go deeper
                $a = $a[$k[0]];
            }
            else
            {
                return null;
            }

            if (count($k) === 1)
            {
                // we've reached the end
                break;
            }
        }

        return $a;
    }
}