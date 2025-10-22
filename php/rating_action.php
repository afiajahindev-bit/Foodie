<?php require_once("database.php");
include("functions.php");

$user_id = $user_value['id'];

if (isset($_POST['action'])) {

  $postid = $_POST['rev_id'];
  $action = $_POST['action'];
  switch ($action) {
    case 'like':
      $vote_action = 'like';
      insert_vote($user_id, $postid, $vote_action, $db);
      break;
    case 'dislike':
      $vote_action = 'dislike';
      insert_vote($user_id, $postid, $vote_action, $db);
      break;
    case 'unlike':
      delete_vote($user_id, $postid, $db);

      break;
    case 'undislike':
      delete_vote($user_id, $postid, $db);
      break;
    default:
  }
  // execute query to effect changes in the database ...
  echo getRating($postid, $db);
  exit(0);
}
?>