<?php
header('Content-Type: text/css');
session_start();
include "themes.scss"; //file contains all fonts
?>
<style>
    @font-face {
        font-family: "comfortaa";
        src: url("./Fonts/comfortaa.ttf");
    }
    @font-face {
        font-family: 'lexendDeca';
        src: url('./Fonts/LexendDeca.ttf');
    }
    @font-face {
        font-family: 'handjet';
        src: url('./Fonts/handjet.ttf');
    }
    @font-face {
        font-family: 'pressStart';
        src: url('./Fonts/pressStart.ttf');
    }
    @font-face {
        font-family: 'vt323';
        src: url('./Fonts/vt323.ttf');
    }
    @font-face {
        font-family: 'raleway';
        src: url('./Fonts/raleway.ttf');
    }

    @font-face {
        font-family: 'sourceCodePro';
        src: url('./Fonts/sourceCodePro.ttf');
    }

    @font-face {
        font-family: 'courier';
        src: url('./Fonts/courier.ttf');
    }

    @font-face {
        font-family: 'ibmPlexSans';
        src: url('./Fonts/ibmPlexSans.ttf');
    }

    @font-face {
        font-family: 'lora';
        src: url('./Fonts/lora.ttf');
    }

    @font-face {
        font-family: 'merriweather';
        src: url('./Fonts/merriweather.ttf');
    }

    @font-face {
        font-family: 'nunito';
        src: url('./Fonts/nunito.ttf');
    }

    @font-face {
        font-family: 'titilliumWeb';
        src: url('./Fonts/ibmPlexSans.ttf');
    }
    @font-face {
        font-family: 'monteserrat';
        src: url('./Fonts/monteserrat.ttf');
    }
    @font-face {
        font-family: 'robotoMono';
        src: url('./Fonts/robotoMono.ttf');
    }
    @font-face {
        font-family: 'karla';
        src: url('./Fonts/karla.ttf');
    }
    @font-face {
        font-family: 'josefinSans';
        src: url('./Fonts/josefinSans.ttf');
    }
    /*scrollbar*/
    :root
    {
        --fontFamily: 'pressStart';
        --fontSize: 2;
        --height: calc(1.5rem * var(--fontSize) * var(--lineCount));
        --caret: 'caret';
        --caretTop: calc(var(--fontSize) * .25rem);
        --caretHeight: calc(var(--fontSize) * 1rem);
        --caretWidth: calc(var(--fontSize) * .15rem);
        --caretOpacity: 100%;
        --lineCount: 3;
        --typingMode: 'words';
        --time: 15;
        --words: 100;
        --blur: 'off';
    }
    ::-webkit-scrollbar {
        width: 1.5em;
        height: 1em;
        background: linear-gradient(to top, rgba(255, 0, 0, 0), 93%, var(--backgroundGradient));
    }
     /*
    ::-webkit-scrollbar-track {
        background: var(--testText);
        border-radius: 100vw;
        margin-block: .5em;
    }
    */
    ::-webkit-scrollbar-thumb {
        background: var(--backgroundDark);
        border-radius: 0;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: var(--row);
    }
    .tooltip {
        position: relative;
        display: inline-block;
        white-space: nowrap; 
    }
    .tooltip .tooltiptext {
    visibility: hidden;
    background-color: var(--row);
    color: #fff;
    text-align: center;
    border-radius: 1rem;
    padding: 1rem 2rem;
    position: absolute;
    z-index: 1;
    bottom: 150%;
    left: 50%;
    transform: translateX(-25%);
    margin-left: -60px;
    min-width: 8rem;
    }

.retroBox {
    margin: 2rem auto;
    max-width: 40ch;
    border: 8px solid var(--row);
    color: #ffff;
    padding: 2ch;
    position: relative;
    border-image: 
    url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M16 0H8v4H4v4H0v8h4v4h4v4h8v-4h4v-4h4V8h-4V4h-4V0zm0 4v4h4v8h-4v4H8v-4H4V8h4V4h8z' fill='%230038FF'/%3E%3C/svg%3E")
    8 stretch;
}
#title {
    font-size: 2.25rem;
}
.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    margin-left: -5px;
    border-width: 7.5px;
    border-style: solid;
    border-color: var(--row) transparent transparent transparent;
    }

.tooltip:hover .tooltiptext {
    visibility: visible;
    animation: fadeIn 1s  ease, slideUp 1s ease;
    }
