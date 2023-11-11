<?php

class test
{
    public ?test $next;

    public int $x;

    public function __construct(int $x)
    {
        $this->x = $x;
    }
}

$a = new test(1);
$b = new test(2);
$c = new test(3);

$a->next = $b;
$b->next = $c;
$c->next = null;


function revertTests(?test $object)
{
    $objects = [$object];

    $current = $object;
    $last = $object;
    while ($last !== null) {
        if ($current->next === null) {
            $last = $current->next;
        } else {
            $current = $current->next;
            $objects[] = $current;
        }
    }

    $objects = array_reverse($objects);

    foreach ($objects as $key => $element) {
        $element->next = null;
        if (isset($objects[$key + 1])) {
            $element->next = $objects[$key + 1];
        }
    }

    return $objects[0];
}

$a = revertTests($a);

var_dump($a);