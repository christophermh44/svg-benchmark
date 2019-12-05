<?php header('Content-type: image/svg+xml');
$svg = file_get_contents(__DIR__.'/test.svg');
$svg = str_replace('<svg', '<symbol id="test-svg"', $svg);
$svg = str_replace('</svg>', '</symbol>', $svg); ?>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg">
<?= $svg ?>
</svg>
