<?php
header('Content-Type: text/css');
//add the theme in the db
session_start();
if (isset($_COOKIE["theme"])) {
    $theme = $_COOKIE["theme"];
}
else{
    $theme = "dracula";
}
if (isset($_COOKIE["fontFamily"])) {
    $fontFamily = $_COOKIE["fontFamily"];
}
else{
    $fontFamily = "lexendDeca";
}
if (isset($_COOKIE["fontSize"])) {
    $fontSize = ($_COOKIE["fontSize"]);
}
else{
    $fontSize = 3;
}
if (isset($_COOKIE["caret"])) {
    $caret = $_COOKIE["caret"];
}
else{
    $caret = "underline";
}
if (isset($_COOKIE["lineCount"])) {
    $lineCount = $_COOKIE["lineCount"];
}
else{
    $lineCount = 2;
}
if (isset($_COOKIE["time"])) {
    $time = $_COOKIE["time"];
}
else{
    $time = 15;
}
if (isset($_COOKIE["words"])) {
    $words = $_COOKIE["words"];
}
else{
    $words = 30;
}
if (isset($_COOKIE["typingMode"])) {
    $typingMode = $_COOKIE["typingMode"];
}
else{
    $typingMode = "words";
}


$height = 1.5 * $fontSize * $lineCount;
$caretTop = 0;
$caretHeight = 0;
//others
if ($caret == "none")
{
    $caretTop = 0;
    $caretHeight = 0;
}
else if ($caret == "underline")
{
    $caretTop = $fontSize * 1.25;
    $caretHeight = $fontSize / 3;
}
else if ($caret == "highlight")
{
    $caretTop = 0;
    $caretHeight = $fontSize * 1.5;
}
include "themes/".$theme.".css"; //theme added depends on the name of the one in the database
?>
<style>

*{
    font-family: masterFont;
}
@font-face {
    font-family: masterFont;
    src: url('./Fonts/LexendDeca.ttf');
}
/*scrollbar*/
::-webkit-scrollbar {
  width: 2em;
  height: 1em;
  background: linear-gradient(to top, rgba(255,0,0,0), 93%, var(--backgroundGradient));
}

::-webkit-scrollbar-track {
  background: var(--testText);
  border-radius: 100vw;
  margin-block: 0.5em;
}

::-webkit-scrollbar-thumb {
  background: var(--correct);
  border: 0.25em solid var(--testText);
  border-radius: 100vw;
}

::-webkit-scrollbar-thumb:hover {
  background: var(--incorrect);
}


.vertical-scroll > div {
  background: var(--testText);
  border-radius: 1em;
  border: 0.5em var(--testText);
  padding: 1em;
}


body {
    background-color: var(--background);
    margin: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    font-family: masterFont;                     /* Master font type for page */
    line-height: 1.6rem;
    overflow-x: hidden;
    overflow-y: hidden;  
    overflow:auto; /*able to scroll */
}
li{
    font-size: 3rem;
    font-weight: bold;
    color: white;
    user-select: none;
    display: inline;
    padding-right: 1rem;
   
}
li a{
    color: white;
    font-size: 1rem;
    vertical-align: middle;
    text-decoration: none;
}
nav{
  list-style-type: none;
  margin: 0;
  padding-top: 2.5rem;
  overflow: hidden;
  background: linear-gradient(to top, rgba(255,0,0,0), 70%, var(--backgroundGradient));
  width: 100%;
  position: fixed;
  text-align: center;
  height: 20rem;
  user-select: none;

}
nav a{
    transition: all .5s ease;
}
nav a:hover{
    color: var(--testText);
 
}
.word
{
    display: inline-block;
    padding: 0rem .3rem; /* line spacing */
}
.row {
    user-select: none;
    color: white;
    /* background-color:#191919;                      Background color */
    border:.3rem solid var(--row);
    font-size: 1rem;
    border-radius: 1.5rem;
    display:inline-block;
    padding: 2rem 2.5rem;
    margin-left: .5rem;
    margin-top: 1.5rem;
    transition: 1s;
    line-height: 10px;
    vertical-align: top;
}
.preferencesRow {
    color: white;
    background-color: var(--row);
    /* background-color:#191919;                      Background color */
    font-size: 1rem;
    border-radius: 1.5rem;
    display:inline-block;
    padding: 2rem 2.5rem;
    margin-left: .5rem;
    transition: 1s;
    line-height: 10px;
    vertical-align: top;
    text-decoration: none;
    align-items: center;
    line-height: 10px;
    margin-top: 1rem;

}
.box
{
    z-index: 0;
    position: absolute;
    margin-top: 6rem;
    filter: blur(8px);
    -webkit-filter: blur(8px);
    background-image: linear-gradient(to bottom, rgba(0,0,0,0), var(--background));
}
.horizontalAlign
{
    display: flex; /* equal height of the children */
}
 
