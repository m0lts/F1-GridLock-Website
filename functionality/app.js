//nav bar
const menuBtn = document.querySelector('.menu-btn');
const navScreen = document.querySelector('.nav-screen');
//functionality
const showNavBar = () => {
    navScreen.classList.toggle('active');
}
menuBtn.addEventListener('click', showNavBar);


//predictions (try using queryselectorall if can?? not sure)
//get btns
const aliBtn = document.querySelector('.ali-btn');
const edBtn = document.querySelector('.ed-btn');
const jackBtn = document.querySelector('.jack-btn');
const tobyBtn = document.querySelector('.toby-btn');
const tomBtn = document.querySelector('.tom-btn');
const owenBtn = document.querySelector('.owen-btn');
//get prediction boxes
const aliPred = document.querySelector('.ali-pred');
const edPred = document.querySelector('.ed-pred');
const jackPred = document.querySelector('.jack-pred');
const tobyPred = document.querySelector('.toby-pred');
const tomPred = document.querySelector('.tom-pred');
const owenPred = document.querySelector('.owen-pred');
//button background functionality
//ali's button
const aliBckgrd = () => {
    aliBtn.classList.add('active');
    edBtn.classList.remove('active');
    jackBtn.classList.remove('active');
    tobyBtn.classList.remove('active');
    tomBtn.classList.remove('active');
    owenBtn.classList.remove('active');
}
aliBtn.addEventListener('click', aliBckgrd);
//ed's button
const edBckgrd = () => {
    edBtn.classList.add('active');
    aliBtn.classList.remove('active');
    jackBtn.classList.remove('active');
    tobyBtn.classList.remove('active');
    tomBtn.classList.remove('active');
    owenBtn.classList.remove('active');
}
edBtn.addEventListener('click', edBckgrd);
//jack's button
const jackBckgrd = () => {
    jackBtn.classList.add('active');
    aliBtn.classList.remove('active');
    edBtn.classList.remove('active');
    tobyBtn.classList.remove('active');
    tomBtn.classList.remove('active');
    owenBtn.classList.remove('active');
}
jackBtn.addEventListener('click', jackBckgrd);
//toby's button
const tobyBckgrd = () => {
    tobyBtn.classList.add('active');
    aliBtn.classList.remove('active');
    edBtn.classList.remove('active');
    jackBtn.classList.remove('active');
    tomBtn.classList.remove('active');
    owenBtn.classList.remove('active');
}
tobyBtn.addEventListener('click', tobyBckgrd);
//tom's button
const tomBckgrd = () => {
    tomBtn.classList.add('active');
    aliBtn.classList.remove('active');
    edBtn.classList.remove('active');
    jackBtn.classList.remove('active');
    tobyBtn.classList.remove('active');
    owenBtn.classList.remove('active');
}
tomBtn.addEventListener('click', tomBckgrd);
//owen's button
const owenBckgrd = () => {
    owenBtn.classList.add('active');
    aliBtn.classList.remove('active');
    edBtn.classList.remove('active');
    jackBtn.classList.remove('active');
    tobyBtn.classList.remove('active');
    tomBtn.classList.remove('active');
}
owenBtn.addEventListener('click', owenBckgrd);
//show prediction functionality
//ali's prediction
const showAliPred = () => {
    aliPred.classList.add('show-pred');
    edPred.classList.remove('show-pred');
    jackPred.classList.remove('show-pred');
    tobyPred.classList.remove('show-pred');
    tomPred.classList.remove('show-pred');
    owenPred.classList.remove('show-pred');
}
aliBtn.addEventListener('click', showAliPred);
//ed's prediction
const showEdPred = () => {
    edPred.classList.add('show-pred');
    aliPred.classList.remove('show-pred');
    jackPred.classList.remove('show-pred');
    tobyPred.classList.remove('show-pred');
    tomPred.classList.remove('show-pred');
    owenPred.classList.remove('show-pred');
}
edBtn.addEventListener('click', showEdPred);
//jack's prediction
const showJackPred = () => {
    jackPred.classList.add('show-pred');
    aliPred.classList.remove('show-pred');
    edPred.classList.remove('show-pred');
    tobyPred.classList.remove('show-pred');
    tomPred.classList.remove('show-pred');
    owenPred.classList.remove('show-pred');
}
jackBtn.addEventListener('click', showJackPred);
//toby's prediction
const showTobyPred = () => {
    tobyPred.classList.add('show-pred');
    aliPred.classList.remove('show-pred');
    edPred.classList.remove('show-pred');
    jackPred.classList.remove('show-pred');
    tomPred.classList.remove('show-pred');
    owenPred.classList.remove('show-pred');
}
tobyBtn.addEventListener('click', showTobyPred);
//tom's prediction
const showTomPred = () => {
    tomPred.classList.add('show-pred');
    aliPred.classList.remove('show-pred');
    edPred.classList.remove('show-pred');
    jackPred.classList.remove('show-pred');
    tobyPred.classList.remove('show-pred');
    owenPred.classList.remove('show-pred');
}
tomBtn.addEventListener('click', showTomPred);
//owen's prediction
const showOwenPred = () => {
    owenPred.classList.add('show-pred');
    aliPred.classList.remove('show-pred');
    edPred.classList.remove('show-pred');
    jackPred.classList.remove('show-pred');
    tobyPred.classList.remove('show-pred');
    tomPred.classList.remove('show-pred');
}
owenBtn.addEventListener('click', showOwenPred);
