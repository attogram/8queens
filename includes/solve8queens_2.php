<?php
// Find all 8 Queens solutions
// modified from http://rosettacode.org/wiki/N-queens_problem#PHP

function solve8queens_2() {

  $boardX = 8;
  $boardY = 8;

  // create the different possible rows
  for ($x = 0; $x < $boardX; ++$x){ $row[$x] = 1 << $x; }

  // create all the possible orders of rows, will be equal to [boardY]!
  $solcount = 0;
  $solutions = array();
  while ($row != false) {
    if(checkBoard($row,$boardX)){
      if(!in_array($row,$solutions)){
        $solutions[] = $row;
        $solutions = findRotation($row,$boardX,$solutions);
        ++$solcount;
      }
    }
    $row = pc_next_permutation($row);
  }
  return $solutions;
} // end function


//////////////////////////////////////////////////
 
// Function to rotate a board 90 degrees
function rotateBoard($p, $boardX) {
 $a=0;
 while ($a < count($p)) {
  $b = strlen(decbin($p[$a]))-1;
  $tmp[$b] = 1 << ($boardX - $a - 1);
  ++$a;
 }
 ksort($tmp);
 return $tmp;
}
 
// This function will find rotations of a solution
function findRotation($p, $boardX,$solutions){
 $tmp = rotateBoard($p,$boardX);
 // Rotated 90
 if (in_array($tmp,$solutions)) {} else {$solutions[] = $tmp;}
 $tmp = rotateBoard($tmp,$boardX);
 // Rotated 180
 if (in_array($tmp,$solutions)){} else {$solutions[] = $tmp;}
 $tmp = rotateBoard($tmp,$boardX);
 // Rotated 270
 if (in_array($tmp,$solutions)){} else {$solutions[] = $tmp;}
 
 // Reflected
 $tmp = array_reverse($p);
 if (in_array($tmp,$solutions)){} else {$solutions[] = $tmp;}
 
 $tmp = rotateBoard($tmp,$boardX);
 // Reflected and Rotated 90
 if (in_array($tmp,$solutions)){} else {$solutions[] = $tmp;}
 
 $tmp = rotateBoard($tmp,$boardX);
 // Reflected and Rotated 180
 if (in_array($tmp,$solutions)){} else {$solutions[] = $tmp;}
 
 $tmp = rotateBoard($tmp,$boardX);
 // Reflected and Rotated 270
 if (in_array($tmp,$solutions)){} else {$solutions[] = $tmp;}

 return $solutions;
}
 
// output board in chessboard.js/JSON format
function renderBoard($p,$boardX) {
 $sol = array();
 for ($y = 0; $y < $boardX; ++$y) {
  for ($x = 0; $x < $boardX; ++$x) {
   if ($p[$y] == 1 << $x) { $sol[] = numtoalpha($x) . ($y+1); }
  }
 }
 $solution = join(":'wQ', ",$sol);
 return "{ $solution:'wQ' }" ;
}

function numtoalpha($n) {
  switch($n) { 
   default: return;
   case '0': return 'a'; case '1': return 'b'; case '2': return 'c'; case '3': return 'd';
   case '4': return 'e'; case '5': return 'f'; case '6': return 'g'; case '7': return 'h';
  }
} 

//This function allows me to generate the next order of rows.
function pc_next_permutation($p) {
  $size = count($p) - 1;
  // slide down the array looking for where we're smaller than the next guy 
  for ($i = $size - 1; $p[$i] >= $p[$i+1]; --$i) { } 
  // if this doesn't occur, we've finished our permutations 
  // the array is reversed: (1, 2, 3, 4) => (4, 3, 2, 1) 
  if ($i == -1) { return false; } 
  // slide down the array looking for a bigger number than what we found before 
  for ($j = $size; $p[$j] <= $p[$i]; --$j) { } 
  // swap them 
  $tmp = $p[$i]; $p[$i] = $p[$j]; $p[$j] = $tmp; 
  // now reverse the elements in between by swapping the ends 
  for (++$i, $j = $size; $i < $j; ++$i, --$j) { $tmp = $p[$i]; $p[$i] = $p[$j]; $p[$j] = $tmp; } 
  return $p; 
} 
 
// check the current state to see if there are any solutions
function checkBoard($p,$boardX) {
  $a = 0; // the row being checked
  while ($a < count($p)) { 
    $b = 1;
    while ($b < ($boardX - $a)){
      $x = $p[$a+$b] << $b; // shift p[a+b], b bits left
      $y = $p[$a+$b] >> $b; // shift p[a+b], b bits right
      if ($p[$a] == $x | $p[$a] == $y) { return false; } // a queen is under attack
      ++$b;
    }
    ++$a; 
  }
  return true;
}
 
 
