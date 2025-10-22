var rev_id;
function rev(){
 rev_id= document.getElementById('rev_id').value;


  // Get the second page's URL
  const popupUrl = 'popup.php';
  console.log(rev_id);

  // Create a new popup window
  const popupWindow = window.open(popupUrl, 'popupWindow', 'width=600,height=400');

  // Center the popup window
  popupWindow.moveTo(screen.width / 2 - 300, screen.height / 2 - 200);

  myFunction();
}


export default function myFunction() {
  return rev_id;
}