.rowContainer {
    user-select: none;
    color: white;
    background-color: var(--rowBackground); 
    font-size: 1rem;
    border-radius: 1.5rem;
    padding: 2rem 2.5rem;
    margin-left: .5rem;
    transition: 1s;
    line-height: 10px;
    vertical-align: top;
    text-decoration: none;
    margin: 1rem;
}

#textInput {
  font-size: 2rem;
  border-radius: 1.5rem;
  color: white; /* text input font color */
  overflow: hidden;
  font-family: masterFont;
  resize: none; /* Neccesary so user cannot resize */
  width: 20%;
  background-color: var(--background);
  height: 1rem;
  line-height: 1rem;
}
#textInput:focus { /*in focus */
    background-color: var(--row);
    outline-width: 0;
    transition: 2s;
}
#restartTest:hover{
    background-color:var(--incorrect);
    border:.3rem solid var(--incorrect);
}
#restartTest
{
    padding: 1rem;
    background-color:var(--row);
    width: 3rem;
}
#restartTestDiv
{
    
}
#wordsWrapper
{
    margin-top: 0rem;
    transition:all .5s ;
    line-height:  <?php echo strval($fontSize * 1.5) . "rem"; ?>;

}
#testRow
{
    display: flex; /* equal height of the children */
}
#testText{
  user-select: none;
  width: 60rem;
  margin: auto;
  resize: none;
  font-size:  <?php echo strval($fontSize) . "rem"; ?>;
  height:  <?php echo strval($height) . "rem"; ?>;
  border-radius: .5rem;
  display: block;
  color: var(--testText);
  text-align: left;
  overflow: hidden;
  line-height: 3.5rem;
}
#typingmode
{
  border:.3rem solid var(--rowBackground);
  width: 60rem;
  margin: auto;
  resize: none;
  font-size: 2rem;
  border-radius: .5rem;
  display: block;
  color: var(--row);
  text-align: left;
  overflow: hidden;
  border-radius: 1.5rem;
  padding: 1rem;
  line-height: 3rem;
}
.typingModes
{

    margin-right: 1rem;
    display: flex; /* equal height of the children */
    color: white;
    z-index: 0;
    user-select: none;
    transition: all .25s ease; 
}
.typingModes:hover
{
    color: var(--incorrect);
}
.individualMode
{
    display: flex; /* equal height of the children */

}
.modeStack
{
    display: inline-block; /* equal height of the children */
    margin-right: 1rem;
    padding:.5rem;
}
.modeHeader
{
    font-size: 3rem;
}
#testText::first-line {
    color: white;
}
#cursor
{
    width: 5rem;
    height: 1rem;
    background-color: var(--correct);
    opacity:0.5;
    border-radius: 1.5rem;
    position: absolute;
    margin-top: 1.75rem;
    transition: all .25s;
    height:  <?php echo strval($caretHeight) . "rem"; ?>;
    margin-top:  <?php echo strval($caretTop) . "rem"; ?>;
}
.blur
{
    filter: blur(.25rem);
}
#typingArea {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
#preferencesArea
{
    margin-top:10rem;
    width: 90%;
    align-items: center;
}
.correct {
    transition: all .5s ease; /* fade in word */
    color: var(--correct);
   
}
.incorrect, .extra{
    color: var(--incorrect);
    transition: all .55s ease; /* fade in word */
    text-shadow: 1px 1px 2px var(--incorrect), 0 0 1em var(--incorrect), 0 0 0.2em var(--incorrect);
}
.current-word {
 
    color: var(--currentWord);
    display: inline-block;
    padding: 0rem .3rem;
}
.incorrect-word {
    color: var(--incorrect);
    display: inline-block;
    padding: 0px 10px;
}
#listOfStats {
    color: white;
}
#topContainer input{
    display: flex;
  flex-direction: row;
    padding: 1rem 1rem 1rem 1rem;
    font-family: masterFont;
    margin: 0 auto;
    margin-bottom: 1rem;
    width: 40%;
    border: none;
    background: none;
    border-bottom: 2px solid #D1D1D4;
    outline: none;
    color: white;
}
#kecapContainer
{
    position: relative;
    bottom: 7rem;
    right: 25rem;
}
/*neccesary when automatically filling in email */
input:-webkit-autofill{
    transition: background-color 5000s ease-in-out 0s;
    -webkit-text-fill-color: white !important;
}
.statsItem
{
    user-select: none;
    color: white;
    background-color: var(--rowBackground);
    /* background-color:#191919;                      Background color */
    font-size: 1rem;
    border-radius: 3rem;
    text-align: center;
    text-decoration: none;
    line-height: 20px;
    padding: 2rem;
    margin-right: 3rem;
    height: 10rem;
    line-height: 1rem;
    font-size: 1rem;

}
#profilePicture
{
    width: 25%;
}
#profileLevel
{
    width: 25%;
}
#profileRank
{
    width: 25%;
}
#profileWPM
{
    width: 25%;
}
#profileLogout
{
    width: 100%;
}
#friendsListArea, #statsArea 
{    

    color: white;
    border-radius: 1.5rem;

}
button
{
    background: none;
    border: none;
    color: none;
}
#xpBar
{
    margin-top: 3rem;
    width: 100%;
  height: 2rem;
  border-radius:5rem;
  background: var(--backgroundDark);
  border:.3rem solid var(--background);
  text-align: center;
}
#friendsListArea
{
    background-color: var(--backgroundDark);
    /* background-color:#191919;                      Background color */
    font-size: 1rem;
    text-align: center;
    line-height: 10px;
    vertical-align: top;
    text-decoration: none;
    line-height: 10px;
    position:absolute;
    /*animation */
    padding-top: 3rem;
    padding-bottom: 3rem;
    right:0; 
    width: 0;
    top: 0;
    height: 100%;
}
.sidebarOpen
{
    animation:  sidebarPadding 1s forwards, sidebar 1.5s forwards;
}
.sidebarClose
{
    animation: sidebarClose 1.5s forwards;
}
#closeSidebar
{
    user-select: none;
    color: white;
    background-color: var(--background);
    border:.3rem solid var(--row);
    /* background-color:#191919;                      Background color */
    font-size: 1rem;
    border-radius: 1.5rem;
    text-align: center;
    text-decoration: none;
    line-height: 20px;
    padding: 2rem 2rem 2rem 2rem;
    transition: 1s;
    position: absolute;
    bottom: 10rem;
    width: 25rem;
}
#sidebarImage
{
    padding: 2rem;
}
#sidebar
{
    z-index: 2; /* make first in order*/
    position: relative;
    background: var(--backgroundDark);
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    width: 10rem;
    border-radius: 3rem;
    text-align: center;
}
.hideSidebar
{
    animation: sidebarClose2 1s forwards;
}
.showSidebar
{
    animation: sidebarOpen 1s forwards;
}
#friendsListArea input{

    margin-left: 2rem;
    font-family: masterFont;
    border: none;
    background: none;
    border-bottom: 2px solid #D1D1D4;
    outline: none;
    color: white;

}
#friendsListHeader
{
    color: white;
    background-color: var(--row);
    /* background-color:#191919;                      Background color */
    font-size: 1rem;
    border-radius: 1.5rem;
    text-align: center;
    vertical-align: top;
    text-decoration: none;
    line-height: 10px;
    margin-bottom: 2rem;
    padding: 2rem 6rem 2rem 6rem;
}
#addFriendButton
{
    color: white;
    background-color: var(--background);
    border:.3rem solid var(--row);
    /* background-color:#191919;                      Background color */
    font-size: 1rem;
    border-radius: 1.5rem;
    text-align: center;
    text-decoration: none;
    line-height: 20px;
    padding: 2rem 2rem 2rem 2rem;
    transition: 1s;
    width: 25rem;
}
.friendDiv
{
    display: flex;
    flex-direction: row;
}
.removeFriend
{
    color: white;
    background-color: var(--row);
    /* background-color:#191919;                      Background color */
    font-size: 1rem;
    border-radius: 1.5rem;
    text-align: center;
    vertical-align: top;
    text-decoration: none;
    line-height: 20px;
    margin-bottom: 2rem;
    margin-left: 1rem;
    padding: 2rem 2rem;
    box-shadow: 0 4px 15px 0 var(--row);
    margin-bottom: 2.25rem;

}
.inviteFriend
{
    color: white;
    background-color: var(--row);
    /* background-color:#191919;                      Background color */
    font-size: 1rem;
    border-radius: 1.5rem;
    text-align: center;

    text-decoration: none;
    line-height: 20px;
    margin-bottom: 2.25rem;
    margin-left: 1rem;
    padding: 2rem 3rem;
    box-shadow: 0 4px 15px 0 var(--row);
}
.friend
{
    color: white;
    background-color: var(--background);
    /* background-color:#191919;                      Background color */
    font-size: 1rem;
    border-radius: 1.5rem;

    vertical-align: top;
    text-decoration: none;
    line-height: 20px;
    margin-bottom: 2rem;
    padding: 2rem 4rem 2rem 4rem;
    text-align: center;
}
#profileArea
{
    width:100%;
    margin-top: 10rem;
    display: flex;

}
#loginContainer
{
    top:18rem;
    width: 60rem; /* width of the container menu */
    /* background-color: #0a0c29; I personally think this is tacky */
    border-radius: 1.5rem;
    margin-top: 10rem;
    z-index: 1; /* make first in order*/
    position:relative;
}
#logout
{
    color: white;
}
#invalid
{
    margin: 0;
    position: absolute;
    top: 30%;
    left: 10%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    opacity: 0;
    font-family: masterFont;
    color: rgb(255, 255, 255);
    font-size: 1rem;
    user-select: none;
    margin-bottom: 5rem;
    line-height: 3rem;
    padding: 1rem;
    width: 8rem;
    background-color: var(--testText);
    border-radius: 25px;
    animation: fadeIn 4s ease;
    text-align: center;
}
#preferenceHeader{
    color: rgb(255, 255, 255);
    font-size: 3rem;
    margin-left: 2rem;
    margin-top: 5rem;
    user-select: none;
}
.preferencesRow:hover
{
    background-color: var(--incorrect);
}
#loginHeader
{
    color: rgb(255, 255, 255);
    font-size: 3rem;
    user-select: none;
    margin-bottom: 5rem;
    width: 40%;
    line-height: 3rem;
    position: absolute;
    bottom: 20rem;
    left: 16rem;
    animation: fadeIn 4s, slide 1.5s forwards ease;
}
@keyframes slide {
    from {
        margin-left: -16rem;
      }
      to {
        margin-left: 0rem;
      }
}
@keyframes statsMoveIn {
    from {
        width: 90%;
      }
      to {
        width: 70%;
      }
}
@keyframes statsMoveOut {
    from {
        width: 70%;
      }
      to {
        width: 90%;
      }
}
@keyframes sidebar {
    from {
    position:absolute;
    right:0; 
    width: 0;

      }
      to {
        width: 25%;
      }
}
@keyframes sidebarOpen {
    from {

        right:0; 
        width: 0;
      }
      to {
        top: 0;
        right: 0;
        height: 100%;
        width: 10rem;
      }
}
@keyframes sidebarPadding
{
    from {
    padding-left: 0rem;
    padding-right: 0rem;

      }
      to {
        padding-left: 3rem;
        padding-right: 3rem;
        width: 25%;
      }
}
@sidebarPaddingClose
{
    
}
@keyframes sidebarClose {
    from {
        padding-left: 3rem;
        padding-right: 3rem;
        padding: 3rem;
        width: 25%;
      }
      to {
        padding-top: 3rem;
        padding-bottom: 3rem;
        padding-left: 0rem;
        padding-right: 0rem;
        position:absolute;
        right:0; 
        width: 0;
      }
}
@keyframes sidebarClose2 {
    from {
        top: 0;
        right: 0;
        height: 100%;
        width: 10rem;
      }
      to {
        right:0; 
        width: 0;
      }
}
@keyframes slideUp {
    from {
        margin-top: 10rem;
      }
      to {
        margin-top: 0rem;
      }
}
@keyframes fadeIn {
    0% { opacity: 0; }
    100% { opacity: 1; }
  }
