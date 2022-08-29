<?php
header('Content-Type: text/css');
//add the theme in the db
session_start();
if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/config.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    $theme = htmlspecialchars($user["theme"]);
    $font = htmlspecialchars($user["fontSize"]);
    include "themes/".$theme.".css"; //theme added depends on the name of the one in the database
}
else //if the user has not registered or logged in set a default theme
{
    include "themes/dracula.css";  //theme added depends on the name of the one in the database
}


?>
<style>
*{
    font-family: masterFont;
}
@font-face {
    font-family: masterFont;
    src:url("./Fonts/LexendDeca.ttf"); /* Access to fonts on web  page */
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
  background: linear-gradient(to top, var(--background), 75%, var(--backgroundGradient));
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
    user-select: none;
    color: white;
    /* background-color:#191919;                      Background color */
    border:.3rem solid var(--testText);
    font-size: 1rem;
    border-radius: 1.5rem;
    display:inline-block;
    padding: 2rem 2.5rem;
    margin-left: .5rem;
    transition: 1s;
    line-height: 10px;
    vertical-align: top;
    text-decoration: none;
}
.preferencesRow:hover {
    background-color: var(--testText);
}

.rowContainer {
    display: block;
    margin-top: 1rem;
    padding: 1.4rem 1rem;
}
#textInput {
  font-size: 2rem;
  border-radius: 1.5rem;
  color: white; /* text input font color */
  overflow: hidden;
  font-family: masterFont;
  resize: none; /* Neccesary so user cannot resize */
  width: 15rem;
  text-align: center;
  width: 20%;
  background-color: var(--background);
  height: .75rem;
}
#textInput:focus { /*in focus */
    background-color: var(--row);
    outline-width: 0;
    transition: 2s;
}
#restartTest:hover{
    background-color:var(--row);
}
#testText{
  user-select: none;
  width: 98%;
  margin: auto;
  resize: none;
  font-size:  2rem;                     /* font size */
  border-radius: .5rem;
  display: block;
  color: var(--testText);                 /* font color */
  text-align: left;
  height: fit-content;
  line-height: 3.5rem;
}
#testText::first-line {
    color: white;
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
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
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
#showUsername
{
    opacity: 0;
    color: rgb(255, 255, 255);
    font-size: 6rem;
    user-select: none;
    margin-bottom: 5rem;
    width: 40%;
    line-height: 3rem;
    text-align: left;
    position: absolute;
    bottom:0rem;
    left: -23rem;
    line-height: 8rem;
    animation: fadeIn 3s, slide 1.5s forwards ease;
    animation-delay: .25s;
    animation-fill-mode: forwards /* keep the opacity at 100 after finish */
}
#profileTypingArea
{
    margin: 0;
    position: absolute;
    top: 65%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
#logoutButton 
{

    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    text-align: center;
    padding: 2.5rem 10rem;
    border-radius: 1.5rem;
    font-family: masterFont;
    text-decoration: none;
    width: 50%;
    color: white;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    border: none;
    margin-right: 5rem;
    border-radius: 50px;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
    background-color: var(--testText);
    box-shadow: 0 4px 15px 0 var(--testText);

}
#loginContainer
{
    top:18rem;
    width: 60rem; /* width of the container menu */
    /* background-color: #0a0c29; I personally think this is tacky */
    border-radius: 1.5rem;
    margin-top: 10rem;
    z-index: 1;
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
    font-size: 1.5rem;
    margin-left: 2rem;
    user-select: none;

}
#loginHeader
{
    color: rgb(255, 255, 255);
    font-size: 3rem;
    user-select: none;
    margin-bottom: 5rem;
    width: 40%;
    line-height: 3rem;
    text-align: left;
    position: absolute;
    bottom: 20rem;
    left: -10;
    animation: fadeIn 4s, slide 1.5s forwards ease;
}
@keyframes slide {
    from {
        margin-left: 0;
      }
      to {
        margin-left: 16rem;
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
    margin: 0;
    position: absolute;

    top: 50%;
    left: 50%;
    width: 100%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    display:         flex;
    flex-wrap:       wrap;
    justify-content: center;
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
.themesRow {
    user-select: none;
    font-size: 1rem;
    border-radius: 1.5rem;
    display:inline-block;
    padding: 2rem 2.5rem;
    margin-left: .5rem;
    transition: 1s;
    line-height: 10px;
    vertical-align: top;
    text-decoration: none;
    transition: all .5s ease;
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
<style>