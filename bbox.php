<?php

function getOverlapAoverB($a_key, $b_key) {
  $overlap = 0;

  $articles = array(
    'A' => [[20, 12], [-3, -11]],
    'B' => [[9, 7], [-6, -2]],
    'C' => [[25, 20], [-12, -5]],
    'D' => [[19, -8], [7, -14]],
    'E' => [[-9, 14], [-18, 9]],
    'F' => [[-5, -7], [-18, -16]],
  );

  $a = array(
    'north_east_lat' => $articles[$a_key][0][0],
    'north_east_lng' => $articles[$a_key][0][1],
    'south_west_lat' => $articles[$a_key][1][0],
    'south_west_lng' => $articles[$a_key][1][1],
  );

  $b = array(
    'north_east_lat' => $articles[$b_key][0][0],
    'north_east_lng' => $articles[$b_key][0][1],
    'south_west_lat' => $articles[$b_key][1][0],
    'south_west_lng' => $articles[$b_key][1][1],
  );

  // Three cases:

  // Partly contains

  // A is fully contained by B
  if ($a['south_west_lat'] > $b['south_west_lat'] && $a['north_east_lat'] < $b['north_east_lat']) {
    echo $a_key . ' is fully contained by ' . $b_key . ': '. $overlap . "\n";
  }

  // A fully contains B
  elseif ($a['south_west_lat'] < $b['south_west_lat'] && $a['north_east_lat'] > $b['north_east_lat']) {
    echo $a_key . ' fully contains ' . $b_key . ': '. $overlap . "\n";
  }

  // A partly contains B
  elseif ($a['south_west_lat'] > $b['south_west_lat'] && $a['south_west_lat'] < $b['north_east_lat'] ||
    $a['north_east_lat'] > $b['south_west_lat'] && $a['south_west_lat'] < $b['north_east_lat']) {
    echo $a_key . ' partly contains ' . $b_key . ': '. $overlap . "\n";
  }

  return $overlap;
}

getOverlapAoverB('A', 'B');
getOverlapAoverB('A', 'C');
getOverlapAoverB('A', 'D');
getOverlapAoverB('A', 'E');
getOverlapAoverB('A', 'F');
