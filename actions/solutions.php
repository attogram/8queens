<?php // 8queens - Solutions page v0.0.1

set_time_limit(120);

include_once( __DIR__ . '/../solve/solve8queens.php' );
include_once( __DIR__ . '/../solve/solve8queens_2.php' );
include_once( __DIR__ . '/../solve/solve8queens_3.php' );

$this->page_header('8 Queens - Solutions');

?>

<table border="0" cellpadding="0" cellspacing="0">
 <tr>

  <td valign="top" style="padding:10px 20px 0px 30px;">

<div class="body">
<b>Finding solutions to the <a href="../">8 Queens</a> puzzle</b>

<p>
There are <b>4,426,165,368</b> possible arrangements of eight queens on an 8x8 chess board.
<br />
There are <b><a href="../92/">92</a></b> solutions, but only <b>12</b> fundamental solutions when taking account of
board rotations and reflections.
</p>

<p><hr/></p>
<ul>
<li><a href="#1">Method 1 - Brute force with starting constraints</a>
<li><a href="#2">Method 2 - Bitwise math, 12 fundamentals + rotation/reflection</a>
<li><a href="#3">Method 3 - Hard code!</a>

<p><hr/></p>

<a name="1"></a>
<br /> <b>Method 1</b>: Be lazy and use brute force.
<br /> Constrain the starting board positions to only those with 1 queen per each row and column.
<br /> Slow but workable for 8x8 boards.
<?php
$s = array(); $n = 3;
//if( isset($_GET['n']) && is_numeric($_GET['n']) ) { $n = $_GET['n']; }
print '<hr /> Method 1 Test run: ' . $n . ' runs, each run testing up to 1000 permutations.';
$start = start_timer();
for( $i=0; $i < $n; $i++ ) { $solution = solve8queens(); if( $solution ) { $s[] = $solution; } }
$end = end_timer();
$s = array_unique($s);
sort($s);
print '<br /> Time: ' . $end . ' seconds';
print '<br /> Results: ' . sizeof($s) . ' unique solutions found. (Click to view on chess board)<br /><pre>';
print '<div style="border:1px solid black;padding:10px;height:70px;overflow:auto;">';
foreach( $s as $sol ) { print '<a target="_sol" href="../?b=' . urlencode($sol) . '">' . $sol . '</a><br />'; }
print '</div>';
print '</pre><br /><hr />Method 1: PHP Code:<br />';
print '<div style="border:1px solid black;padding:10px;height:300px;overflow:auto;">';
highlight_file(__DIR__ . '/../solve/solve8queens.php');
print '</div>';



print '<a name="2"></a>';
print '<br /><br />
<br /> <b>Method 2</b>: Find all solutions, using bitwise math for board checks,
<br /> first finds the 12 fundamental solutions, then the <a href="../92/">92</a> based on rotations/reflections.
<hr /> Method 2 Test run: ';
$start = start_timer();
$s = solve8queens_2();
$end = end_timer();
print '<br /> Time: ' . $end . ' seconds';
$sols = array();
foreach( $s as $sol ) {
  $b = renderBoard($sol,8);
  $sols[] = '<a target="_sol" href="../?b=' . urlencode($b) . '">' . $b . '</a>';
}
sort($sols);
print '<br /> Results: ' . sizeof($sols) . ' unique solutions found. (Click to view on chess board)<br /><pre>';
print '<div style="border:1px solid black;padding:10px;height:200px;overflow:auto;">';
foreach( $sols as $b ) {
  print $b . '<br />';
}
print '</div>';
print '</pre><br /><hr />Method 2: PHP Code:<br />';
print '<div style="border:1px solid black;padding:10px;height:300px;overflow:auto;">';
highlight_file(__DIR__ . '/../solve/solve8queens_2.php');
print '</div>';



print '<a name="3"></a>
<br /> <b>Method 3</b>: Hard code!
<br /> Why waste time computing all solutions on every page load?  Just do it once.
<br /> Use any method to solve all <a href="../92/">92</a> solutions,
<br /> then hardcode the results into your <a href="../">program</a> to use as needed!
<br /> Absolutely the fastest method ;)';
print '<br /><hr />Method 3: PHP Code:<br />';
print '<div style="border:1px solid black;padding:10px;height:300px;overflow:auto;">';
highlight_file(__DIR__ . '/../solve/solve8queens_3.php');
print '</div>';
print '</td></tr></table>';

$this->page_footer();

function start_timer() {
    global $stime;
    $stime = microtime(1);
}

function end_timer() {
    global $stime;
    $end = microtime(1);
    $diff = round( $end - $stime, 18);
    return round($diff,5);
}
