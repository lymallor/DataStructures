<?php
/**
 * Quick sort (partition-exchange sort) is a divide and conquer algorithm. It works as follows:
 * 1. Pick an element, called a pivot, from the array.
 * 2. Partitioning: reorder the array so that all elements with values less than the pivot come before the pivot,
 *    while all elements with values greater than the pivot come after it (equal values can go either way).
 *    After this partitioning, the pivot is in its final position. This is called the partition operation.
 * 3. Recursively apply the above steps to the sub-array of elements with smaller values and separately to the sub-array of elements with greater values.
 *
 * Quick sort is a comparison sort, meaning that it can sort items of any type for which a "less-than" relation (formally, a total order) is defined.
 * Here is PHP implementation for Quick sort
 *
 +-----------------------------+-----------------------------------------+
 | Class                       | Sorting algorithm                       |
 | Data structure              | Array                                   |
 | Worst-case performance      | O(n2)                                   |
 | Best-case performance       | O(n log n) (simple partition),          |
 |                             | O(n) three-way partition and equal keys |
 | Average performance         | O(n log n)                              |
 | Worst-case space complexity | O(n) auxiliary                          |
 +-----------------------------+-----------------------------------------+
 *
 */

/**
 * @param array $array
 * @return array
 */
function quickSort(array $array)
{
    if (count($array) < 2) {
        return $array;
    }

    $left = $right = array();
    reset($array);
    $pivot_key = key($array);
    $pivot = array_shift($array);
    foreach ($array as $key => $value) {
        if ($value < $pivot)
            $left[$key] = $value;
        else
            $right[$key] = $value;
    }

    return array_merge(quickSort($left), array($pivot_key => $pivot), quickSort($right));
}

$array = array(3, 0, 2, 6, -1, 3, 8, 1);
//Using quickSort()
$sortedArray = quickSort($array);    //returns sorted array.
var_dump($sortedArray);