@keyframes fadeOut {
    0% { opacity: 1; }
    100% { opacity: 0; }
  }
@keyframes blur{
    from {
        color: transparent;
        text-shadow: 0 0 8px rgb(187, 187, 187);
    }
    to {
        color: #3c4c79;
        text-shadow: none;
    }
}
@keyframes zoom{
    0% {
        transform: scale(1, 1);
      }
      50% {
        transform: scale(1.1, 1.1);
      }
      100% {
        transform: scale(1, 1);
      }
}
#loginButton
{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    text-align: center;
    padding: 1rem 1rem 1rem 1rem;
    border-radius: 1.5rem;
    font-family: masterFont;
   
    margin: 0 auto;
    margin-top: 3rem;
    margin-bottom: 1rem;
    width: 50%;
    color: white;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    border: none;
    margin-left: 15rem;
    border-radius: 50px;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
    background-image: linear-gradient(to right, var(--testText) , var(--testText));
    box-shadow: 0 4px 15px 0 var(--testText);
 
}
#loginButton:hover {
    background-position: 100% 0;
}
#loginButton:focus {
    outline: none;
}
#accountCreate
{
  color: white;
  display: inline-block;
  margin-left: 17rem;
  margin-top: 1rem;
}
#accountCreate a {
    text-decoration: none;
    color: var(--testText);
    margin-left: .25rem;
}
#check{
    color: white;
    margin-right: 0rem;
}
#myCheck
{
    display: inline-block;
    padding: 0;
    accent-color: var(--testText);
    margin-right: 7rem;
   
}
#middleContainer{
    display: inline-block;
    margin-left: 18rem;
}
#passwordForget{
    text-decoration: none;
    color: var(--testText);
}
#signupContainer
{
    top:11.5rem;
    width: 60rem; /* width of the container menu */
    /* background-color: #0a0c29; I personally think this is tacky */
    border-radius: 1.5rem;
    margin-top: 10rem;
    z-index: 1;
    position:relative;
}
#statsArea {
    margin-left: 2rem;
    width: 90%;
}
.statsAreaOpen {

    animation: statsMoveIn 1.5s forwards ease;
}
.statsAreaClosed {

animation: statsMoveOut 1.5s forwards ease;
}
.statsRow
{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    text-align: center;
    padding: 10rem 5rem;
    border-radius: 1.5rem;
    font-family: masterFont;
   
    margin-top: 3rem;
    margin-bottom: 1rem;
    color: white;
    font-size: 5rem;
    font-weight: bold;
    color: #fff;
    cursor: pointer;
    border: none;
    background-size: 300% 100%;
    border-radius: 50px;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
    background-image: linear-gradient(to right, var(--testText) , var(--testText) ); /* background color*/
    box-shadow: 0rem 0rem 10rem 0 var(--testText);
    margin-left: 2rem;
    margin-right: 2rem;
    user-select: none;
    transform: 3s ease-in-out;
    animation: fadeIn 3s ease;
    animation-delay: .25s;
    animation-fill-mode: forwards;
    opacity: 0;
}
.statsRow:hover
{
    transform: scale(1.1, 1.1);
}
#statsRow1
{
    display: flex;
    margin-bottom: 3rem;
}
.themesRow {
    user-select: none;
    font-size: 1rem;
    border-radius: 2rem;
    display:inline-block;
    padding: 3rem 7%;
    margin-left: .5rem;
    transition: 1s;
    line-height: 10px;
    text-decoration: none;
    transition: all .5s ease;
    margin-top: 1rem;
    text-align: center;

}
.themesRow:hover, .preferencesRow:hover
{
    transform: scale(1.1, 1.1);
}
#displayStats
{
    display: flex;
    margin: 0;
    position: absolute;
    top: 30%;

}
#theme-olivia
{
    color: #deaf9d;
    background-color:#1c1b1d;
 
}
#theme-dracula
{
    color: #4413e5;
    background-color:#00021b;    
}
#theme-8008
{
    color: #f44c7f;
    background-color:#333a45;    
}
#theme-mizu
{
    color: #fcfbf6;
    background-color:#afcbdd;    
}
#theme-striker
{
    color: #D7DCDA;
    background-color:#124883;    
}
#theme-blueberry
{
    color: #D7DCDA;
    background-color:#5C7DA5;    
}
#theme-creamsicle
{
    color: white;
    background-color:#FF9869;    
}
#theme-botanical
{
    color: #7B9C98;
    background-color: #161B22;    
}
#theme-luna
{
    color: #F67599;
    background-color: #221C35;    
}

<style>
