<?php
/////////////////////////////////////////////////////////////////////
// Solve 8 Queens Puzzle
// Use brute force, with queens randomly placed 1 per row/column
// modified from https://gist.github.com/Xeoncross/1015646
// modified from http://paulbutler.org/archives/n-queens-in-a-tweet/ 
//
function solve8queens( $n=8, $attempts=1000 ) {
 $i = 0; 
 $s = range(1,$n); // init the chess board
 while( $i <= $attempts ) {
  shuffle($s); // randomly place 1 queen per row/column
  $a = s($s,range(1,$n)); // test for attacks on rows/columns - permutations [1..n]
  $b = s(s($s,range($n,1)),2*$n); // test for attacks on diagonals - permutations [n..1] with constant factor 2*n  
  $c = array_merge($a,$b); // combine row/col and diagonals checks.  
  if( count(array_unique($c))==2*$n ) { // if there are 2*n numbers in the array, then solution is found
   // output in chessboad.js/JSON format, for 8x8 board:
   $s[0] = 'a' . $s[0]; $s[1] = 'b' . $s[1]; $s[2] = 'c' . $s[2]; $s[3] = 'd' . $s[3];
   $s[4] = 'e' . $s[4]; $s[5] = 'f' . $s[5]; $s[6] = 'g' . $s[6]; $s[7] = 'h' . $s[7];
   $solution = join(":'wQ', ",$s);
   return "{ $solution:'wQ' }" ;
  }
  $i++;
 }
} // end function solve8queens

// add two arrays of numbers together
function s($a,$b){
 if( !is_array($b) ) { $b = array_fill(0,count($a),$b); } // no second array? make one with all 0's
 foreach( $a as $i=>$k ) { $r[$i] = $k + $b[$i]; }
 return $r;
}

