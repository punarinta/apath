<?php

require_once 'src/APath.php';

echo "<pre>";

$sampleArray = array
(
    'data-1' => array
    (
        'data-4' => array
        (
            'data-5' => 'hello, world',
            'data-6',
            'data-7' => 'my index in the parent is 2',
        ),
    ),
    'data-2' => array
    (
        'data-8',
        'data-9' => 'bye-bye, world',
    ),
    array(1, 4, 'data-3', 88),
);


$ap = new APath($sampleArray);

// output all
print_r($ap->get());                      // path '/' supported as well

// output value key path
print_r($ap->get('data-1/data-4/data-5'));

// output node by key path
print_r($ap->get('data-1/data-4'));       // can also have a trailing slash

/**
 * Mixed and indexed accesses are not yet implemented
 */

// output mixed path
//print_r($ap->get('2'));

// output indexed path
//print_r($ap->get(''));

print_r($sampleArray[2]);