i {
    font-size: 1.5rem;
    padding: .75rem;
}
#footer i {
    padding: .75rem;
}
.vertical-scroll>div {
    background: var(--testText);
    border-radius: 1em;
    border: 0.5em var(--testText);
    padding: 1em;
}
body {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    scroll-behavior: smooth;
    background-color: var(--background);
    width: 100%;
    margin: 0;
    font-family: 'PressStart', monospace;
    transition-delay: 0s;
    transition-duration: 0.15s;
    transition-property: color, background; /* Add 'background' here */
    transition-timing-function: ease;
}
.main-body {
    overflow: hidden;
}
#hotkey
{
    font-size: 1rem;
    word-spacing: .25rem;
    color: var(--testText);
    display: flex;
    display: grid;
    gap: .8rem;
}
kbd
{
    font-family: 'PressStart', monospace;
    font-size: 1rem;
    color: var(--currentWord);
    border-radius: .75rem;
}
li {
    font-size: 2.25rem;
    font-weight: bold;
    color: var(--currentWord);
    user-select: none;
    display: inline;
    padding-right: 1rem;

}
li a {
    color: var(--currentWord);
    font-size: 1rem;
    vertical-align: middle;
    text-decoration: none;
}
#mainContent {
    width: 85%;
    margin: auto;
    display: grid;
    gap: .8rem;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
#logo {
    user-select: none;
    display: inline;
    padding-right: 1rem;
    color: var(--currentWord);
    font-size: 1.75rem;
    vertical-align: middle;
    text-decoration: none;
    margin-bottom: .25rem;
}
nav {
    width: 100%;
    text-align: center;
    user-select: none;
    display: flex;
    align-items: center;
    transition: color .2s ease;
    color: var(--testText);
    padding: 1rem;
    font-family: 'PressStart', monospace;
}
.navIcon, #showUsername
{
    transition: color .25s ease;
    text-decoration: none;
    font-size: 1.25rem;
    padding: 0 1rem;
    color: var(--row);
    
}
.navIcon:hover , #showUsername:hover, #profileIcon:hover {
    color: var(--currentWord);
    fill: var(--currentWord);
}
.word {
    display: inline-block;
    padding-right: calc(var(--fontSize) * .75rem);
    /* line spacing */
} 
h1 {
    font-weight: normal;
}
.row {
    user-select: none;
    color: var(--currentWord);
    border: .3rem solid var(--row);
    font-size: 1rem;
    border-radius: 1.5rem;
    display: inline-block;
    padding: 2rem 2.5rem;
    margin-left: .5rem;
    margin-top: 1.5rem;
    vertical-align: top;
    min-height: 1rem;
    transition: .5s;
}
#footer
{
    text-align: center;
    user-select: none;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-size: 1.25rem;
    padding: 2rem;
    gap: 3rem;
}
#footerDiv
{
    display: flex;
}
.footerLinks {
    text-decoration: none;
    color: var(--row);
    text-align: center;
    user-select: none;
    display: flex;
    justify-content: center;
    transition: color .2s ease;
    align-items: center;
}
.footerLinks:hover {
    color: var(--currentWord);
}
.linkDivider {
    color: var(--row);
    padding: 1.2rem;
}
.box {
    z-index: 0;
    position: absolute;
    margin-top: 6rem;
    filter: blur(8px);
    -webkit-filter: blur(8px);
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), var(--background));
}
.horizontalAlign {
    display: flex;
    /* equal height of the children */
}
.testItem {
    font-size: calc(var(--fontSize) * .5rem);;
    padding: 2rem;
    overflow: hidden;
}
#wpmDisplay {
    min-width: calc(var(--fontSize) * 2.25rem);
    font-size: 4rem;
    padding: 0;
    opacity: 0;
    transition: opacity 0.25s ease;

}
#wpmDisplay, #time {
    text-align: center;
}
#time {
    gap: calc(var(--fontSize) * .25rem);
    padding: calc(var(--fontSize) * .2rem) 0rem;
    user-select: none;
    display: flex;
    padding: 0 .5rem;
    font-size: 2rem;
}
.aboutLink {
    text-decoration: none;
    color: var(--correct);
}
.aboutContainer {
    user-select: none;
    color: var(--currentWord);
    background-color: var(--rowBackground);
    font-size: 1rem;
    border-radius: 1.5rem;
    padding: 5rem;
    margin-left: .5rem;
    line-height: 10px;
    vertical-align: top;
    text-decoration: none;
    /* Remove one of the margin properties */
    margin: 1rem;
    justify-content: center;
}
#showRestart {
    color: var(--row);
    text-decoration: none;
    font-size: 2rem;
    padding: 0rem 1rem;
    transition: color .25s ease;
    user-select: none;
}
#testStats {
    display: flex;
    background-color: var(--rowBackground);
    display: flex;
    margin: 1.5rem;
}
#showUsername
{
    font-size: 1.25rem;
    text-decoration: none;
    color: var(--row);
    display: flex;
    display: flex;
    align-items: center; /* Vertically centers the content */
    justify-content: center; /* Horizontally centers the content */
}
#showUsername:hover {
    color: var(--currentWord);
}
#showRestart:hover
{
    color: var(--currentWord);
}
#resetBox {
    font-size: 0rem;
    padding: 0;
}
#textInput {
    resize: none;
    position: absolute;
    opacity: 0;
}
#textInput:focus {
    outline-width: 0;
}
#restartTest:hover {

    transform: rotate(90deg);
}
#restartTest {
    border: none;
    cursor: pointer;
    font-size: calc(var(--fontSize) * .5rem);
    z-index: 1;
    top: 50%;
    left: 50%;
    font-size: 3rem;
    width: 35px;
    height: 35px;
    color: var(--currentWord);
    transition: opacity 0.25s ease, transform 0.15s ease-in-out;       
    fill: var(--currentWord);
    transform-origin: 47px;
}
#profileIcon,
    .st0 {
        fill: none;
        }

    .st1 {
        fill-rule: evenodd;
        fill: var(--row);
    }
