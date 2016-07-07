<?php // 8queens - AJAX status page v0.0.1

global $attacked;

if( !isset($_GET['b']) || !$_GET['b'] ) { print 'ERROR - no move made'; exit; }

$board = @$_GET['b'];
$ba = @json_decode($board, $assoc=true);
if( !$ba ) { $ba = array(); }

$queens_on_board = queens_on_board($ba);
$queens_under_attack = queens_under_attack($ba);
$moves = '?';
if( is_array($attacked) && $queens_on_board > 1 ) {
  $att = ': '  . implode(', ', $attacked);
} else {
  $att = '';
}

if( $queens_on_board == 8 && $queens_under_attack == 0 ) {
  $solution = '<span style="color:green;font-weight:bold;">Solution Found!  Congrats Human!!</span>';
} else {
  $solution = '<span style="color:red;">NOT Solved yet</span>';
}

print '
   <ul>
   <li>' . $solution . '
   <li><b>' . $queens_on_board . '</b> Queens on board
   <li><b>' . $queens_under_attack . '</b> Queens under attack' . $att . '
   </ul>
';

//////////////////////////////////////////////////////////////
function queens_on_board($ba) {
   if( !is_array($ba) ) { return 'ERROR'; }
   return sizeof($ba);
}

//////////////////////////////////////////////////////////////
function queens_under_attack($ba) {
   global $attacked; // for display outside of this function
   if( !is_array($ba) ) { return 'ERROR'; }
   if( sizeof($ba) <= 1 ) { return '0'; } // 1 or 0 pieces? no worry
   $bax = $ba; // 2nd compare array
   $attacked = array();
   while( list($position,$piece) = each($ba) ) {
     if( in_array($position,$attacked) ) { continue; } // already found attack
     reset($bax);
     while( list($xposition,$xpiece) = each($bax) ) {
       if( in_array($xposition,$attacked) ) { continue; } // already found attack
       if( $xposition == $position ) { continue; } // ignore self
       $col = $position[0]; $row = $position[1];
       $xcol = $xposition[0]; $xrow = $xposition[1];
       if( $col == $xcol || $row == $xrow ) {  // check attacks on rows and columns
         $attacked[] = $position; $attacked[] = $xposition; $attacked = array_unique($attacked);
         continue;
       }
       //print "<br />check " . alpha2num($col) . ":$row against " . alpha2num($xcol) . ":$xrow";

       if( abs(alpha2num($col)-alpha2num($xcol)) == abs($row-$xrow) ) { // check diagonals
         $attacked[] = $position; $attacked[] = $xposition; $attacked = array_unique($attacked);
         continue;
       }

     }
   }
   //print "attacked="; print_r($attacked);
   return sizeof($attacked);

}


function alpha2num($alpha) {
  switch($alpha) {
   default: return 0;
   case 'a': return 1; case 'b': return 2; case 'c': return 3; case 'd': return 4;
   case 'e': return 5; case 'f': return 6; case 'g': return 7; case 'h': return 8;
  }
}
