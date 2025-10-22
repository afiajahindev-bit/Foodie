const found = document.getElementById('found').value;
// console.log(found);
document.querySelector('.fork').addEventListener('click',()=>{
    fork();
  });
  const forkbutton = document.querySelector('.fork');

forkbutton.classList.add('forked');
window.onload = function() {
  // Your JavaScript code here
  if(found>0)
  {
    forkbutton.classList.add('forked');
    forkbutton.innerText = 'Forked';
    forkbutton.style.backgroundColor = "rgba(166, 43, 43)";
    document.getElementById('ff').src = "forked.png"
   
  }

}
const forkedbutton = document.querySelector('.forked');
function fork() {
    const buttonElement = document.querySelector('.fork');
  

    if (buttonElement.innerText === 'Fork') {
      buttonElement.innerHTML = 'Forked';
      document.getElementById('ff').src = "forked.png"
      buttonElement.classList.add('forked');


      const xhr = new XMLHttpRequest();

      xhr.open("GET", "insertForker.php");
      
      xhr.onload = function() {
        if (xhr.status == 200) {
          // The PHP file was executed successfully.
          const responseText = xhr.responseText;
          // Do something with the response text.
        } else {
          // The PHP file was not executed successfully.
          console.log("The PHP file was not executed successfully.");
        }
      };
      
      xhr.send();
      window.location.href = window.location.href;

      
     
    } else {
      buttonElement.innerHTML = 'Fork';
      document.getElementById('ff').src = "fork.png"
      buttonElement.classList.remove('forked');
      
      const xhr = new XMLHttpRequest();

      xhr.open("GET", "deleteForker.php");
      
      xhr.onload = function() {
        if (xhr.status == 200) {
          // The PHP file was executed successfully.
          const responseText = xhr.responseText;
          // Do something with the response text.
        } else {
          // The PHP file was not executed successfully.
          console.log("The PHP file was not executed successfully.");
        }
      };
      
      xhr.send();
      window.location.href = window.location.href;

    }

   

  }