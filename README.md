# Attogram Framework 8queens Module v0.0.3

[![Build Status](https://travis-ci.org/attogram/8queens.svg?branch=master)](https://travis-ci.org/attogram/8queens)
[![Latest Stable Version](https://poser.pugx.org/attogram/8queens/v/stable)](https://packagist.org/packages/attogram/8queens)
[![Latest Unstable Version](https://poser.pugx.org/attogram/8queens/v/unstable)](https://packagist.org/packages/attogram/8queens)
[![Total Downloads](https://poser.pugx.org/attogram/8queens/downloads)](https://packagist.org/packages/attogram/8queens)
[![License](https://poser.pugx.org/attogram/8queens/license)](https://github.com/attogram/8queens/blob/master/LICENSE.md)
[`[CHANGELOG]`](https://github.com/attogram/8queens/blob/master/CHANGELOG.md)
[`[TODO]`](https://github.com/attogram/8queens/blob/master/TODO.md)

Play the 8 Queens puzzle!

This is the 8queens Module for the [Attogram Framework](https://github.com/attogram/attogram).

# Installing the 8queens Module
* You already installed the [Attogram Framework](https://github.com/attogram/attogram), didn't you?
* Goto the top level of your install, then run:
```
composer create-project attogram/8queens modules/8queens
```

# 8queens Module contents

* Public Actions:
 * `actions/home.php` - 8queens home page
 * `actions/license.php` - 8queens license page
 * `actions/readme.php` - 8qeens readme page
 * `actions/about.php` - 8queens about page
 * `actions/solutions.php` - Finding solutions in PHP page
 * `actions/92.php` - The 92 solutions page
 * `actions/status.php` - AJAX board status script

* Configurations:
 * `config/8queens_config.php` - Attogram config for 8queens site

* Public Files:
 * `public/cjs030/css/*` - chessboard.js CSS Files
 * `public/cjs030/js/*` - chessboard.js javascript Files
 * `public/img/*.png` - images of chess pieces
 * `public/css.css` - 8queens global CSS file

* Templates:
 * `templates/header.php` - Page header, overriding Attogram default header
 * `templates/footer.php` - Page footer, overriding Attogram default footer

* Misc:
 * `tests/` - phpunit tests
 * `solve/solve8queens.php` - Randomly solve the 8queens puzzle
 * `solve/solve8queens_2.php` - Not so randomly solve the 8queens puzzle
 * `solve/solve8queens_3.php` - The solutions for the 8queens puzzle
