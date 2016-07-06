<?php

$this->page_header('92 solutions to the 8 Queens puzzle');

?>
<link rel="stylesheet" href="<?php print $this->path; ?>/web/cjs030/css/chessboard-0.3.0.css" />
<script src="<?php print $this->path; ?>/web/cjs030/js/jquery-1.10.1.min.js"></script>
<script src="<?php print $this->path; ?>/web/cjs030/js/chessboard-0.3.0.js"></script>
<table border="0" cellpadding="0" cellspacing="0">
 <tr>
 <td valign="top" style="padding:10px 20px 0px 30px;">
<div class="body">
<h1>The 92 solutions to the <a href="../">8 Queens puzzle:</a></h1>
<?php
$s = array(
'a1,e2,h3,f4,c5,g6,b7,d8', 'a1,f2,h3,c4,g5,d6,b7,e8', 'a1,g2,d3,f4,h5,b6,e7,c8', 'a1,g2,e3,h4,b5,d6,f7,c8',
'b1,d2,f3,h4,c5,a6,g7,e8', 'b1,e2,g3,a4,c5,h6,f7,d8', 'b1,e2,g3,d4,a5,h6,f7,c8', 'b1,f2,a3,g4,d5,h6,c7,e8',
'b1,f2,h3,c4,a5,d6,g7,e8', 'b1,g2,c3,f4,h5,e6,a7,d8', 'b1,g2,e3,h4,a5,d6,f7,c8', 'b1,h2,f3,a4,c5,e6,g7,d8',
'c1,a2,g3,e4,h5,b6,d7,f8', 'c1,e2,b3,h4,a5,g6,d7,f8', 'c1,e2,b3,h4,f5,d6,g7,a8', 'c1,e2,g3,a4,d5,b6,h7,f8',
'c1,e2,h3,d4,a5,g6,b7,f8', 'c1,f2,b3,e4,h5,a6,g7,d8', 'c1,f2,b3,g4,a5,d6,h7,e8', 'c1,f2,b3,g4,e5,a6,h7,d8',
'c1,f2,d3,a4,h5,e6,g7,b8', 'c1,f2,d3,b4,h5,e6,g7,a8', 'c1,f2,h3,a4,d5,g6,e7,b8', 'c1,f2,h3,a4,e5,g6,b7,d8',
'c1,f2,h3,b4,d5,a6,g7,e8', 'c1,g2,b3,h4,e5,a6,d7,f8', 'c1,g2,b3,h4,f5,d6,a7,e8', 'c1,h2,d3,g4,a5,f6,b7,e8',
'd1,a2,e3,h4,b5,g6,c7,f8', 'd1,a2,e3,h4,f5,c6,g7,b8', 'd1,b2,e3,h4,f5,a6,c7,g8', 'd1,b2,g3,c4,f5,h6,a7,e8',
'd1,b2,g3,c4,f5,h6,e7,a8', 'd1,b2,g3,e4,a5,h6,f7,c8', 'd1,b2,h3,e4,g5,a6,c7,f8', 'd1,b2,h3,f4,a5,c6,e7,g8',
'd1,f2,a3,e4,b5,h6,c7,g8', 'd1,f2,h3,b4,g5,a6,c7,e8', 'd1,f2,h3,c4,a5,g6,e7,b8', 'd1,g2,a3,h4,e5,b6,f7,c8',
'd1,g2,c3,h4,b5,e6,a7,f8', 'd1,g2,e3,b4,f5,a6,c7,h8', 'd1,g2,e3,c4,a5,f6,h7,b8', 'd1,h2,a3,c4,f5,b6,g7,e8',
'd1,h2,a3,e4,g5,b6,f7,c8', 'd1,h2,e3,c4,a5,g6,b7,f8', 'e1,a2,d3,f4,h5,b6,g7,c8', 'e1,a2,h3,d4,b5,g6,c7,f8',
'e1,a2,h3,f4,c5,g6,b7,d8', 'e1,b2,d3,f4,h5,c6,a7,g8', 'e1,b2,d3,g4,c5,h6,f7,a8', 'e1,b2,f3,a4,g5,d6,h7,c8',
'e1,b2,h3,a4,d5,g6,c7,f8', 'e1,c2,a3,f4,h5,b6,d7,g8', 'e1,c2,a3,g4,b5,h6,f7,d8', 'e1,c2,h3,d4,g5,a6,f7,b8',
'e1,g2,a3,c4,h5,f6,d7,b8', 'e1,g2,a3,d4,b5,h6,f7,c8', 'e1,g2,b3,d4,h5,a6,c7,f8', 'e1,g2,b3,f4,c5,a6,d7,h8',
'e1,g2,b3,f4,c5,a6,h7,d8', 'e1,g2,d3,a4,c5,h6,f7,b8', 'e1,h2,d3,a4,c5,f6,b7,g8', 'e1,h2,d3,a4,g5,b6,f7,c8',
'f1,a2,e3,b4,h5,c6,g7,d8', 'f1,b2,g3,a4,c5,e6,h7,d8', 'f1,b2,g3,a4,d5,h6,e7,c8', 'f1,c2,a3,g4,e5,h6,b7,d8',
'f1,c2,a3,h4,d5,b6,g7,e8', 'f1,c2,a3,h4,e5,b6,d7,g8', 'f1,c2,e3,g4,a5,d6,b7,h8', 'f1,c2,e3,h4,a5,d6,b7,g8',
'f1,c2,g3,b4,d5,h6,a7,e8', 'f1,c2,g3,b4,h5,e6,a7,d8', 'f1,c2,g3,d4,a5,h6,b7,e8', 'f1,d2,a3,e4,h5,b6,g7,c8',
'f1,d2,b3,h4,e5,g6,a7,c8', 'f1,d2,g3,a4,c5,e6,b7,h8', 'f1,d2,g3,a4,h5,b6,e7,c8', 'f1,h2,b3,d4,a5,g6,e7,c8',
'g1,a2,c3,h4,f5,d6,b7,e8', 'g1,b2,d3,a4,h5,e6,c7,f8', 'g1,b2,f3,c4,a5,d6,h7,e8', 'g1,c2,a3,f4,h5,e6,b7,d8',
'g1,c2,h3,b4,e5,a6,f7,d8', 'g1,d2,b3,e4,h5,a6,c7,f8', 'g1,d2,b3,h4,f5,a6,c7,e8', 'g1,e2,c3,a4,f5,h6,b7,d8',
'h1,b2,d3,a4,g5,e6,c7,f8', 'h1,b2,e3,c4,a5,g6,d7,f8', 'h1,c2,a3,f4,b5,e6,g7,d8', 'h1,d2,a3,c4,f5,b6,g7,e8',
);
?>
<style type="text/css">
.bb { width:225px; float:left; padding:4px; font-size:12pt; font-family:helvetica,sans-serif; text-align:center; }
</style>
<?php
for( $x=1; $x <= 92; $x++ ) {
  $pos = list($a,$b,$c,$d,$e,$f,$g,$h) = explode(',',$s[$x-1]);
  print '<div class="bb">' . "$a, $b, $c, $d, $e, $f, $g" . '<br /><div id="b' . $x . '" class="bb"></div></div>';
  print '<script>var b' . $x . ' = new ChessBoard("b' . $x . '",'
  . '{pieceTheme:"../web/img/chesspieces/wikipedia/{piece}.png",position:'
  . "{'$a':'wQ','$b':'wQ','$c':'wQ','$d':'wQ','$e':'wQ','$f':'wQ','$g':'wQ','$h':'wQ'}"
  . '});</script>';
}
?>
<br clear="all" />
</td></tr></table>
<?php
$this->page_footer();
