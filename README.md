# APath

A way to access data in objects and multidimensional arrays.

# Usage
```php
use APath\APath;

$sample =
[
    'foo' =>
    [
        'bar' =>
        [
            'x1' => 'hello, world',
            'x2',
            'x3' => 'bye-bye, world',
        ],
    ],
    'some' =>
    [
        'data',
        'x1337' => 'LEET',
    ],
    [1, 4, 'xxx' => 'yyy', 88],
];

// get the whole structure
print_r(APath::get($sample));

// get by keys
print_r(APath::get($sample, 'foo.bar'));

// or by numeric offset
print_r(APath::get($sample, '0.2'));

// or even combine them
print_r(APath::get($sample, 'some.0'));

// trying to get a non-existent part will simply result a null 
print_r(APath::get($sample, 'some.unreal.path'));

```
