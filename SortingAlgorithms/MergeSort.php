<?php
/**
 * Merge sort is a divide and conquer algorithm. It works as follows:
 * 1. Divide the unsorted list into n sublists, each containing 1 element (a list of 1 element is considered sorted).
 * 2. Repeatedly merge sublists to produce new sorted sublists until there is only 1 sublist remaining. This will be the sorted list.
 *
 * First divide the list into the smallest unit (1 element), then compare each element with the adjacent list to sort and merge the two adjacent lists.
 * Finally all the elements are sorted and merged.
 *
 * It sorts arrays by dividing them recursively into halves (DIVIDE) and then sorting and merging them back together (CONQUER).
 * The good thing about this algorithm is it preserves order of equal elements (if you have two 26s in an array, merge sort will place the one that came earlier in the original array on the left side).
 * Here is PHP implementation consisting of two functions: divide and conquer
 *
 +-----------------------------+----------------------------+
 | Class	                   | Sorting algorithm          |
 | Data structure              | Array                      |
 | Worst-case performance      | O(n log n)                 |
 | Best-case performance       | O(n log n) typical,        |
 |                             | O(n) natural variant       |
 | Average performance         | O(n log n)                 |
 | Worst-case space complexity | О(n) total, O(n) auxiliary |
 +-----------------------------+----------------------------+
 *
 */

$array = array();
for ($i = 0; $i < 100; ++$i) {
    $array[] = $i;
}

// Shuffle the array
shuffle($array);
$sortedArray = divide($array);
var_dump($sortedArray);

/**
 * @param array $array
 * @return array
 */
function divide(array $array)
{
    if (1 === count($array)) {
        return $array;
    }

    $left = $right = array();
    $middle = round(count($array) / 2);

    // Divide in left and right array
    for ($i = 0; $i < $middle; ++$i) {
        $left[] = $array[$i];
    }
    for ($i = $middle; $i < count($array); ++$i) {
        $right[] = $array[$i];
    }

    // recursively
    $left = divide($left);
    $right = divide($right);

    return conquer($left, $right);
}

/**
 * @param array $left
 * @param array $right
 * @return array
 */
function conquer(array $left, array $right)
{
    $result = array();
    while (count($left) > 0 || count($right) > 0) {
        if (count($left) > 0 && count($right) > 0) {
            $firstLeft = current($left);
            $firstRight = current($right);
            if ($firstLeft <= $firstRight) {
                $result[] = array_shift($left);
            } else {
                $result[] = array_shift($right);
            }
        } else if (count($left) > 0) {
            $result[] = array_shift($left);
        } else if (count($right) > 0) {
            $result[] = array_shift($right);
        }
    }

    return $result;
}
