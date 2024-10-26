//Web elements
const displayText = document.getElementById('wordsWrapper')
const displayInput = document.getElementById('textInput') // Input Box
//const displayTimer = document.getElementById('time') // Time Display
const displayWPM = document.getElementById('wpmDisplay') // wpm Display
const mainContent = document.getElementById('mainContent') // wpm Display
const footer = document.getElementById("footer")
const typingMode = document.getElementById("typingmode")
const hotkey  = document.getElementById("hotkey")
var timerStatus = false; // Turns on when user begins typing...
var check = null;
var sentenceLength = 50;
var sentence = []
var words = []
var currentWordNum = 0;
var time = 0;
var duration = 0;
var wpm = 0;
var count = 0
var lastWord = 0;

const texts = {};

async function loadText(title) {
    try {
        const response = await fetch(`texts/${title}.txt`);
        if (!response.ok) {
            throw new Error(`File not found: ${title}.txt`);
        }
        const text = await response.text();
        texts[title] = text; // Store the text, which includes new lines
    } catch (error) {
        console.error('Error loading text:', error);
    }
}

// Load all texts at the start (you can do this on page load)
async function loadAllTexts() {
    const titles = ["harryPotter", "catcherInTheRye", "huckleberryFinn", "walden", "doNotGoGentleIntoThatGoodNight", "theRaven", "theRoadNotTaken"];
    for (const title of titles) {
        await loadText(title);
    }
}





