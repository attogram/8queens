<?php
// 8queens - Home page v0.0.6

$this->pageHeader('Play 8 Queens - the classic chess puzzle')

?>
<link rel="stylesheet" href="<?php print $this->path; ?>/web/cjs030/css/chessboard-0.3.0.css" />
<script src="<?php print $this->path; ?>/web/cjs030/js/jquery-1.10.1.min.js"></script>
<script src="<?php print $this->path; ?>/web/cjs030/js/chessboard-0.3.0.js"></script>

<table border="0" cellpadding="0" cellspacing="0" style="margin: 0px auto;">
 <tr>
  <td valign="top" style="padding:10px 20px 0px 30px;">
    <div id="board1" style="width:350px"></div>
  </td>
  <td valign="top" style="padding:10px 0px 0px 0px;">
   <p><strong>Can you solve the <a href="about/">8 Queens puzzle</a>?</strong></p>
   <div id="status" style="background-color:#efd;padding:2px;">
    <ul>
    <li><span style="color:red;">NOT Solved yet</span>
    <li><b>0</b> Queens on board
    <li><b>0</b> Queens under attack
    </ul>
   </div>
   <div class="body">
    How to play the 8 Queens Puzzle:
    <ul>
    <li>Drag 8 queens onto this chess board
    <li>No queen may be attacking another queen
    <li>Drag existing queens to change positions
    <li>Drop a queen off the board to remove it
    </ul>
    How fast can you find a solution?
    <br /><br />
    Give up? See a <strong><a href="./?solve">random solution</a></strong>!
    <p><small><a href="./">(restart game)</a></small></p>
   </div>
  </td>
 </tr>
</table>
<script>
var onChange = function(oldPos, newPos) {
  var b = JSON.stringify(newPos);
  jQuery.ajax({
    url: "status/",
    data: "b="+b,
    error: function(xhr) { alert("ERROR: status:" +xhr.status+' '+xhr.statusText); },
    success: function(result) { jQuery("#status").html(result); }
  });
};

var cfg = {
 draggable: true,
 dropOffBoard: 'trash',
 sparePieces: true,
<?php

if (isset($_GET['solve'])) {
    include_once(__DIR__.'/../solve/solve8queens.php');
    print ' position: '.solve8queens().",\n";
} elseif (isset($_GET['b'])) {
    print ' position: '.$this->webDisplay($this->request->query->get('b')).",\n";
}

?>
 onChange: onChange,
};
var board1 = new ChessBoard('board1', cfg);

<?php
if (isset($_GET['b'])) {
    print 'onChange( board1.position(), board1.position() );';
}

if (isset($_GET['solve'])) {
    print "jQuery('#status').html('<ul>"
        ."<li><span style=\"color:green;\"><b>RANDOM SOLUTION FOUND!</b></span></li>"
        ."<li>8 Queens on board</li>"
        ."<li>0 Queens under attack<li>"
        ."</ul>');";
}
?>
jQuery('.spare-pieces-top-4028b').remove(); // hide top black spare pieces
jQuery(".spare-pieces-7492f img[src$='wK.png']").remove(); // hide all white sparece pieces except queen...
jQuery(".spare-pieces-7492f img[src$='wR.png']").remove();
jQuery(".spare-pieces-7492f img[src$='wB.png']").remove();
jQuery(".spare-pieces-7492f img[src$='wN.png']").remove();
jQuery(".spare-pieces-7492f img[src$='wP.png']").remove();
</script>
<?php
$this->pageFooter();