#profileIcon {
    transition: color .25s ease;
    text-decoration: none;
    font-size: 1.25rem;
    padding: 0;
    width: 60px;
    height: 60px;
}
#profileIconLink {
    text-decoration: none;
    display: flex;
    align-items: center; /* Vertically centers the content */
    justify-content: center; /* Horizontally centers the content */
    transition: color .25s ease;
    color: var(--row);
}
#profileIconLink:hover {
    fill: var(--currentWord);
}
#completionDisplay {
    font-size: calc(var(--fontSize) * .6rem);
}
.currentSetting {
    background-color: var(--background);
}
#wordsWrapper {
    line-height: calc(var(--fontSize) * 1.5rem);
}
#testText {
    user-select: none;
    font-size: calc(var(--fontSize) * 1rem);
    max-height: var(--height);
    border-radius: .5rem;
    color: var(--testText);
    overflow: hidden;
    line-height: 3.5rem;
}
.testRow {
    display: flex;
    user-select: none;
    justify-content: center;

}
#showName
{
    color: var(--testText)
}
.fadeOut {
    animation: fadeOut .45s  ease forwards, fadeColor .45s ease forwards;
}
.fadeIn {
    animation: fadeIn .45s  ease forwards
}
.testRow * {
    user-select: none;
    color: var(--currentWord);
    display: inline-block;
    padding: calc(var(--fontSize) * .625rem);
    font-size: 5rem;
}
#typingmode {
    font-size: 1.5rem;
    color: var(--row);
    display: flex;
    user-select: none;
    padding: 2rem 0rem 2rem 0;
    
}
.typingModes {
    margin-right: .75rem;
    display: flex;
    /* equal height of the children */
    color: var(--rowBackground);
    z-index: 0;
    user-select: none;
    transition: color .25s ease;
    cursor: pointer;
}
.typingModes:hover {
    color: var(--incorrect);
}
.modeStack {
    margin-right: 2rem;
    line-height: 2rem;
}
#testText::first-line {
    color: var(--currentWord);
}
#cursor {
    width: var(--caretWidth);
    background-color: var(--correct);
    opacity: var(--caretOpacity);
    border-radius: 0;
    position: absolute;
    transition: left 0.125s ease;
    height: var(--caretHeight);
    margin-top: var(--caretTop);
    animation: blink 1.5s infinite 1s;
    visibility: hidden;
}
@keyframes blink {
    0%,
    100% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
}
.blur {
    opacity: 50%;
    transition: all 1s ease;
    filter: blur(10px)
}
@-moz-keyframes spin {
from { -moz-transform: rotate(0deg); }
to { -moz-transform: rotate(360deg); }
}
@-webkit-keyframes spin {
    from { -webkit-transform: rotate(0deg); }
    to { -webkit-transform: rotate(360deg); }
}
@keyframes spin {
    from {transform:rotate(0deg);}
    to {transform:rotate(360deg);}
}
#loadingBar {
    z-index: 1;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 250px;
    height: 250px;
    transition: opacity .25s ease;
    fill: var(--currentWord);
    }
