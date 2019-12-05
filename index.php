<?php
$dataUri = 'data:image/svg+xml;base64,' . urlencode(base64_encode(str_replace("\n", ' ', file_get_contents(__DIR__.'/test.svg')))); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Intégration SVG</title>
	<style>
		:root {
			--custom-outside: #0ff;
		}

		.outside-class {
			fill: #f0f;
		}

		div.svg-wrapper {
			color: #ff0;
		}

		.background-wrapper {
			display: inline-block;
			height: 100px;
			width: 600px;
		}

		.swatch {
			display: inline-block;
			height: 1em;
			width: 1em;
		}

		summary {
			cursor: pointer;
		}
	</style>
</head>
<body>
	<h1>Intégration SVG</h1>

	<details>
		<summary>Légende</summary>
		<div>
			<ul>
				<li>
					<div class="swatch" style="background-color: #000;"></div>
					Fonctionnalité indisponible
				</li>
				<li>
					<div class="swatch" style="background-color: #f00;"></div>
					Couleur en dur
				</li>
				<li>
					<div class="swatch" style="background-color: #ff0;"></div>
					Couleur CSS "currentColor"
				</li>
				<li>
					<div class="swatch" style="background-color: #0f0;"></div>
					Custom property inclue dans le fichier SVG
				</li>
				<li>
					<div class="swatch" style="background-color: #0ff;"></div>
					Custom property dans le fichier HTML englobant
				</li>
				<li>
					<div class="swatch" style="background-color: #00f;"></div>
					Classe CSS inclue dans le SVG
				</li>
				<li>
					<div class="swatch" style="background-color: #f0f;"></div>
					Classe CSS dans le fichier HTML englobant
				</li>
				<li>
					Clic sur le SVG - si un message apparaît, alors le javascript embarqué est exécuté.
				</li>
			</ul>
		</div>
	</details>
	
	<h2>SVG in HTML</h2>
	<div class="svg-wrapper">
		<?= file_get_contents(__DIR__.'/test.svg') ?>
	</div>
	
	<h2>SVG in HTML + use</h2>
	<div class="svg-wrapper">
		<svg width="600" height="100">
			<use href="svg-use-proxy.php#test-svg"></use>
		</svg>
	</div>
	
	<h2>object data="URL"</h2>
	<div class="svg-wrapper">
		<object data="test.svg" height="100" width="600" type="image/svg+xml"></object>
	</div>

	<h2>object data="data-uri"</h2>
	<div class="svg-wrapper">
		<object data="<?= $dataUri ?>" height="100" width="600" type="image/svg+xml"></object>
	</div>

	<h2>&lt;img src="URL"&gt;</h2>
	<div class="svg-wrapper">
		<img src="test.svg" alt="">
	</div>
	
	<h2>&lt;img src="data-uri"&gt;</h2>
	<div class="svg-wrapper">
		<img src="<?= $dataUri ?>" alt="">
	</div>
	
	<h2>background-image: URL</h2>
	<div class="svg-wrapper">
		<div class="background-wrapper" style="background-image: url(test.svg)"></div>
	</div>

	<h2>background-image: data-uri</h2>
	<div class="svg-wrapper">
		<div class="background-wrapper" style="background-image: url('<?= $dataUri ?>')"></div>
	</div>
</body>
</html>
