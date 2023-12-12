<?php

/* 
Requirements
We need 5 circles in a row. 
They should be in the following order. Red, Green, Blue, Orange and Yellow.
When they are hovered, text should appear under the icon that states what the color is 
  and all other icons in the row should fade out to a 50% opacity.
Once the icon is clicked it should appear in a row below the original row and become a square. 
When it is hovered, it should have the same effect as the circles.
  State the color above the icon and fade out the other icons in the row.
  When a square is clicked, the square should become a circle and be placed first in the circle row.

Page should be responsive, have a black background except when viewing on mobile, background should be white,
  Open Sans font should be used, the site title should be your name and date, center content and code should be commented. 
  Use any libraries you are comfortable with, just list them on the page after the circles and squares in a “Made with” section. 

*/


// array of initial columns mapped to the possible color variations
$columns = [
  'red',
  'green',
  'blue',
  'orange',
  'yellow'
];
// return string
$returnString = '';
// guide string array
$guides = [];
// column guide string
$guides['column'] = '
  <div class="column col-lg">
    <div class="button bg-%1$s square-container">
      <div class="square-content">
      </div>
    </div>
    <p>%2$s</p>
  </div>
';
foreach ($columns as $col) {
  $returnString .= sprintf($guides['column'], $col, $col);
}


/* 
  mocking up standard html document minimally here,
  this is intended to simulate a custom page template, custom block, or combination 
    rather than truly being a standalone from-scratch web page
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- would be enqueued by theme/plugin -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <title>Kyle Marcy - 12/12/2023</title>
</head>

<body>
  <!-- this section container just demarks the feature we are building within the surrounding scaffolding -->
  <section id="spinu--container" class="container">
    <div class="container-lg text-center">
      <div class="row justify-content-center" id="row-of-circles">
        <?php echo $returnString; ?>
      </div>
      <div class="row justify-content-center" id="row-of-squares"></div>
    </div>
  </section>

  <!-- thanks thats all -->
  <footer>
    <section>
      <p>Made width:</p>
      <ul>
        <li>Bootstrap</li>
        <li>Webpack</li>
        <li>MAMP / Local</li>
      </ul>
    </section>
    <script type="module" src="dist/main.js"></script>
  </footer>
</body>

</html>