@keyframes fillBar {
from {
    transform: scaleX(0);
}
to {
    transform: scaleX(1.8);
}
}
.cls-1 {
    transform-origin: left;
    fill: var(--correct);
    animation: fillBar .75s ease-in-out forwards;
}
@keyframes spin {
from {
    transform: rotate(0deg);
}
to {
    transform: rotate(360deg);
}
}
.correct {
    color: var(--correct);
}
.incorrect,
.extra {
    color: var(--incorrect);
}
#time {
    color: var(--currentWord);
}
.current-word {
    /* color: var(--currentWord); */
    display: inline-block;
    padding-right: calc(var(--fontSize) * .75rem);
}
.incorrect-word {
    color: var(--incorrect);
    display: inline-block;
    padding: 0rem calc(var(--fontSize) * .75rem) 0rem 0rem;
}
#listOfStats {
    color: var(--currentWord);
}
#top {
    align-items: center;
    font-size: 2.3rem;
    line-height: 2.3rem;
    width: 100%;
}
.description
{
    font-size: 1rem;
    padding: 0 1rem;
    color: var(--row);
    line-height: 1.6rem;
}
.aboutDescription {
    font-size: 1.5rem;
    padding: 4 2rem;
    color: var(--row);
    line-height: 2rem;
    font-weight: normal;
}
input {
    display: flex;
    flex-direction: row;
    width: 100%;
    border: none;
    background: none;
    border-bottom: 1px solid #D1D1D4;
    outline: none;
    color: var(--currentWord);
    padding: 1rem;
    margin: 2.5rem 0;
    box-sizing: border-box;
    font-family: 'PressStart', monospace;
    font-size: 1rem;
}
#kecapContainer {
    position: relative;
    bottom: 7rem;
    right: 25rem;
}
/*neccesary when automatically filling in email */
input:-webkit-autofill {
    transition: background-color 5000s ease-in-out 0s;
    -webkit-text-fill-color: var(--currentWord) !important;
}
#shopnow {
    transition: background-color .4s;
}
#shopnow:hover {
    background-color: var(--currentWord);
}
#showSignIn {
    color: var(--row);
    text-decoration: none;
    font-size: 2rem;
    padding: 0rem 1rem;
    transition: color .25s ease;
    user-select: none;
}
.statsItem {
    user-select: none;
    color: var(--currentWord);
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
.stat {
    margin: auto;
}
#profilePicture {
    width: 25%;
}
#profileLevel {
    width: 25%;
}
#profileRank {
    width: 25%;
}
#profileWPM {
    width: 25%;
}
#profileLogout {
    width: 100%;
}
#friendsListArea,
#statsArea {

    color: var(--currentWord);
    border-radius: 1.5rem;

}
button {
    background: none;
    border: none;
    color: none;
}
#profileArea {
    width: 100%;
    margin-top: 10rem;
    display: flex;

}
#loginContainer {
    height: 100%;
}
#logout {
    color: var(--currentWord);
}
#invalid {
    color: var(--currentWord);
    font-size: 1rem;
    user-select: none;
    padding: 1rem;
    width: 100%;
    line-height: 3rem;
    background-color: var(--incorrect);
    text-align: center;
    box-sizing: border-box;
}
#preferenceHeader {
    color: rgb(255, 255, 255);
    font-size: 1.4rem;
    margin-left: 1rem;
    user-select: none;
    line-height: 2rem;
    display: flex;
    white-space: nowrap;
    align-items: center;
    white-space: pre;
}
#leaderboardheader {
    color: rgb(255, 255, 255);
    font-size: 1.2rem;
    margin-left: 1rem;
    user-select: none;
    line-height: 2rem;
    display: flex;
    white-space: nowrap;
    align-items: center;
    white-space: pre;
}
.preferences a:hover {
    background-color: var(--incorrect);
}
#loginHeader {
    color: var(--currentWord);
    user-select: none;
    font-size: 2.5rem;
    font-weight: normal;
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
@keyframes slideUp {
    from {
        margin-top: 10rem;
    }

    to {
        margin-top: 0rem;
    }
}
@keyframes slideDown {
    from {
        margin-top: -3rem;
    }

    to {
        margin-top: 0rem;
    }
}
@keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}
@keyframes fadeOut {
    0% {
        opacity: 1;
    }

    100% {
        opacity: 0;

    }
}
@keyframes fadeColor {
    0% {
    }

    100% {
        color: var(--background)
    }
}
@keyframes blur {
    from {

        color: #3c4c79;
        text-shadow: none;
    }

    to {
        color: transparent;
        text-shadow: 0 0 8px rgb(187, 187, 187);
    }
}

