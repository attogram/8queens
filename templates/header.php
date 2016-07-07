<?php // 8queens - header v0.0.1


if( !isset($title) || !$title || !is_string($title) ) {
  $title = 'Play 8 Queens';
}

?><!doctype html><html><head>
<title><?php print $title; ?></title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="<?php print $this->path; ?>/web/css.css">
</head><body>
