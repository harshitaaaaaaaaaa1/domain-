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
      background-color: #AAC9CE;
      flex-direction: column;
      align-items: center;
      border: 5px solid black;
      padding: 5px;
    }

    .destination-item img {
      border: 2px solid black;
      width: 150px;
      height: 150px;
      object-fit: cover;
    }

    .empty-layout {
      width: 200px;
      height: 200px;
      margin: 10px;
    }
  </style>
</head>
<body>
  <h1></h1>

  <div class="destination" id="domainDestination">
    <?php
    // Array of two-letter domain names
    $domains = file("name.txt", FILE_IGNORE_NEW_LINES);

    // Generate screenshot URLs for each domain
    $count = 0;
    foreach($domains as $domain) {
      $screenshotUrlCoIn = "https://s0.wp.com/mshots/v1/https://{$domain}.au?w=200";
      $screenshotUrlIn = "https://s0.wp.com/mshots/v1/https://{$domain}.com.au?w=200";

      echo '<div class="destination-item">';
      echo '<img src="' . $screenshotUrlCoIn . '" alt="' . $domain . '">';
      echo '<h3>' . $domain . '.au/h3>';
      echo '<img src="' . $screenshotUrlIn . '" alt="' . $domain . '">';
      echo '<h3>' . $domain . '.com.au</h3>';
      echo '</div>';

      $count++;
      if ($count == 10) {
        echo '<div class="empty-layout"></div>';
        $count = 0;
      }
    }

    // Check if additional empty layout is needed
    if ($count > 0 && $count < 3) {
      while ($count < 3) {
        echo '<div class="empty-layout"></div>';
        $count++;
      }
    }
    ?>
  </div>
</body>
</html>
