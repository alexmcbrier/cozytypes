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
        --fontFamily: 'lexendDeca';
        --fontSize: 2;
        --height: calc(1.5rem * var(--fontSize) * var(--lineCount));
        --caret: 'caret';
        --caretTop: calc(var(--fontSize) * .25rem);
        --caretHeight: calc(var(--fontSize) * 1rem);
        --caretWidth: calc(var(--fontSize) * .1rem);
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
        border-radius: 80vw;
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
        font-family: var(--fontFamily);
        transition-delay: 0s;
        transition-duration: 0.25s;
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
        transition: all .5s ease-in-out 0s;
        width: 80%;
        margin: auto;
        display: grid;
        gap: .8rem;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    #logo 
    {
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
        transition: color .25s ease;
        color: var(--testText);
        padding: 1rem;
        font-family: var(--fontFamily);
    }
    .navIcon, #showUsername
    {
        transition: color .25s ease;
        text-decoration: none;
        font-size: 2rem;
        color: var(--row);
        
    }
    .navIcon:hover , #showUsername:hover {
        color: var(--currentWord);
    }
    .word {
        display: inline-block;
        padding-right: calc(var(--fontSize) * .45rem);
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

    .preference {
        cursor: pointer;
        color: white;
        background-color: var(--row);
        /* background-color:#191919;                      Background color */
        font-size: 1rem;
        border-radius: 1.3rem;
        display: inline-block;
        padding: 1.3rem;
        margin-left: .5rem;
        transition: transform .5s ease;
        line-height: 10px;
        vertical-align: top;
        text-decoration: none;
        align-items: center;
        line-height: 10px;
        margin-top: .5rem;
        text-align: center;
        min-width: 5rem;
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
        transition: color .25s ease;
        align-items: center;
    }
    .footerLinks:hover {
        color: var(--currentWord);
    }
    .linkDivider
    {
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
    .testItem
    {
        font-size: calc(var(--fontSize) * .5rem);;
        padding: 2rem;
        overflow: hidden;
    }
    #wpmDisplay
    {
        min-width: calc(var(--fontSize) * 2.25rem);
        font-size: 4rem;
        padding: 0;
    }
    #wpmDisplay, #time
    {
        text-align: center;
    }
    #time
    {
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
    .rowContainer {
    user-select: none;
    color: var(--currentWord);
    background-color: var(--rowBackground);
    font-size: 1rem;
    border-radius: 1.5rem;
    padding: 1rem;
    margin-left: .5rem;
    line-height: 10px;
    vertical-align: top;
    text-decoration: none;
    /* Remove one of the margin properties */
    margin: 1rem;
    align-content: center;
    transition-delay: 0s;
    transition-duration: 0.25s;
    transition-property: color, background; /* Add 'background' here */
    transition-timing-function: ease;
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
    #showRestart
    {
        color: var(--row);
        text-decoration: none;
        font-size: 2rem;
        padding: 0rem 1rem;
        transition: color .25s ease;
        user-select: none;
    }
    #showUsername
    {
        font-size: 2rem;
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
    #resetBox
    {
        font-size: 0rem;
        padding: 0;
    }
    .statsContainer
    {
        user-select: none;
        color: var(--currentWord);
        font-size: 1rem;
        border-radius: 1.5rem;
        padding: 1rem;
        margin-left: .5rem;
        transition: 1s;
        line-height: 10px;
        vertical-align: top;
        text-decoration: none;
        margin: 1rem;
        align-content: center;
        padding: 1rem;
        flex: 1;
        display: flex;
        flex-direction: column;
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

        transform: rotate(-90deg);
    }

    #restartTest {
        border: none;
        cursor: pointer;
        transition: transform .25s ease-in-out;
        font-size: calc(var(--fontSize) * .5rem);
        
    }
    #completionDisplay {
        font-size: calc(var(--fontSize) * .6rem);
    }
    .currentSetting
    {
        background-color: var(--background);
    }
    #wordsWrapper {
        /* transition: .25s all; */
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
        padding: 1rem .5rem;
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
    }
    #testText::first-line {
        color: var(--currentWord);
    }

    #cursor {
        width: var(--caretWidth);
        background-color: var(--correct);
        opacity: var(--caretOpacity);
        border-radius: 1.5rem;
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
    #loadingIcon
    {
    z-index: 1;
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 3rem;
    margin-top: -3rem;
    margin-left: -3rem;
    color: var(--currentWord);
    transition: opacity .25s ease;
    animation: spin 3s infinite linear;
    }
    .correct {
        color: var(--correct);
    }

    .incorrect,
    .extra {
        color: var(--incorrect);
    }
    #time
    {
        color: var(--currentWord);
    }
    .current-word {
        /* color: var(--currentWord); */
        display: inline-block;
        padding-right: calc(var(--fontSize) * .45rem);
    }

    .incorrect-word {
        color: var(--incorrect);
        display: inline-block;
        padding: 0rem calc(var(--fontSize) * .45rem);
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
        font-size: 1.3rem;
        padding: 0 1rem;
        color: rgb(255, 255, 255);
        opacity: 85%;
        line-height: 1rem;
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
        font-family: var(--fontFamily);
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
    #showSignIn:hover {
        color: var(--currentWord);
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

    #xpBar {
        margin-top: 3rem;
        width: 100%;
        height: 2rem;
        border-radius: 5rem;
        background: var(--backgroundDark);
        border: .3rem solid var(--background);
        text-align: center;
    }

    #friendsListArea {
        background-color: var(--backgroundDark);
        line-height: 10px;
        position: absolute;
        padding-top: 3rem;
        padding-bottom: 3rem;
        right: 0;
        width: 0;
        top: 0;
        height: 100%;
    }

    .sidebarOpen {
        animation: sidebarPadding 1s forwards, sidebar 1.5s forwards;
    }

    .sidebarClose {
        animation: sidebarClose 1.5s forwards;
    }

    #closeSidebar {
        cursor: pointer;
        user-select: none;
        color: var(--currentWord);
        background-color: var(--background);
        border: .3rem solid var(--row);
        font-size: 1rem;
        border-radius: 1.5rem;
        text-align: center;
        padding: 2rem;
        transition: 1s;
        width: 100%;
        box-sizing: border-box;
        margin-top: 1rem;
    }

    #sidebarImage {
        padding: 2rem;
    }
    #sidebarIcon 
    {
        display: table-cell;
        vertical-align: middle;
        transition: .5s opacity ease;
    }
    #sidebar {
        z-index: 2;
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        width: 10rem;
        border-radius: 3rem;
        text-align: center;
        display: table; 
        overflow: hidden;
        visibility: hidden; /* hide for now */
    }

    .hideSidebar {
        animation: sidebarClose2 1s forwards;
    }

    .showSidebar {
        animation: sidebarOpen 1s forwards;
    }

    #friendsListArea input {
        border: none;
        background: none;
        border-bottom: 2px solid #D1D1D4;
        outline: none;
        color: var(--currentWord);
    }

    #friendsListHeader {
        color: var(--currentWord);
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

    #addFriendButton {
        color: var(--currentWord);
        background-color: var(--background);
        border: .3rem solid var(--row);
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

    .friendDiv {
        display: flex;
    }

    .removeFriend {
        color: var(--currentWord);
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
        margin-bottom: 2.25rem;

    }

    .inviteFriend {
        color: var(--currentWord);
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
    }

    .friend {
        color: var(--currentWord);
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
        border-radius: 1.5rem;
        text-align: center;
        box-sizing: border-box;
    }

    #preferenceHeader {
    color: rgb(255, 255, 255);
    font-size: 2rem;
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

    @keyframes sidebar {
        from {
            position: absolute;
            right: 0;
            width: 0;

        }

        to {
            width: 25%;
        }
    }

    @keyframes sidebarOpen {
        from {

            right: 0;
            width: 0;
        }

        to {
            top: 0;
            right: 0;
            height: 100%;
            width: 10rem;
        }
    }

    @keyframes sidebarPadding {
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

    @sidebarPaddingClose {}

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
            position: absolute;
            right: 0;
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
            right: 0;
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
    .loginBtn {
        padding: 1.5rem;
        box-sizing: border-box;
        text-align: center;
        border-radius: 999px;
        width: 100%;
        color: var(--currentWord);
        font-size: 1rem;
        cursor: pointer;
        transition: all .2s ease-in-out;
        font-family: var(--fontFamily);
    }
    .profileValues {
        color: var(--row);
        margin-left: 1rem;
        margin-top: 1rem;
        font-size: 1.25rem;
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

    #loginButton1:hover {
        background-color: var(--incorrect);
    }

    #loginButton2:hover {
        background-color: var(--row);
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
    .currentMode
    {
        color: var(--currentWord);
    }
    #themesContainer a {
    user-select: none;
    border-radius: 2rem;
    display: inline-block;
    padding: 3rem 5.6rem;
    margin-left: .5rem;
    transition: 1s;
    line-height: 1rem;
    text-decoration: none;
    transition: transform .5s ease;
    margin-top: 1rem;
    text-align: center;
    /* Remove min-width */
    width: 10%;
    cursor: pointer;
    
}
    #themesContainer a:hover,
    .preferences a:hover {
        transform: scale(1.1, 1.1);
        background-color: var(--background);
    }
    .preferences
    {
        display: flex;
        flex-direction: column;
    }
    #displayStats {
        display: flex;
        background-color: var(--rowBackground);
        border-radius: 1.5rem;
        margin: 1rem;
        display: flex;
    }

    #theme-olivia {
        color: #deaf9d;
        background-color: #1c1b1d;

    }
    .color-theme
    {
        color: var(--testText);
        background-color: var(--background);
        flex: 1 1 calc(10%);
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
        border-radius: 1.5rem;
        padding: 1rem;
        margin-left: .5rem;
        line-height: 10px;
        vertical-align: top;
        text-decoration: none;
        /* Remove one of the margin properties */
        margin: 1rem;
        align-content: center;
        transition-delay: 0s;
        transition-duration: 0.25s;
        transition-property: color, background; /* Add 'background' here */
        transition-timing-function: ease;
    }
    

    .invisible {
        opacity: 0;
        transition: opacity 1s ease;
        filter: blur(10px)
    }

</style>
