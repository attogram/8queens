<?php // Attogram Framework - 8queens module - solve8queens v0.0.4

/**
 * Solve 8 Queens puzzle using brute force, with queens randomly placed 1 per row/column
 * modified from https://gist.github.com/Xeoncross/1015646
 * modified from http://paulbutler.org/archives/n-queens-in-a-tweet/
 * @param int $boardSize
 * @param int $attempts
 * @return string    Solution in chessboad.js/JSON format
 */
function solve8queens( $boardSize = 8, $attempts = 1000 )
{
 $counter = 0;
 $board = range( 1, $boardSize ); // init the chess board
 while( $counter <= $attempts ) {
  shuffle( $board ); // randomly place 1 queen per row/column
  $rowsColumns = numeric_array_addition( $board, range( 1, $boardSize ) ); // test for attacks on rows/columns - permutations [1..n]
  $diagonals = numeric_array_addition( numeric_array_addition( $board, range( $boardSize, 1 ) ), 2 * $boardSize ); // test for attacks on diagonals - permutations [n..1] with constant factor 2*n
  $rowsColumnsDiagonals = array_merge( $rowsColumns, $diagonals ); // combine row/col and diagonals checks.
  if( count( array_unique( $rowsColumnsDiagonals ) ) == 2 * $boardSize ) { // if there are 2*n numbers in the array, then solution is found
   // output in chessboad.js/JSON format, for 8x8 board:
   $board[0] = 'a' . $board[0];
   $board[1] = 'b' . $board[1];
   $board[2] = 'c' . $board[2];
   $board[3] = 'd' . $board[3];
   $board[4] = 'e' . $board[4];
   $board[5] = 'f' . $board[5];
   $board[6] = 'g' . $board[6];
   $board[7] = 'h' . $board[7];
   $solution = join(":'wQ', ",$board);
   return "{ $solution:'wQ' }";
  }
  $counter++;
 }
} // end function solve8queens

/**
 * add two arrays of numbers together
 * @params array $arrayA
 * @params array $arrayB (optional)
 * @return array
 */
function numeric_array_addition( $arrayA, $arrayB )
{
 if( !is_array( $arrayB ) ) { // no second array? make one with all 0's
   $arrayB = array_fill( 0, count( $arrayA ), $arrayB );
 }
 foreach( $arrayA as $name => $value ) {
   $result[ $name ] = $value + $arrayB[ $name ];
 }
 return $result;
}
