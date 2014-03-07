<?php

// Composer autoload dependencies
require 'vendor/autoload.php';

// Imagine
$imagine = new Imagine\Gd\Imagine();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Image Tint Prototype</title>
</head>
<body>

	<h1>The Magic Pinker</h1>

	<?php
	/**
	 * Tint images via Imagine
	 * 
	 * @note Imagine doesn't accept a leading `/` in file paths. E.g.,
	 *     `/img/src/1.png` will throw a "Fatal Error: File doesn't exist",
	 *     whereas `img/src/1.png` works perfectly.
	 * 
     * @see http://imagine.readthedocs.org/en/latest/usage/colors.html
	 * @see http://imagine.readthedocs.org/en/latest/usage/effects.html#colorize
	 */

	// Settings
	$img_src    = 'img/src/';
	$img_dest   = 'img/';
	$img_name   = '1.png';
	$img_suffix = '-pink';
	$color      = '#ff00d0';

    // File paths
	$img_src_path  = $img_src . $img_name;
    $name          = pathinfo($img_name, PATHINFO_FILENAME);
    $ext           = pathinfo($img_name, PATHINFO_EXTENSION);
	$img_dest_path = $img_dest . $name . $img_suffix . '.' . $ext;

	// FX
	$img     = $imagine->open($img_src_path);
	$palette = $img->palette()->color($color);
	$img->effects()->colorize($palette);
	$img->save($img_dest_path);
	?>

	<!-- #Preview -->
	<img src="<?php echo $img_src_path; ?>" alt="Original"> --> <img src="<?php echo $img_dest_path; ?>" alt="Tinted">

</body>
</html>