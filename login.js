const email = document.querySelector('input')
const keycapTop = document.getElementById("keycapTop")
const keycapBottom = document.getElementById("keycapBottom")
email.addEventListener('input', keycapClick)

function keycapClick()
{
    keycapTop.style.animation= "MoveUpDown .5s ease";
}
keycapTop.addEventListener('animationend', () => {
    console.log('Animation ended');
    keycapTop.style.animation= "";
  });
  