@keyframes zoom {
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
    .animated-theme {
    display: block;
    position: fixed;
    border-radius: 50%;
    background-color: var(--bg-color);
    transform: translate(-50%, -50%);
    overflow: hidden;
    z-index: 99;
    animation: grow 1s ease-in-out;
    &.default {
        background-color: black !important;
    }
    @keyframes grow {
        0% {
            min-height: 0;
            min-width: 0;
        }
        80% {
            min-width: 4000px;
            min-height: 4000px;
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }
}
.keyboardPromo {
    border-radius: 1.5rem
}
#affiliateImage {
    opacity: 0;
    transition: filter .6s ease; /* Smooth transition */
    transition: opacity 0.5s ease-in-out;
    
}
#notifications
{
    position: fixed;
    top: 5rem;
    right: 5rem;
    width: 15rem;
    height: 7rem;
    color: var(--currentWord);
}
.notificationH
{
    font-size: 2rem;
}
.notificationD
{
    font-size: 1rem;
}
.notification
{
    user-select: none;
    background-color: var(--row);
    border-radius: 1.5rem;
    padding: 1rem;
    -moz-animation: fadeIn 1s  ease;
    /* Firefox */
    -webkit-animation: fadeIn 1s  ease,;
    /* Safari and Chrome */
    -o-animation: fadeIn 1s  ease;
    /* Opera */
    animation: cssAnimation 0s ease-in-out 1.5s forwards, fadeIn 1s  ease;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}
@keyframes cssAnimation {
    to {
        width:0;
        height:0;
        overflow:hidden;
        padding: 0;
    }
}
@-webkit-keyframes cssAnimation {
    to {
        width:0;
        height:0;
        visibility:hidden;
        padding: 0;
    }
}
.profileValues {
    color: var(--row);
    margin-left: 1rem;
    margin-top: .25rem;
    font-size: .7rem;
    line-height: 1.25rem;
}
.results
{   
    color: var(--row);
    margin-left: 1rem;
    font-size: 3rem;
    margin-bottom: 1rem;
}
#loginButton1 {
    background-color: var(--testText);
    text-decoration: none;
}
#loginButton2 {
    background-color: transparent;
    text-decoration: none;
    border: .3rem solid var(--row);
}
#accountCreate {
    color: var(--currentWord);
    display: inline-block;
    margin-top: 1rem;
}
#accountCreate a {
    text-decoration: none;
    color: var(--testText);
    margin-left: .25rem;
}
#check {
    color: var(--currentWord);
    margin-right: 0rem;
}
#myCheck {
    display: inline-block;
    padding: 0;
    accent-color: var(--testText);
    margin-right: 7rem;

}
#signInLink {
    text-decoration: none;
    color: var(--currentWord);
}
#signInText {
    align-self: center; 
    color: var(--row);
    text-align: center;
    padding: 2rem;
}
#middle {
    height: 100%;
    justify-content: center;
    margin-left: auto;
    margin-right: auto;
}
#middleContainer {
    display: inline-block;
    margin-left: 18rem;
}
#signupContainer {
    top: 11.5rem;
    width: 60rem;
    /* width of the container menu */
    /* background-color: #0a0c29; I personally think this is tacky */
    border-radius: 1.5rem;
    margin-top: 10rem;
    z-index: 1;
    position: relative;
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
.currentMode {
    color: var(--currentWord);
}
#themesContainer a {
    user-select: none;
    display: inline-block;
    text-align: center;
    padding: 3rem 5.6rem;
    transition: 1s;
    line-height: 1rem;
    height: 1rem;
    text-decoration: none;
    transition: transform .2s ease;
    margin-top: 1rem;
    text-align: center;
    /* Remove min-width */
    width: 10%;
    margin: 1.5rem;
    cursor: pointer;  
}
#themesContainer a:hover,
.preferences a:hover {
    transform: scale(1.05, 1.05);
    background-color: var(--background);
}
.preferences {
    display: flex;
    flex-direction: column;
}
#theme-olivia {
    color: #deaf9d;
    background-color: #1c1b1d;

}
@media (max-width: 768px) {
.color-theme {
    flex: 1 1 calc(20%); /* 4 items per row on medium screens */
    }
}
@media (max-width: 480px) {
    .color-theme {
        flex: 1 1 calc(100%); /* 1 item per row on very small screens */
    }
}
.theme-row-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Ensure space is evenly distributed */
    margin: 0 -10px; /* Adjust margin for spacing */
    user-select: none;
    color: var(--currentWord);
    background-color: var(--rowBackground);
    font-size: 1rem;
    padding: 1rem;
    margin-left: .5rem;
    line-height: 10px;
    vertical-align: top;
    text-decoration: none;
    /* Remove one of the margin properties */
    margin: 1rem;
    align-content: center;
}
.invisible {
    opacity: 0;
    transition: opacity 1s ease;
    filter: blur(10px)
}
    

</style>
