//Web elements
const displayText = document.getElementById('testText')
const displayInput = document.getElementById('textInput') // Input Box
const displayTimer = document.getElementById('time') // Time Display
const displayWPM = document.getElementById('wpmDisplay') // wpm Display
var timerVar = "not running" // Turns on when user begins typing...
var sentenceLength = 50;
var sentence = []
var words = [] //word elements
var currentWordNum = 0;
var time = 15;
//var for after test is over
var wpmFinal = 0;
displayTimer.innerHTML = getTime(time) //sets the time (does not begin timer however)
//Executes after each keystroke
displayInput.addEventListener('input', keystroke)
function keystroke()
{
  let word = document.getElementsByClassName('current-word')[0] //Only want 1 value in class list ALWAYS FUCKING 0
  let chars = word.querySelectorAll('letter')
  let inputChars =  displayInput.value.split('');
  let wordChars =  word.innerText.split('');
  for (let i = 0; i < chars.length; i++) //need to remove previous when user deletes
  {
    chars[i].classList.remove("correct")
    chars[i].classList.remove("incorrect")
  }
  for (let i = 0; i < displayInput.value.length; i++) //use input length (Only check however many you actually typed in not the whole word) ALSO cannot be longer than the word
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
  if (inputChars[inputChars.length - 1] == " ") //Checking for space bar on the last entered character ALSO runs a check to see if the word was spelled right or not
  {
    displayInput.value  = ""; //reset the typing input box
    words[currentWordNum].className = 'word'; //start out thinking the word is right
    if (inputChars.length < chars.length) //word is too short
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
    currentWordNum++;
    words[currentWordNum].className = 'current-word';
  }
  if (inputChars.length > wordChars.length) //extra characters
      {
        const letter = document.createElement('extra')
        letter.classList.add("extra")
        let inputLength = displayInput.value.length
        letter.innerText = (displayInput.value.substring(inputLength-1, inputLength))
        word.appendChild(letter)
      }
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
    const listText = displayText.querySelectorAll('span')
    const correctText = displayText.querySelectorAll('.correct').length
    const listValue = displayInput.value.split('')
    const wpm = Math.round(correctText/5/timeIn*60)
    return wpm
}
async function newQuote(){
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
}
function startTimer() {
  displayInput.addEventListener('input', () => {
    if (timerVar != "running") {
      startTime = new Date()
      setInterval(() => {
        var duration =  Math.floor(time+1 - (new Date() - startTime) / 1000)
        displayTimer.innerText = getTime(duration)
        displayWPM.innerText = wordsPerMinute(duration) + " WPM"
        if (duration <= 0) {

          wpmFinal = wordsPerMinute(duration)
          accuracy = getAccuracy();
          endTest(wpmFinal)
        }
      }, 1000)
      timerVar = "running"

    }
  })
}
function getAccuracy()
{
  const correct = displayText.querySelectorAll('.correct').length
  const incorrect = displayText.querySelectorAll('.incorrect').length
  const total = correct + incorrect;
  return parseInt(correct / total * 100);
}
function restart() {
  displayTimer.innerText = getTime(time)
  newQuote()
  timerVar = "not running"
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
function endTest(wpm) {
  //this is where all the data is sent from javascript to php
  window.location.href="index.php?finish=true&testTime=" + time + "&wpm=" + wpmFinal + "&accuracy=" + accuracy;
}
newQuote();