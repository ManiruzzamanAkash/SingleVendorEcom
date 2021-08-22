var poke = document.getElementById('poke');
var pokeM = document.getElementById('poke-m');
var cmp = document.getElementById('counter');
poke.addEventListener('click', myfonction)
pokeM.addEventListener('click', myfonctionM)
//===========================================================
function myfonction() {
  cmp.innerHTML = parseInt(cmp.innerHTML) +1;
}
//===========================================================
function myfonctionM() {
  cmp.innerHTML = parseInt(cmp.innerHTML) -1;

}





