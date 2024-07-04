<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
    .destination {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .destination-item {
      margin: 10px;
      display: flex;
      align-items: center;
    }

    .destination-item img {
      margin-right: 10px;
      width: 200px;
      height: 200px;
    }
  </style>
</head>
<body>
  <h1></h1>

  <div class="destination" id="domainDestination">
    <?php
    // Array of two-letter domain names
    $domains = file("dictionary.txt", FILE_IGNORE_NEW_LINES);

    // Generate screenshot URLs for each domain
    foreach($domains as $domain) {
      $screenshotUrlCoIn = "https://s0.wp.com/mshots/v1/https://{$domain}.co.in?w=200";
      $screenshotUrlIn = "https://s0.wp.com/mshots/v1/https://{$domain}.in?w=200";

      echo '<div class="destination-item">';
      echo '<img src="' . $screenshotUrlCoIn . '" alt="' . $domain . '">';
      echo '<img src="' . $screenshotUrlIn . '" alt="' . $domain . '">';
      echo '<h3>' . $domain . '</h3>';
      echo '</div>';
    }
    ?>
  </div>
</body>
</html>
