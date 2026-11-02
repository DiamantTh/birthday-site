<?php
declare(strict_types=1);

$stylesVersion = filemtime(__DIR__ . '/assets/app.css') ?: 0;
$scriptVersion = filemtime(__DIR__ . '/assets/app.js') ?: 0;
?>
<!doctype html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Persönliche Geburtstagsseite" />
    <title>Geburtstagsseite</title>
    <script type="module" crossorigin src="/assets/app.js?v=<?= (int) $scriptVersion ?>" defer></script>
    <link rel="stylesheet" crossorigin href="/assets/app.css?v=<?= (int) $stylesVersion ?>">
  </head>
  <body>
    <div id="app"></div>
  </body>
</html>
