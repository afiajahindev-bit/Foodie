<?php 
require_once("database.php");

function userLikesDislikes($rev_id,$user_id,$result,$db)
{
        $sql="SELECT COUNT(*) FROM ad WHERE user_id=:user_id 
        AND rev_id=:rev_id AND result=:result";
         $stmt = $db->prepare($sql);
 $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':rev_id', $rev_id, PDO::PARAM_INT);
      $stmt->bindParam(':result', $result, PDO::PARAM_STR);
       $stmt->execute();
$count = $stmt->fetchColumn();
  if ($count > 0) {
    return true;
  }else{
    return false;
  }
}
function getLikesDislikes($rev_id,$result,$db)
{
     $sql="SELECT COUNT(*) FROM ad WHERE rev_id = :rev_id AND result=:result";
          $stmt = $db->prepare($sql);
    $stmt->bindParam(':rev_id', $rev_id, PDO::PARAM_INT);
      $stmt->bindParam(':result', $result, PDO::PARAM_STR);
 $stmt->execute();
        $number_of_rows = $stmt->fetchColumn(); 
        return $number_of_rows;  
}
function getforkers($reviewers, $db)
{
  $sql="SELECT COUNT(*) FROM forkers WHERE reviewers = :reviewers";
  $stmt = $db->prepare($sql);
$stmt->bindParam(':reviewers', $reviewers, PDO::PARAM_INT);

$stmt->execute();
$number_of_rows = $stmt->fetchColumn(); 
return $number_of_rows;  
}
function insert_vote($user_id,$rev_id,$result,$db){
  $food_id = $_SESSION['food_id'];
         $sql="INSERT INTO ad(user_id, rev_id, result,food_id) 
             VALUES (:user_id, :rev_id, :result,:food_id) 
             ON DUPLICATE KEY UPDATE result=:result";
     $stmt = $db->prepare($sql); 
       $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
       $stmt->bindParam(':rev_id', $rev_id, PDO::PARAM_INT);
       $stmt->bindParam(':result', $result, PDO::PARAM_STR);
       $stmt->bindParam(':food_id', $food_id, PDO::PARAM_INT);

    $stmt->execute();
      }
      function delete_vote($user_id,$rev_id,$db){
         $sql="DELETE FROM ad WHERE user_id=:user_id AND rev_id=:rev_id";
     $stmt = $db->prepare($sql); 
       $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
       $stmt->bindParam(':rev_id', $rev_id, PDO::PARAM_INT);
    $stmt->execute();
      }
      function getRating($rev_id,$connect)
{
  $rating = array();
     $likes=getLikesDislikes($rev_id,'like',$connect);
     $dislikes=getLikesDislikes($rev_id,'dislike',$connect);
  $rating = [
    'likes' => $likes,
    'dislikes' => $dislikes
  ];
  return json_encode($rating);
}
?> 
