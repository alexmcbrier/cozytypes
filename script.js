
//Web elements
const displayText = document.getElementById('wordsWrapper')
const displayInput = document.getElementById('textInput') // Input Box
const displayTimer = document.getElementById('time') // Time Display
const displayWPM = document.getElementById('wpmDisplay') // wpm Display
var timerVar = "not running" // Turns on when user begins typing...
var sentenceLength = getCookie("words");
var sentence = []
var words = [] //word elements
var currentWordNum = 0;
var time = 15;

function changeTime(value)
{
  time = value;
  setCookie("time", value, 30);
}
function changeWords(value)
{
  time = value;
  setCookie("words", value, 30);
}


var duration = 0;
//var for after test is over
var wpm = 0;
var count = 0
var lastWord = 0
function setCookie(cName, cValue, expDays) {
  let date = new Date();
  date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
  const expires = "expires=" + date.toUTCString();
  document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
  document.location.reload();
}
function checkCookie(cName) {
  let name = getCookie(cName);
  if (name != "") {
    return true;
  } else {
    return false;
  }
}
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
//Executes after each keystroke
displayInput.addEventListener('input', keystroke)
function keystroke()
{
  startTimer();
  moveCursor();
  let word = document.getElementsByClassName('current-word')[0] //Only want 1 value in class list
  let chars = word.querySelectorAll('letter')
  let inputChars =  displayInput.value.split('');
  let wordChars =  word.innerText.split('');

  for (let i = 0; i < chars.length; i++) //need to remove previous when user deletes
  {
    chars[i].classList.remove("correct")
    chars[i].classList.remove("incorrect")
  }
  for (let i = 0; i < displayInput.value.length && i < chars.length; i++) //use input length (Only check however many you actually typed in not the whole word) ALSO cannot be longer than the word
  {
    if (inputChars.length <= wordChars.length) //extra characters
    {
      if (inputChars[i] == wordChars[i])
      {
        chars[i].classList.add("correct") //right letter
        //changing the caret position
      }
      else if (inputChars[i] == " ") //skip spaces
      {
        continue
      }
      else
      {
        chars[i].classList.add("incorrect") //wrong letter
        
        //changing the caret position
      }
    }
    else // in the case that there are extra letters but you still need to underline the first ones
    {
      if(i < chars.length)
      {
        if (inputChars[i] == wordChars[i])
        {
          chars[i].classList.add("correct") 
        }
        else
        {
          chars[i].classList.add("incorrect")
        }
      }
    }
  }
  //index is which word they are on as well
  //what this does is look for a seperation in the top px.
  //if the current word is lower than the last word than they need to shift down (:

  if (inputChars[inputChars.length - 1] == " ") //Checking for space bar on the last entered character ALSO runs a check to see if the word was spelled right or not
  {
    displayInput.value  = ""; //reset the typing input box
    words[currentWordNum].className = 'word'; //start out thinking the word is right
    if (inputChars.length < chars.length + 1) //word is too short
    {
      wrongWord(words, chars)
    }
    for (let i = 0; i < inputChars.length - 1; i++)
    {
      try {
        if (!chars[i].classList.contains('correct')) //wrong
        {
          wrongWord(words, chars)
        }
      } catch (TypeError) { //wrong also because too many letters
        wrongWord(words, chars)
      }
    }
    //CHECKING TO SEE IF ON NEXT LINE (should probably make a function)
    currentWordNum++;
    words[currentWordNum].className = 'current-word';
    //restart animatioin
    const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    const currentWordIndex = Array.from(
      placement.parentElement.children
    ).indexOf(placement);
    const lastWordIndex = currentWordIndex - 1;
    if (lastWordIndex >= 0) //cannot be negative
    {
      const rect = placement.getBoundingClientRect();
      const lastWord = document.getElementsByClassName('word')[0];
      const rect2 = lastWord.getBoundingClientRect();

      if (rect.y > rect2.y)
      {
        displayText.style.marginTop = (rect2.y - rect.y)  + "px";
      }
    }
    //moving the cursor
    moveCursor();
  }
  //remove extras
  if (inputChars.length > chars.length - 1) //extra characters
      {
        const elements = document.getElementsByClassName('extra');
        while(elements.length > 0){
            elements[0].parentNode.removeChild(elements[0]);
        }
        for (let i = 0; i < inputChars.length - chars.length; i++)
        {
          const letter = document.createElement('extra')
          letter.classList.add("extra")
          let inputLength = inputChars.length - chars.length
          letter.innerText = (displayInput.value.substring(chars.length+i, chars.length+i+1))
          word.appendChild(letter)

        }
        moveCursor();
      }
  var currentWord = displayText.getElementsByClassName('current-word')[0];
  if (currentWord == lastWord && inputChars[inputChars.length - 1] != " ") //dont include space
  {
    var last = currentWord.querySelectorAll('letter')
    var lastLetter = last[last.length - 1]
    if (lastLetter.classList.contains('correct') || lastLetter.classList.contains('incorrect')) //the last letter can be both correct or incorrect
    {
      endTest()
    }
  }
}
function restart() {
  displayTimer.innerText = getTime(getCookie("time"))
  newQuote()
  timerVar = "not running"
}
function randomQuote() {
  displayText.innerText = ''// removing previous sentence if applicable
  var wordList = ["the","be","to","of","and","a","in","that","have","I","it","for","not","on","with","he","as","you","do","at","this","but","his","by","from","they","we","say","her","she","or","an","will","my","one","all","would","there","their","what","so","up","out","if","about","who","get","which","go","me","when","make","can","like","time","no","just","him","know","take","people","into","year","your","good","some","could","them","see","other","than","then","now","look","only","come","its","over","think","also","back","after","use","two","how","our","work","first","well","way","even","new","want","because","any","these","give","day","most","us"]
  for (let i = 0; i < sentenceLength; i++) 
  {
      sentence[i] = wordList[Math.floor(Math.random() * wordList.length)] //prevent repeats from occuring, very janky
      const index = wordList.indexOf(sentence[i]);
      if (index > -1) 
      { 
        wordList.splice(index, 1); 
      }
  }
}
function wordsPerMinute(testDuration) {
    const timeIn = time - testDuration
    const correctText = displayText.querySelectorAll('.correct').length
    const wpm = Math.round(correctText/5/timeIn*60)
    return wpm
}
async function newQuote(){
    displayTimer.innerHTML = getTime(getCookie("time")) //sets the time (does not begin timer however)
    displayInput.addEventListener('input', () => {startTimer() }) //starts the timer on input
    randomQuote() //creates a new random quote (Values stored inside sentence Array)
    for(let i = 0; i < sentenceLength; i++) 
    {
      const word = document.createElement('div')
      if (i == 0) //first Word
      {
        word.className = "current-word"
      }
      else{
        word.className = "word";
      }
      for (let j = 0; j < sentence[i].length; j++) 
      {
        const letter = document.createElement('letter')
        letter.innerText = (sentence[i].substring(j, j+1))
        word.appendChild(letter)
        displayText.appendChild(word)
      }
      words[i] = word //adds each element
    }
    count = displayText.getElementsByClassName('word').length + displayText.getElementsByClassName('incorrect-word').length; //not including current word
    lastWord = displayText.getElementsByClassName('word')[count-1]//Only want 1 value in class list
}
function startTimer() {
    if (timerVar != "running") {
      startTime = new Date()
      setInterval(() => {
        duration =  Math.floor(time+1 - (new Date() - startTime) / 1000)
        displayTimer.innerText = getTime(duration)
        displayWPM.innerText = wordsPerMinute(duration) + " WPM"
        if (duration <= 0) {
          endTest()
        }
      }, 1000)
      timerVar = "running"

    }
}
function getAccuracy()
{
  const correct = displayText.querySelectorAll('.correct').length
  const incorrect = displayText.querySelectorAll('.incorrect').length
  const total = correct + incorrect;
  return parseInt(correct / total * 100);
}
function getTime(time) {
  var minutes = Math.floor(time / 60);
  var seconds = time - minutes * 60;
  var finalTime = str_pad_left(minutes,'0',1)+':'+str_pad_left(seconds,'0',2);
  return finalTime
}
function str_pad_left(string,pad,length) {
  return (new Array(length+1).join(pad)+string).slice(-length);
}
function wrongWord(words, charecters)
{
  words[currentWordNum].className = 'incorrect-word'; 
  for (let i = 0; i < charecters.length; i++)
  {
    charecters[i].classList.add("incorrect")
  }
}
function endTest() {
  //this is where all the data is sent from javascript to php
  wpmFinal = wordsPerMinute(duration)
  accuracy = getAccuracy();
  window.location.href="index.php?finish=true&testTime=" + time + "&wpm=" + wpmFinal + "&accuracy=" + accuracy;
}
function moveCursor()
{
  const cursor = document.getElementById('cursor') 
  const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
  const rect = placement.getBoundingClientRect();
  cursor.style.left = rect.x + "px";
  cursor.style.width = rect.width + "px";
}
function moveCursorWithY()
{
  const cursor = document.getElementById('cursor') 
  const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
  const rect = placement.getBoundingClientRect();
  cursor.style.left = rect.x + "px";
  cursor.style.top = rect.y + "px";
  cursor.style.width = rect.width + "px";
}
function setBlur()
{
  if(getCookie("lineCount") > 1)
  {
    let lines = getCookie("lineCount");
    let height = window.getComputedStyle(document.getElementById('testText')).getPropertyValue("height").replace("px", "") //remove px
    let boxHeight = (height / lines * (lines - 1))
    console.log(boxHeight)
    const blurBox = document.createElement('div')
    blurBox.style.height = boxHeight + "px"
    blurBox.style.width = window.getComputedStyle(document.getElementById('testText')).getPropertyValue("width")
    blurBox.classList.add("box")
    const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    const rect = placement.getBoundingClientRect();
    blurBox.style.top = rect.y + "px";
    document.body.appendChild(blurBox)


  }
}

newQuote();
moveCursorWithY();
setBlur();
