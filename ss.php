<!DOCTYPE html>
<html>
<head>
  <title>Two-Letter Domain Gallery</title>
  <style>
    .destination {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .destination-item {
      margin: 10px;
    }
  </style>
</head>
<body>
  <h1>Two-Letter Domain Gallery</h1>

  <div class="destination" id="domainDestination"><?php
    // Array of two-letter domain names
    $domains = array("manyata","octave");

    // Generate screenshot URLs for each domain
    foreach ($domains as $domain) {
      $screenshotUrl = "https://screenshot.as-a-service.dev/?url=https://{$domain}.co.in"; 


      echo '<div class="destination-item">';
      echo '<img src="' . $screenshotUrl . '" alt="' . $domain . '">';
         
      echo '</div>';
    }
    ?>
  </div>
</body>
</html>