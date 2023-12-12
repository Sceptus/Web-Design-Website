const homeButton = document.getElementById("homeButton");
const imageMapButton = document.getElementById("imageMapButton");
const musicAlbumButton = document.getElementById("musicAlbumButton");
const inputFormButton = document.getElementById("inputFormButton");
const webCloneButton = document.getElementById("webCloneButton");
const javascriptButton = document.getElementById("javascriptButton");
const phpButton = document.getElementById("phpButton");
const phpFormButton = document.getElementById("phpFormButton");
const phpSessionButton = document.getElementById("phpSessionButton");
const phpLoginButton = document.getElementById("phpLoginButton");

const headerButtons = [
  homeButton,
  imageMapButton,
  musicAlbumButton,
  inputFormButton,
  webCloneButton,
  javascriptButton,
  phpButton,
  phpFormButton,
  phpSessionButton,
  phpLoginButton,
];

if (window.location.pathname.includes("javascriptPage")) {
  const a_value = document.getElementById("a-value");
  const b_value = document.getElementById("b-value");
  const c_value = document.getElementById("c-value");
  const quadraticAnswerDisplay = document.getElementById("quadraticAnswerDisplay");
  const quadraticCalculate = document.getElementById("quadraticCalculate");

  quadraticCalculate.onclick = () => {
    const a = parseFloat(a_value.value);
    const b = parseFloat(b_value.value);
    const c = parseFloat(c_value.value);

    const answer1 = (-1 * b + Math.sqrt(Math.pow(b, 2) - 4 * a * c)) / (2 * a);
    const answer2 = (-1 * b - Math.sqrt(Math.pow(b, 2) - 4 * a * c)) / (2 * a);

    if (isNaN(answer1) && isNaN(answer2)) {
      quadraticAnswerDisplay.innerHTML = "No answer!";
    } else if (isNaN(answer1)) {
      quadraticAnswerDisplay.innerHTML = "x = " + answer2;
    } else if (isNaN(answer2)) {
      quadraticAnswerDisplay.innerHTML = "x = " + answer1;
    } else if (answer1 == answer2) {
      quadraticAnswerDisplay.innerHTML = "x = " + answer1;
    } else {
      quadraticAnswerDisplay.innerHTML = "x = " + answer1 + "<br />x = " + answer2;
    }
  };

  const coinDisplay = document.getElementById("coinDisplay");
  const flipCoin = document.getElementById("flipCoin");

  flipCoin.onclick = () => {
    const result = Boolean(Math.floor(Math.random() * 2)) ? "Heads" : "Tails";
    coinDisplay.innerHTML = "Result: " + result;
  };

  const cookieDisplay = document.getElementById("cookieDisplay");
  const clickCookie = document.getElementById("clickCookie");
  let cookies = 0;

  clickCookie.onclick = () => {
    cookieDisplay.innerHTML = "Cookies: " + ++cookies;
  };

  const cpsDisplay = document.getElementById("cpsDisplay");
  const cpsButton = document.getElementById("cpsButton");
  let date = new Date();
  let time = date.getTime() / 1000;
  let prevTime = time;

  cpsButton.onclick = () => {
    date = new Date();
    time = date.getTime() / 1000;
    const deltaTime = time - prevTime;
    cpsDisplay.innerHTML = "CPS: " + Math.round(1 / deltaTime);
    prevTime = time;
  };

  const rngDisplay = document.getElementById("rngDisplay");
  const rngButton = document.getElementById("rngButton");

  rngButton.onclick = () => {
    rngDisplay.innerHTML = "RNG: " + Math.round(Math.random() * 10);
  };
}

if (window.location.pathname.includes("inputForm")) {
  const calculatorForm1 = document.getElementById("calculatorForm1");
  const operations = document.getElementById("operations");
  const calculatorForm2 = document.getElementById("calculatorForm2");
  const calculateButton = document.getElementById("calculateButton");
  const answer = document.getElementById("answer");

  const calculator = {
    "+": (a, b) => a + b,
    "-": (a, b) => a - b,
    "/": (a, b) => a / b,
    "*": (a, b) => a * b,
  };

  calculateButton.onclick = () => {
    answer.innerHTML =
      "= " + calculator[operations.value](Number(calculatorForm1.value), Number(calculatorForm2.value));
  };
}

//HEADER CODE
for (let i = 0; i < headerButtons.length; i++) {
  headerButtons[i].onmouseover = () => {
    headerButtons[i].style.backgroundColor = "rgb(36, 36, 36)";
  };
  headerButtons[i].onmouseout = () => {
    headerButtons[i].style.backgroundColor = "black";
  };
  headerButtons[i].onmousedown = () => {
    headerButtons[i].style.backgroundColor = "rgb(50, 50, 50)";
  };
  headerButtons[i].onmousereleased = () => {
    headerButtons[i].style.backgroundColor = "black";
  };
}