window.addEventListener('keydown', function (event) { //restart test if tab key
  // Check if the pressed key is the 'Tab' key (key code 9)
  if (event.key === 'Tab' || event.keyCode === 9) {
    // Prevent the default tab key behavior
    event.preventDefault();

    // restart typing test
    restart();

  }
});
if (getStorageItem("typingMode") == "words")
{
    sentenceLength = getStorageItem("words")
    time = 0;
}
if (getStorageItem("typingMode") == "time")
{
    sentenceLength = 200;
    time = getStorageItem("time");
}
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
    for (let i = 0; i < ca.length; i++) {
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
function findDistanceBetween(words)
{
    const placement = document.getElementsByClassName('word')[0]; //Only want 1 value in class list
    const firstWord = placement.getBoundingClientRect().y;
    for (let i = 0; i < words.length; i++)
    {
        const current = document.getElementsByClassName('word')[i]; //Only want 1 value in class list
        const currentWord = current.getBoundingClientRect().y;
        if (currentWord > firstWord)
        {
            return(currentWord -firstWord)
        }
    }
}
displayInput?.addEventListener('input', keystroke)
function keystroke() {
    moveCursor();
    let word = document.getElementsByClassName('current-word')[0] //Only want 1 value in class list
    let chars = word.querySelectorAll('letter')
    let inputChars = displayInput?.value.split('');
    let wordChars = word.innerText.split('');
    for (let i = 0; i < chars.length; i++) //need to remove previous when user deletes
    {
        chars[i].classList.remove("correct")
        chars[i].classList.remove("incorrect")
    }
    for (let i = 0; i < displayInput?.value.length && i < chars.length; i++) //use input length (Only check however many you actually typed in not the whole word) ALSO cannot be longer than the word
    {
        if (inputChars.length <= wordChars.length) //extra characters
        {
            if (inputChars[i] == wordChars[i]) {
                chars[i].classList.add("correct") //right letter
                //changing the caret position
            }
            else if (inputChars[i] == " ") //skip spaces
            {
                continue;
            }
            else {
                chars[i].classList.add("incorrect") //wrong letter

                //changing the caret position
            }
        }
        else // in the case that there are extra letters but you still need to underline the first ones
        {
            if (i < chars.length) {
                if (inputChars[i] == wordChars[i]) {
                    chars[i].classList.add("correct")
                }
                else {
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
        displayInput.value = ""; //reset the typing input box
        words[currentWordNum].className = 'word'; //start out thinking the word is right
        if (inputChars.length < chars.length + 1) //word is too short
        {
            wrongWord(words, chars)
        }
        for (let i = 0; i < inputChars.length - 1; i++) {
            try {
                if (!chars[i].classList.contains('correct')) //wrong
                {
                    wrongWord(words, chars);
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
            const distance = findDistanceBetween(words); //distance between the lines
            const currentWord = placement.getBoundingClientRect().y;
            const firstWord = document.getElementsByClassName('word')[0].getBoundingClientRect().y;
            const lineCount = getStorageItem("lineCount")
            if (distance * (lineCount - 1) <= (currentWord - firstWord)) //return the one before last
            {
                displayText.style.marginTop = (distance * (lineCount - 2)) - (currentWord - firstWord) + "px";
            }
        }
        //moving the cursor
        moveCursorWithY();
    }
    //remove extras
    if (inputChars.length > chars.length - 1) //extra characters
    {
        const elements = document.getElementsByClassName('extra');
        while (elements.length > 0) {
            elements[0].parentNode.removeChild(elements[0]);
        }
        for (let i = 0; i < inputChars.length - chars.length; i++) {
            const letter = document.createElement('extra')
            letter.classList.add("extra")
            let inputLength = inputChars.length - chars.length
            letter.innerText = (displayInput?.value.substring(chars.length + i, chars.length + i + 1))
            word.appendChild(letter)

        }
        moveCursor();
    }
    var currentWord = displayText?.getElementsByClassName('current-word')[0];
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
    clearInterval(check);
    currentWordNum = 0;
    timerStatus = false;
    displayWPM.innerHTML = '0 wpm';
    //displayTimer.innerText = getTime(getStorageItem("time"));
    displayInput.focus();
    displayInput.value = "";
    footer.classList.remove('fadeOut');
    typingMode.classList.remove('fadeOut');
    hotkey.classList.remove('fadeOut');
    refresh();
}
 function randomQuote() {
   displayText.innerText = ''; // Remove previous sentence if applicable


   const selectedTitle = getStorageItem("selectedTitle"); // Get the selected book/poem title
   const text = texts[selectedTitle]; // Get the text based on selection
   const words = text.split(/\s+/); // Split the text into words


   for (let i = 0; i < words.length; i++) {
       sentence[i] = words[i]; // Fill sentence with words from the text
   }
}


 


function wordsPerMinute(testDuration) {
    const timeIn = testDuration
    const correctText = displayText?.querySelectorAll('.correct').length
    const wpm = Math.round(correctText / 5 / timeIn * 60)
    return wpm
}
async function newQuote() {
    if (getStorageItem("typingMode") == "time")
    {
        //displayTimer.innerHTML = getTime(getStorageItem("time")) //sets the time (does not begin timer however)
    }
    else
    {
        //displayTimer.innerHTML = getTime(0);
    }
    displayInput.addEventListener('input', () => { startTimer() }) //starts the timer on input
    randomQuote() //creates a new random quote (Values stored inside sentence Array)
    for (let i = 0; i < sentenceLength; i++) {
        const word = document.createElement('div')
        if (i == 0) //first Word
        {
            word.className = "current-word"
        }
        else {
            word.className = "word";
        }
        for (let j = 0; j < sentence[i].length; j++) {
            const letter = document.createElement('letter')
            letter.innerText = (sentence[i].substring(j, j + 1))
            word.appendChild(letter)
            displayText?.appendChild(word)
        }
        words[i] = word //adds each element
    }
    count = displayText?.getElementsByClassName('word').length + displayText?.getElementsByClassName('incorrect-word').length; //not including current word
    lastWord = displayText?.getElementsByClassName('word')[count - 1]//Only want 1 value in class list
}
function startTimer() {
    if (timerStatus == false) {
        footer.classList.add('fadeOut');
        typingMode.classList.add('fadeOut');
        hotkey.classList.add('fadeOut');
        document.getElementById('cursor').style.animation = "none";
        startTime = new Date()
        check = setInterval(function () {

            duration = Math.floor(0 + (new Date() - startTime) / 1000) //1 second intervals
            //displayTimer.innerText = getTime(duration)
            displayWPM.innerText = wordsPerMinute(duration) + " WPM"
        }, 1000)
        timerStatus = true;
    }
}
function getTime(time) {
    var minutes = Math.floor(time / 60);
    var seconds = time - minutes * 60;
    var finalTime = str_pad_left(minutes, '0', 1) + ':' + str_pad_left(seconds, '0', 2);
    return finalTime
}
function str_pad_left(string, pad, length) {
    return (new Array(length + 1).join(pad) + string).slice(-length);
}
function wrongWord(words, charecters) {
    words[currentWordNum].className = 'incorrect-word';
    for (let i = 0; i < charecters.length; i++) {
        charecters[i].classList.add("incorrect")
    }
}
function endTest() {
    document.getElementById('cursor').style.animation = "none";
    document.getElementById('cursor').style.opacity = "0%";
    wpmFinal = wordsPerMinute(duration)
    const correct = displayText?.querySelectorAll('.correct').length //correct characters
    const incorrect = displayText?.querySelectorAll('.incorrect').length //incorrect characters
    const total = correct + incorrect;
    const accuracy = parseInt(correct / total * 100);
    const correctWords = displayText?.querySelectorAll('.word').length + displayText?.querySelectorAll('.current-word').length //correct words
    const incorrectWords = displayText?.querySelectorAll('.incorrect-word').length //incorrect words

    if (getStorageItem("typingMode") == "time")
    {
        window.location.href = "?finish=true&testTime=" + getStorageItem("time") + "&wpm=" + wpmFinal + "&accuracy=" + accuracy + "&mode=time&correctWords=" + correctWords + "&incorrectWords=" + incorrectWords
    }
    else if (getStorageItem("typingMode") == "words")
    {
        window.location.href = "?finish=true&testTime=" + getStorageItem("words") + "&wpm=" + wpmFinal + "&accuracy=" + accuracy + "&mode=words&correctWords=" + correctWords + "&incorrectWords=" + incorrectWords
    }
    
}
function moveCursor()
{
  if (getStorageItem('caret') == "highlightWord") //
  {
    const cursor = document.getElementById('cursor') 
    const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    const rect = placement.getBoundingClientRect();
    cursor.style.left = rect.x + "px";
    cursor.style.width = rect.width + "px";
    cursor.style.animation = "none";
    cursor.style.opacity = "20%";
  }
  else if (getStorageItem('caret') == "underlineWord") //
  {
    const cursor = document.getElementById('cursor') 
    const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    const rect = placement.getBoundingClientRect();
    cursor.style.left = rect.x + "px";
    cursor.style.width = rect.width + "px";
    cursor.style.marginTop = (localStorage.getItem("fontSize") * 1.25) + "rem";
    cursor.style.height = (localStorage.getItem("fontSize") / 4) + "rem";
    cursor.style.animation = "none";
  }
  else if(getStorageItem('caret') == "caret")
  {
    const cursor = document.getElementById('cursor') 
    const parent = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    let chars = parent.querySelectorAll("*");
    let index = displayInput.value.length
    if (index >= chars.length)
    {
      const rect = chars[index - (index - (chars.length - 1))].getBoundingClientRect();
      cursor.style.left = rect.x + rect.width + "px";
    }
    else
    {
      const rect = chars[index].getBoundingClientRect();
      cursor.style.left = rect.x + "px";
    }
  }
  else if(getStorageItem('caret') == "underlineLetter")
  {
    const cursor = document.getElementById('cursor') 
    cursor.style.animation = "none";
    const parent = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    let chars = parent.querySelectorAll("*");
    let index = displayInput.value.length
    cursor.style.marginTop = (localStorage.getItem("fontSize") * 1.25) + "rem";
    cursor.style.height = (localStorage.getItem("fontSize") / 4) + "rem";
    if (index > chars.length - 1)
    {
      const rect = chars[index - (index - (chars.length - 1))].getBoundingClientRect();
      cursor.style.left = rect.x + rect.width - 10 + "px";
      cursor.style.width = rect.width + "px";
    }
    else
    {
      const rect = chars[index].getBoundingClientRect();
      cursor.style.left = rect.x + "px";
      cursor.style.width = rect.width + "px";
    }

  }
  else
  {
    const cursor = document.getElementById('cursor') 
    cursor.style.animation = "none";
    const parent = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    let chars = parent.querySelectorAll("*");
    let index = displayInput.value.length
    if (index > chars.length - 1)
    {
      const rect = chars[index - (index - (chars.length - 1))].getBoundingClientRect();
      cursor.style.left = rect.x + rect.width + "px";
    }
    else
    {
      const rect = chars[index].getBoundingClientRect();
      cursor.style.left = rect.x - 10 + "px";
    }
  }
}
function moveCursorWithY() {
  moveCursor();
  const cursor = document.getElementById('cursor') 
  const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
  const rect = placement.getBoundingClientRect();
  cursor.style.top = rect.y + "px";
}
function setBlur() {
    if (getStorageItem("lineCount") > 1 && getStorageItem("blur") == "on") {
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
        mainContent.appendChild(blurBox)
    }
}
function setCursorVisibility() {
    document.getElementById('cursor').style.visibility = 'visible';
}
function zoomwait() {
    moveCursorWithY();
    document.getElementById('cursor').style.visibility = 'hidden';
    try {
        document.getElementsByClassName('box')[0].remove(); //if has blur box
        setTimeout(() => { moveCursorWithY(), setBlur(), setCursorVisibility(); }, 500);
    } catch (err) {
        setTimeout(() => { moveCursorWithY(), setCursorVisibility(); }, 500);
    }
}
function findItem(name, parentId) {
    const children = document.getElementById(parentId).children // wpm Display
    for (var i = 0; i < children.length; i++) {
        var child = children[i];
        if (getStorageItem(name) == child.innerHTML){
            return child;
        }
    }
}

function refresh() {
    if(window.location.href.indexOf("login") > -1) {
        hotkey.style.visibility = "hidden";
    }
    else if(window.location.href.indexOf("signup") > -1) {
        hotkey.style.visibility = "hidden";
    }
    else if(window.location.href.indexOf("profile") > -1) {
        hotkey.style.visibility = "hidden";
    }
    else if(window.location.href.indexOf("index") > -1) {
        hotkey.style.visibility = "hidden";
    }
    else
    {
        loadAllTexts();
        newQuote();
        setBlur();
        try {
            moveCursorWithY();
        } catch (error) {
            // Ignore the error

        }

        hotkey.style.visibility = "visible";
    }
}
function setTheme(oldTheme, newTheme) {
    const body = document.getElementsByTagName("body")[0];
    body.classList.remove(oldTheme);
    body.classList.add(newTheme);
    currentTheme = newTheme;
    localStorage.setItem("theme", newTheme);
}
function setPreference(type, newPreference)
    {
        const root = document.querySelector(':root');
        root.style.setProperty("--" + type, newPreference);
        localStorage.setItem(type, newPreference);
}
function addNotification(header, description)
{
    var parent = document.getElementById('notifications');
    var element = document.createElement("div");
    element.classList.add('notification');
    var h = document.createElement("div");
    var d = document.createElement("div");
    h.classList.add('notificationH');
    d.classList.add('notificationD');
    h.appendChild(document.createTextNode(header));
    d.appendChild(document.createTextNode(description));

    while (parent.firstChild) {
        parent.removeChild(parent.lastChild);
      }
    element.appendChild(h);
    element.appendChild(d);

    parent.appendChild(element);

    var parent = document.getElementById('notifications');
    var notification = document.createElement("div");
}
function getStorageItem(name) {
    return localStorage.getItem(name);
}
function loadPreferences() {
    //for each preference
    //1. Try to read from local storage, otherwise set to default
    //2. set preference to local storage
    let theme = localStorage.getItem("theme") || "light";
    let fontSize = localStorage.getItem("fontSize") || "3";
    let fontFamily = localStorage.getItem("fontFamily") || "lora";
    let lineCount = localStorage.getItem("lineCount") || "3";
    let caret = localStorage.getItem("caret") || "caret";
    let typingMode = localStorage.getItem("typingMode") || "time";
    let words = localStorage.getItem("words") || 10;
    let time = localStorage.getItem("time") || 15;
    let blur = localStorage.getItem("blur") || "off";
    let mode = localStorage.getItem("mode") || "hard";
    setTheme("default", theme); 
    setPreference("fontSize", fontSize); 
    setPreference("fontFamily", fontFamily); 
    setPreference("lineCount", lineCount); 
    setPreference("caret", caret); 
    setPreference("typingMode", typingMode); 
    setPreference("words", words);
    setPreference("time", time);
    setPreference("blur", blur);
    setPreference("mode", mode);
    setPreference("mode", mode);
    setPreference("selectedTitle", "walden");
}
loadPreferences();
document.body.onLoad = refresh();
document.body.onresize = function() { zoomwait() };