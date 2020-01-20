<?php
function get_posts(): ?Array {
  // Get the contents of the JSON file 
  $strJsonFileContents = file_get_contents(__DIR__ . "/data/posts.json");

  return json_decode($strJsonFileContents, true);
}

function get_post(int $index): ?Array {
  $posts = get_posts();
  if(!empty($posts) && count($posts) > $index && $index > -1){
    return $posts[$index];
  }

  return null;
}

function create_post($postTitle, $postBody) {
  $previousData = get_posts();

  $previousData[] = array('title' => $postTitle, 'body' => $postBody);

  $newData = json_encode($previousData);
  file_put_contents(__DIR__ . "/data/posts.json", $newData);
}

