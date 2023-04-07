/*
var myHeading = document.querySelector('h1');
// querySelector get the reference of heading 1 and store it as myHeading
myHeading.textContent = 'Hello world!';

// define function
function multiply(n1, n2){
    let res = n1*n2;
    return res;
}

// define event
document.querySelector('img').onclick = function() {
    alert('Surprise PKUers!');
}
*/

var myImage = document.querySelector('img');

myImage.onclick = function() {
    let mySrc = myImage.getAttribute('src');
    if(mySrc === 'images/PKU_logo.png') {
      myImage.setAttribute ('src','images/CAAS_logo.png');
    } else if(mySrc === 'images/CAAS_logo.png') {
      myImage.setAttribute ('src','images/THU_logo.png');
    } else {
      myImage.setAttribute ('src','images/PKU_logo.png');
    }
}

// user-tailored design
var myButton = document.querySelector('button');
var myHeading = document.querySelector('h1');
// define username function
function setUserName() {
  let myName = prompt('Please enter your name.'); //ask the user to enter info
  if(!myName || myName === null) { //restart the function if there's no username entered
    setUserName();
  } else {
    localStorage.setItem('name', myName);
    myHeading.innerHTML = 'Welcome to Program DB, ' + myName;
  }
}
// set up logic
if(!localStorage.getItem('name')) { //if name doens't exit
  setUserName(); //then prompt the user to give a name
} else {
  let storedName = localStorage.getItem('name');
  myHeading.innerHTML = 'Welcome to Program DB, ' + storedName;
}
// link the function with the button
myButton.onclick = function() {
  setUserName();
}