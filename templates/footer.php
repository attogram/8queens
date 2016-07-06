<?php
// Attogram - template - footer

?>
<footer><div class="footer">
<nobr><a href="<?php print $this->path; ?>/">Play 8 Queens</a>
<nobr> &nbsp;|&nbsp; <a href="<?php print $this->path; ?>/about/">About the 8 Queens Puzzle</a></nobr>
<nobr> &nbsp;|&nbsp; <a href="<?php print $this->path; ?>/solutions/">Finding solutions in PHP</a></nobr>
<nobr> &nbsp;|&nbsp; <a href="<?php print $this->path; ?>/92/">The 92 solutions</a></nobr>
<br />
<nobr> &nbsp;|&nbsp; Served to <?php print @$_SERVER['REMOTE_ADDR']; ?> @ <?php print gmdate('Y-m-d H:i:s'); ?> UTC</nobr>
</div></footer>
</body></html>
