
//Web elements
const displayText = document.getElementById('wordsWrapper')
const displayInput = document.getElementById('textInput') // Input Box
const displayTimer = document.getElementById('time') // Time Display
const displayWPM = document.getElementById('wpmDisplay') // wpm Display
const mainContent = document.getElementById('mainContent') // wpm Display
const cursor = document.getElementById('cursor') 
const footer = document.getElementById("footer")
const typingMode = document.getElementById("typingmode")
var timerVar = "not running" // Turns on when user begins typing...
var sentenceLength = 50;
var time = 0;
var wordList = ["the", "be", "to", "of", "and", "a", "in", "that", "have", "I", "it", "for", "not", "on", "with", "he", "as", "you", "do", "at", "this", "but", "his", "by", "from", "they", "we", "say", "her", "she", "or", "an", "will", "my", "one", "all", "would", "there", "their", "what", "so", "up", "out", "if", "about", "who", "get", "which", "go", "me", "when", "make", "can", "like", "time", "no", "just", "him", "know", "take", "people", "into", "year", "your", "good", "some", "could", "them", "see", "other", "than", "then", "now", "look", "only", "come", "its", "over", "think", "also", "back", "after", "use", "two", "how", "our", "work", "first", "well", "way", "even", "new", "want", "because", "any", "these", "give", "day", "most", "us"]
if (checkCookie("words")) {
    sentenceLength = getCookie("words");
}
if (checkCookie("time")) {
    time = parseInt(getCookie("time"));
}
if (checkCookie("mode")) {
    mode = getCookie("mode");
    if (mode == "hard") {
        wordList = ["able", "about", "absolute", "accept", "account", "achieve", "across", "act", "active", "actual", "add", "address", "admit", "advertise", "affect", "afford", "after", "afternoon", "again", "against", "age", "agent", "ago", "agree", "air", "all", "allow", "almost", "along", "already", "alright", "also", "although", "always", "america", "amount", "and", "another", "answer", "any", "apart", "apparent", "appear", "apply", "appoint", "approach", "appropriate", "area", "argue", "arm", "around", "arrange", "art", "as", "ask", "associate", "assume", "at", "attend", "authority", "available", "aware", "away", "awful", "baby", "back", "bad", "bag", "balance", "ball", "bank", "bar", "base", "basis", "be", "bear", "beat", "beauty", "because", "become", "bed", "before", "begin", "behind", "believe", "benefit", "best", "bet", "between", "big", "bill", "birth", "bit", "black", "bloke", "blood", "blow", "blue", "board", "boat", "body", "book", "both", "bother", "bottle", "bottom", "box", "boy", "break", "brief", "brilliant", "bring", "britain", "brother", "budget", "build", "bus", "business", "busy", "but", "buy", "by", "cake", "call", "can", "car", "card", "care", "carry", "case", "cat", "catch", "cause", "cent", "centre", "certain", "chair", "chairman", "chance", "change", "chap", "character", "charge", "cheap", "check", "child", "choice", "choose", "Christ", "Christmas", "church", "city", "claim", "class", "clean", "clear", "client", "clock", "close", "closes", "clothe", "club", "coffee", "cold", "colleague", "collect", "college", "colour", "come", "comment", "commit", "committee", "common", "community", "company", "compare", "complete", "compute", "concern", "condition", "confer", "consider", "consult", "contact", "continue", "contract", "control", "converse", "cook", "copy", "corner", "correct", "cost", "could", "council", "count", "country", "county", "couple", "course", "court", "cover", "create", "cross", "cup", "current", "cut", "dad", "danger", "date", "day", "dead", "deal", "dear", "debate", "decide", "decision", "deep", "definite", "degree", "department", "depend", "describe", "design", "detail", "develop", "die", "difference", "difficult", "dinner", "direct", "discuss", "district", "divide", "do", "doctor", "document", "dog", "door", "double", "doubt", "down", "draw", "dress", "drink", "drive", "drop", "dry", "due", "during", "each", "early", "east", "easy", "eat", "economy", "educate", "effect", "egg", "eight", "either", "elect", "electric", "eleven", "else", "employ", "encourage", "end", "engine", "english", "enjoy", "enough", "enter", "environment", "equal", "especial", "europe", "even", "evening", "ever", "every", "evidence", "exact", "example", "except", "excuse", "exercise", "exist", "expect", "expense", "experience", "explain", "express", "extra", "eye", "face", "fact", "fair", "fall", "family", "far", "farm", "fast", "father", "favour", "feed", "feel", "few", "field", "fight", "figure", "file", "fill", "film", "final", "finance", "find", "fine", "finish", "fire", "first", "fish", "fit", "five", "flat", "floor", "fly", "follow", "food", "foot", "for", "force", "forget", "form", "fortune", "forward", "four", "france", "free", "friday", "friend", "from", "front", "full", "fun", "function", "fund", "further", "future", "game", "garden", "gas", "general", "germany", "get", "girl", "give", "glass", "go", "god", "good", "goodbye", "govern", "grand", "grant", "great", "green", "ground", "group", "grow", "guess", "guy", "hair", "half", "hall", "hand", "hang", "happen", "happy", "hard", "hate", "have", "he", "head", "health", "hear", "heart", "heat", "heavy", "hell", "help", "here", "high", "history", "hit", "hold", "holiday", "home", "honest", "hope", "horse", "hospital", "hot", "hour", "house", "how", "however", "hullo", "hundred", "husband", "idea", "identify", "if", "imagine", "important", "improve", "in", "include", "income", "increase", "indeed", "individual", "industry", "inform", "inside", "instead", "insure", "interest", "into", "introduce", "invest", "involve", "issue", "it", "item", "jesus", "job", "join", "judge", "jump", "just", "keep", "key", "kid", "kill", "kind", "king", "kitchen", "knock", "know", "labour", "lad", "lady", "land", "language", "large", "last", "late", "laugh", "law", "lay", "lead", "learn", "leave", "left", "leg", "less", "let", "letter", "level", "lie", "life", "light", "like", "likely", "limit", "line", "link", "list", "listen", "little", "live", "load", "local", "lock", "london", "long", "look", "lord", "lose", "lot", "love", "low", "luck", "lunch", "machine", "main", "major", "make", "man", "manage", "many", "mark", "market", "marry", "match", "matter", "may", "maybe", "mean", "meaning", "measure", "meet", "member", "mention", "middle", "might", "mile", "milk", "million", "mind", "minister", "minus", "minute", "miss", "mister", "moment", "monday", "money", "month", "more", "morning", "most", "mother", "motion", "move", "mrs", "much", "music", "must", "name", "nation", "nature", "near", "necessary", "need", "never", "new", "news", "next", "nice", "night", "nine", "no", "non", "none", "normal", "north", "not", "note", "notice", "now", "number", "obvious", "occasion", "odd", "of", "off", "offer", "office", "often", "okay", "old", "on", "once", "one", "only", "open", "operate", "opportunity", "oppose", "or", "order", "organize", "original", "other", "otherwise", "ought", "out", "over", "own", "pack", "page", "paint", "pair", "paper", "paragraph", "pardon", "parent", "park", "part", "particular", "party", "pass", "past", "pay", "pence", "pension", "people", "per", "percent", "perfect", "perhaps", "period", "person", "photograph", "pick", "picture", "piece", "place", "plan", "play", "please", "plus", "point", "police", "policy", "politic", "poor", "position", "positive", "possible", "post", "pound", "power", "practise", "prepare", "present", "press", "pressure", "presume", "pretty", "previous", "price", "print", "private", "probable", "problem", "proceed", "process", "produce", "product", "programme", "project", "proper", "propose", "protect", "provide", "public", "pull", "purpose", "push", "put", "quality", "quarter", "question", "quick", "quid", "quiet", "quite", "radio", "rail", "raise", "range", "rate", "rather", "read", "ready", "real", "realise", "really", "reason", "receive", "recent", "reckon", "recognize", "recommend", "record", "red", "reduce", "refer", "regard", "region", "relation", "remember", "report", "represent", "require", "research", "resource", "respect", "responsible", "rest", "result", "return", "rid", "right", "ring", "rise", "road", "role", "roll", "room", "round", "rule", "run", "safe", "sale", "same", "saturday", "save", "say", "scheme", "school", "science", "score", "scotland", "seat", "second", "secretary", "section", "secure", "see", "seem", "self", "sell", "send", "sense", "separate", "serious", "serve", "service", "set", "settle", "seven", "sex", "shall", "share", "she", "sheet", "shoe", "shoot", "shop", "short", "should", "show", "shut", "sick", "side", "sign", "similar", "simple", "since", "sing", "single", "sir", "sister", "sit", "site", "situate", "six", "size", "sleep", "slight", "slow", "small", "smoke", "so", "social", "society", "some", "son", "soon", "sorry", "sort", "sound", "south", "space", "speak", "special", "specific", "speed", "spell", "spend", "square", "staff", "stage", "stairs", "stand", "standard", "start", "state", "station", "stay", "step", "stick", "still", "stop", "story", "straight", "strategy", "street", "strike", "strong", "structure", "student", "study", "stuff", "stupid", "subject", "succeed", "such", "sudden", "suggest", "suit", "summer", "sun", "sunday", "supply", "support", "suppose", "sure", "surprise", "switch", "system", "table", "take", "talk", "tape", "tax", "tea", "teach", "team", "telephone", "television", "tell", "ten", "tend", "term", "terrible", "test", "than", "thank", "the", "then", "there", "therefore", "they", "thing", "think", "thirteen", "thirty", "this", "thou", "though", "thousand", "three", "through", "throw", "thursday", "tie", "time", "to", "today", "together", "tomorrow", "tonight", "too", "top", "total", "touch", "toward", "town", "trade", "traffic", "train", "transport", "travel", "treat", "tree", "trouble", "true", "trust", "try", "tuesday", "turn", "twelve", "twenty", "two", "type", "under", "understand", "union", "unit", "unite", "university", "unless", "until", "up", "upon", "use", "usual", "value", "various", "very", "video", "view", "village", "visit", "vote", "wage", "wait", "walk", "wall", "want", "war", "warm", "wash", "waste", "watch", "water", "way", "we", "wear", "wednesday", "wee", "week", "weigh", "welcome", "well", "west", "what", "when", "where", "whether", "which", "while", "white", "who", "whole", "why", "wide", "wife", "will", "win", "wind", "window", "wish", "with", "within", "without", "woman", "wonder", "wood", "word", "work", "world", "worry", "worse", "worth", "would", "write", "wrong", "year", "yes", "yesterday", "yet", "you", "young"]
    }
}
var sentence = []
var words = [] //word elements
var currentWordNum = 0;
function changeTime(value) {
    time = value;
    setCookie("time", value, 30);
}
function changeWords(value) {
    time = value;
    setCookie("words", value, 30);
}
function changeMode(value) {
    mode = value;
    setCookie("mode", value, 30);
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
function reloadCss()
{
    var links = document.getElementsByTagName("link");
    for (var cl in links)
    {
        var link = links[cl];
        if (link.rel === "stylesheet")
            link.href += "";
    }
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
//Executes after each keystroke
displayInput?.addEventListener('input', keystroke)
function keystroke() {
    startTimer();
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
                continue
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
            const distance = findDistanceBetween(words); //distance between the lines
            const currentWord = placement.getBoundingClientRect().y;
            const firstWord = document.getElementsByClassName('word')[0].getBoundingClientRect().y;
            const lineCount = getCookie("lineCount") - 1; //return the one before last
            if (distance * lineCount <= (currentWord - firstWord))
            {
                displayText.style.marginTop = (distance * (lineCount - 1)) - (currentWord - firstWord) + "px";
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
    displayInput.value = ""; //remove Text;
    moveCursorWithY(); //reset cursor
    displayTimer.innerText = getTime(getCookie("time"))
    newQuote()
    timerVar = "running"
    startTimer();
}
function randomQuote() {
    displayText.innerText = ''// removing previous sentence if applicable
    if (getCookie("typingMode") == "time")
    {
        sentenceLength = 250; //max amount of words (should eventually be changed to update after tyhe begin typing to minimize latency)
    }
    for (let i = 0; i < sentenceLength; i++) {
        sentence[i] = wordList[Math.floor(Math.random() * wordList.length)] //prevent repeats from occuring, very janky
        const index = wordList.indexOf(sentence[i]);
        if (index > -1) {
            wordList.splice(index, 1);
        }
    }
}
function wordsPerMinute(testDuration) {
    if (getCookie("typingMode") == "time")
    {
        const timeIn = time - testDuration
        const correctText = displayText?.querySelectorAll('.correct').length
        const wpm = Math.round(correctText / 5 / timeIn * 60)
        return wpm
    }
    else
    {
        const timeIn = testDuration
        const correctText = displayText?.querySelectorAll('.correct').length
        const wpm = Math.round(correctText / 5 / timeIn * 60)
        return wpm
    }

}
async function newQuote() {
    if (getCookie("typingMode") == "time")
    {
        displayTimer.innerHTML = getTime(getCookie("time")) //sets the time (does not begin timer however)
    }
    else
    {
        displayTimer.innerHTML = getTime(0);
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
    if (timerVar != "running") {
        footer.classList.add('fadeOut');
        typingMode.classList.add('fadeOut');
        cursor.style.animation = "none";

        startTime = new Date()
        if (getCookie("typingMode") == "words")
        {
            setInterval(() => {

                duration = Math.floor(0 + (new Date() - startTime) / 1000)
                displayTimer.innerText = getTime(duration)
                displayWPM.innerText = wordsPerMinute(duration) + " WPM"
            }, 1000)
        }
        else
        {
            setInterval(() => {

                duration = Math.floor(time + 1 - (new Date() - startTime) / 1000)
                displayTimer.innerText = getTime(duration)
                displayWPM.innerText = wordsPerMinute(duration) + " WPM"
                if (duration <= 0) {
                    endTest()
                }
            }, 1000)
        }
        timerVar = "running"
    }
}
function getAccuracy() {
    const correct = displayText?.querySelectorAll('.correct').length
    const incorrect = displayText?.querySelectorAll('.incorrect').length
    const total = correct + incorrect;
    return parseInt(correct / total * 100);
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
    //this is where all the data is sent from javascript to php
    wpmFinal = wordsPerMinute(duration)
    accuracy = getAccuracy();
    window.location.href = "index.php?finish=true&testTime=" + time + "&wpm=" + wpmFinal + "&accuracy=" + accuracy;
}
function moveCursor()
{
  if (getCookie('caret') == "highlightWord" || getCookie('caret') == "underlineWord") //
  {
    const cursor = document.getElementById('cursor') 
    const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    const rect = placement.getBoundingClientRect();
    cursor.style.left = rect.x + "px";
    cursor.style.width = rect.width + "px";
  }
  else if(getCookie('caret') == "caret")
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
  else if(getCookie('caret') == "underlineLetter")
  {
    const cursor = document.getElementById('cursor') 
    const parent = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    let chars = parent.querySelectorAll("*");
    let index = displayInput.value.length
    if (index > chars.length - 1)
    {
      const rect = chars[index - (index - (chars.length - 1))].getBoundingClientRect();
      cursor.style.left = rect.x + rect.width - 10 + "px";
      cursor.style.width = rect.width + "px";
      cursor.style.minWidth = "30px";
    }
    else
    {
      const rect = chars[index].getBoundingClientRect();
      cursor.style.left = rect.x + "px";
      cursor.style.width = rect.width + "px";
      cursor.style.minWidth = "30px";
    }

  }
  else //no cookie chosen, so default is caret
  {
    const cursor = document.getElementById('cursor') 
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
function moveCursorWithY()
{
  moveCursor();
  const cursor = document.getElementById('cursor') 
  const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
  const rect = placement.getBoundingClientRect();
  cursor.style.top = rect.y + "px";
}
function setBlur() {
    if (getCookie("lineCount") > 1 && getCookie('blur') == "on") {
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
function findCookie(name, parentId) //checks to see which cookie is selected (used in prefrences to highlight current setting)
        {
            const children = document.getElementById(parentId).children // wpm Display
            for (var i = 0; i < children.length; i++) {
                var child = children[i];
                if (getCookie(name) == child.title)
                {
                return child;
                }
            }
        }
function addCookies()
{
    if(!checkCookie('fontSize')){
        setCookie("fontSize", 3, 30); //default if have no cookies yet
    }
    if(!checkCookie('fontFamily')){
        setCookie("fontFamily", "lexenddeca", 30); //default if have no cookies yet
    }
    if(!checkCookie('caret')){
        setCookie("caret", 'caret', 30); //default if have no cookies yet
    }
    if(!checkCookie('lineCount')){
        setCookie("lineCount", 3, 30); //default if have no cookies yet
    }
    if(!checkCookie('blur')){
        setCookie("blur", "off", 30); //default if have no cookies yet
    }
    if(!checkCookie('theme')){
        setCookie("theme", "light", 30); //default if have no cookies yet
    }
    if(!checkCookie('words')){
        setCookie("words", "100", 30); //default if have no cookies yet
    }
    if(!checkCookie('time')){
        setCookie("time", "15", 30); //default if have no cookies yet
    }
    if(!checkCookie('mode')){
        setCookie("mode", "hard", 30); //default if have no cookies yet
    }
    if(!checkCookie('typingMode')){
        setCookie("typingMode", "time", 30); //default if have no cookies yet
    }
}
function updateIndex()
{
    if (getCookie("typingMode") == "time") //set the current time
    {
        findCookie('time', 'timesContainer').classList.add("currentMode");
    }
    else if (getCookie("typingMode") == "words") //set the current num words
    {
        findCookie('words', 'wordsContainer').classList.add("currentMode");
    }
    findCookie('mode', 'modesContainer').classList.add("currentMode"); //update regardless
}
function updatePreferences()
{
    findCookie('fontSize', 'sizesContainer').classList.add("currentSetting");
    findCookie('fontFamily', 'fontsContainer').classList.add("currentSetting");
    findCookie('caret', 'caretsContainer').classList.add("currentSetting");
    findCookie('lineCount', 'linesContainer').classList.add("currentSetting");
    findCookie('blur', 'blurContainer').classList.add("currentSetting");
    findCookie('theme', 'themesContainer').innerHTML  += " ✦";
}
function updateCookies()
{
    addCookies();
    if ( window.location.href == ("https://cozytypes.com/") || "https://www.cozytypes.com/index.php") {
        updateIndex();
        newQuote();
        moveCursorWithY();
        setBlur();
    }
    else if ( window.location.href == ("https://cozytypes.com/preferences") || window.location.href == ("https://cozytypes.com/preferences.php")) {
        updatePreferences();
    }
}
document.body.onLoad = updateCookies();
document.body.onresize = function() { zoomwait() };