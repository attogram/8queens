<?php
// 8queens - About page v0.0.2

$this->pageHeader('About the 8 Queens puzzle');
?>

<table border="0" cellpadding="0" cellspacing="0">
 <tr>


 <td valign="top" style="padding:10px 20px 0px 30px;">
<div class="body">

<h1>About the <a href="../">8 Queens puzzle</a></h1>

<p>
The eight queens puzzle is the problem of placing eight chess queens on an 8x8 chessboard
so that no two queens threaten each other.
<br /><br />
Thus, a <a href="../solutions/">solution</a> requires that no two queens share the same row, column, or diagonal.
<br /><br />
The eight queens puzzle is an example of the more general n-queens problem of placing n queens on an nxn chessboard,
where solutions exist for all natural numbers n with the exception of n=2 or n=3.
<br /><br />
( from:
<a target="8q" href="http://en.wikipedia.org/wiki/Eight_queens_puzzle">http://en.wikipedia.org/wiki/Eight_queens_puzzle</a>
)
</p>

<p><a href="../">Play 8 Queens Now!</a></p>

More:
<ul>
<li><a target="8q" href="http://mathworld.wolfram.com/QueensProblem.html">http://mathworld.wolfram.com/QueensProblem.html</a>
<li><a target="8q" href="http://rosettacode.org/wiki/N-Queens#PHP">http://rosettacode.org/wiki/N-Queens#PHP</a>
<li><a target="8q" href="http://en.wikibooks.org/wiki/Algorithm_Implementation/Miscellaneous/N-Queens">http://en.wikibooks.org/wiki/Algorithm_Implementation/Miscellaneous/N-Queens</a>
<li><a target="8q" href="http://www.brainmetrix.com/8-queens/">http://www.brainmetrix.com/8-queens/</a>
<li><a target="8q" href="http://www.datagenetics.com/blog/august42012/">http://www.datagenetics.com/blog/august42012/</a>
</ul>

</div>
</td></tr></table>


<?php
$this->pageFooter();
