// second.js

import myFunction from 'popup.js';
document.getElementById('rev').value = myFunction();
document.getElementById("sbutton").click();

console.log(myFunction()); // 123

let rev = rev();
document.getElementById("submit-button").style.display = "none";
document.getElementById("results").style.display = "none";
let resultt = document.getElementById('result').value;
// Get the agree and disagree buttons
const agreeButton = document.querySelector('.button.agree');
const disagreeButton = document.querySelector('.button.disagree');

// Set the initial boolean values for the agree and disagree buttons
let agree = false;
let disagree = false;
if(resultt === "agree")
{
    // Set the agree boolean value to true
    agree = !agree;

// Set the disagree boolean value to false
disagree = false;

// Update the CSS classes of the agree and disagree buttons
agreeButton.classList.toggle('agree');
agreeButton.classList.remove('disagree');

//agreeButton.innerText = 'agreed';


}
else if(resultt === "disagree")
{
      // Set the disagree boolean value to true
  disagree = !disagree;

// Set the agree boolean value to false
agree = false;

// Update the CSS classes of the agree and disagree buttons
disagreeButton.classList.toggle('disagree');
disagreeButton.classList.remove('agree');
//disagreeButton.innerText = 'Disagreed';


}

// Add event listeners to the agree and disagree buttons
agreeButton.addEventListener('click', () => {
  // Set the agree boolean value to true
  agree = !agree;

  // Set the disagree boolean value to false
  disagree = false;

  // Update the CSS classes of the agree and disagree buttons
  agreeButton.classList.toggle('agree');
  agreeButton.classList.remove('disagree');

  disagreeButton.classList.remove('disagree');
  disagreeButton.classList.remove('agree');


result(agree, disagree);

});

disagreeButton.addEventListener('click', () => {
  // Set the disagree boolean value to true
  disagree = !disagree;

  // Set the agree boolean value to false
  agree = false;

  // Update the CSS classes of the agree and disagree buttons
  disagreeButton.classList.toggle('disagree');
  disagreeButton.classList.remove('agree');

  agreeButton.classList.remove('agree');
  agreeButton.classList.remove('disagree');


result(agree, disagree);

});

function result(agree, disagree) {
  const result = agree ? "agree" : (disagree ? "disagree" : "none");

  document.getElementById('results').value = result;

    document.getElementById("submit-button").click();

}