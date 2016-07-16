<?php
// Attogram Framework - 8queens Module - solve8queens2 v0.0.6
// modified from http://rosettacode.org/wiki/N-queens_problem#PHP

/**
 * Solve the 8 Queens puzzle
 * @return array A list of solutions
*/
function solve8queens2()
{
    $board = 8;
    // create the different possible rows
    for ($x = 0; $x < $board; ++$x) {
        $row[$x] = 1 << $x;
    }
    // create all the possible orders of rows
    $solcount = 0;
    $solutions = array();
    while ($row != false) {
        if (checkBoard($row, $board)) {
            if (!in_array($row, $solutions) ) {
                $solutions[] = $row;
                $solutions = findRotation($row, $board, $solutions);
                ++$solcount;
            }
        }
        $row = nextPermutation($row);
    }
    return $solutions;
}

/**
 * Rotate board 90 degrees
 * @param array $row
 * @param array $board
 * @return array
 */
function rotateBoard($row, $board) {
    $checkRow = 0;
    while ($checkRow < count($row)) {
        $tmp[strlen(decbin($row[$checkRow])) - 1] = 1 << ($board - $checkRow - 1);
        ++$checkRow;
    }
    ksort($tmp);
    return $tmp;
}

/**
 * find rotations of a solution
 * @param array $row
 * @param array $board
 * @param array $solutions
 * @return array
 */
function findRotation($row, $board, $solutions)
{
    $tmp = rotateBoard($row, $board);  // Rotated 90
    if (!in_array($tmp, $solutions)) {
        $solutions[] = $tmp;
    }
    $tmp = rotateBoard($tmp, $board);  // Rotated 180
    if (!in_array($tmp, $solutions) ) {
        $solutions[] = $tmp;
    }
    $tmp = rotateBoard($tmp, $board);  // Rotated 270
    if (!in_array($tmp, $solutions)) {
        $solutions[] = $tmp;
    }
    $tmp = array_reverse($row);  // Reflected
    if (!in_array($tmp, $solutions)) {
        $solutions[] = $tmp;
    }
    $tmp = rotateBoard($tmp, $board);  // Reflected and Rotated 90
    if (!in_array($tmp, $solutions)) {
        $solutions[] = $tmp;
    }
    $tmp = rotateBoard($tmp, $board);  // Reflected and Rotated 180
    if (!in_array($tmp, $solutions)) {
      $solutions[] = $tmp;
    }
    $tmp = rotateBoard( $tmp, $board);  // Reflected and Rotated 270
    if (!in_array($tmp, $solutions)) {
        $solutions[] = $tmp;
    }
    return $solutions;
}

/**
 * output board in chessboard.js/JSON format
 */
function renderBoard($row, $board) {
    $sol = array();
    for ($y = 0; $y < $board; ++$y) {
        for ($x = 0; $x < $board; ++$x) {
            if ($row[$y] == 1 << $x) {
                $sol[] = numtoalpha($x) . ($y + 1);
            }
        }
    }
    $solution = join(":'wQ', ", $sol);
    return "{ $solution:'wQ' }";
}

/**
 * number to chess board alphabet
 * @param int $number
 * @return string
 */
function numtoalpha($number)
{
  switch($number) {
      default:
          return;
      case '0':
          return 'a';
      case '1':
          return 'b';
      case '2':
          return 'c';
      case '3':
          return 'd';
      case '4':
          return 'e';
      case '5':
          return 'f';
      case '6':
          return 'g';
      case '7':
          return 'h';
  }
}

/**
 * Generate the next order of rows
 */
function nextPermutation($row)
{
    $size = count($row) - 1;
    // slide down the array looking for where we're smaller than the next guy
    for ($i = $size - 1; $row[$i] >= $row[$i+1]; --$i) {
    }
    // if this doesn't occur, we've finished our permutations
    // the array is reversed: (1, 2, 3, 4) => (4, 3, 2, 1)
    if ($i == -1) {
        return false;
    }
    // slide down the array looking for a bigger number than what we found before
    for ($j = $size; $row[$j] <= $row[$i]; --$j) {
    }
    // swap them
    $tmp = $row[$i];
    $row[$i] = $row[$j];
    $row[$j] = $tmp;
    // now reverse the elements in between by swapping the ends
    for (++$i, $j = $size; $i < $j; ++$i, --$j) {
        $tmp = $row[$i];
        $row[$i] = $row[$j];
        $row[$j] = $tmp;
    }
    return $row;
}

/**
 * check the current state to see if there are any solutions
 * @param array $row
 * @param array $board
 * @return bool true if no queens under attack, false if a queen under attack
*/
function checkBoard($row, $board)
{
    $checkRow = 0; // the row being checked
    while ($checkRow < count($row)) {
        $bitShift = 1;
        while( $bitShift < ($board - $checkRow) ) {
            $xcheck = $row[$checkRow + $bitShift] << $bitShift; // shift row[ checkRow + bitShift ], bitShift bits left
            $ycheck = $row[$checkRow + $bitShift] >> $bitShift; // shift row[ checkRow + bitShift ], bitShift bits right
            if ($row[$checkRow] == $xcheck | $row[$checkRow] == $ycheck) {
                return false; // a queen is under attack
            }
            ++$bitShift;
        }
        ++$checkRow;
    }
    return true; // no queens under attack
}
