//nav bar
const menuBtn = document.querySelector('.menu-btn');
const navScreen = document.querySelector('.nav-screen');
//functionality
const showNavBar = () => {
    navScreen.classList.toggle('active');
}
menuBtn.addEventListener('click', showNavBar);


// //predictions (try using queryselectorall if can?? not sure)
// //get btns
const aliBtn = document.querySelector('.ali');
const edBtn = document.querySelector('.ed');
const jackBtn = document.querySelector('.jack');
const tobyBtn = document.querySelector('.toby');
const tomBtn = document.querySelector('.tom');
const owenBtn = document.querySelector('.owen');
//get prediction boxes
const aliPred = document.querySelector('.ali-pred');
const edPred = document.querySelector('.ed-pred');
const jackPred = document.querySelector('.jack-pred');
const tobyPred = document.querySelector('.toby-pred');
const tomPred = document.querySelector('.tom-pred');
const owenPred = document.querySelector('.owen-pred');
// //button background functionality
// //ali's button
// const aliBckgrd = () => {
//     aliBtn.classList.add('active');
//     edBtn.classList.remove('active');
//     jackBtn.classList.remove('active');
//     tobyBtn.classList.remove('active');
//     tomBtn.classList.remove('active');
//     owenBtn.classList.remove('active');
// }
// aliBtn.addEventListener('click', aliBckgrd);
// //ed's button
// const edBckgrd = () => {
//     edBtn.classList.add('active');
//     aliBtn.classList.remove('active');
//     jackBtn.classList.remove('active');
//     tobyBtn.classList.remove('active');
//     tomBtn.classList.remove('active');
//     owenBtn.classList.remove('active');
// }
// edBtn.addEventListener('click', edBckgrd);
// //jack's button
// const jackBckgrd = () => {
//     jackBtn.classList.add('active');
//     aliBtn.classList.remove('active');
//     edBtn.classList.remove('active');
//     tobyBtn.classList.remove('active');
//     tomBtn.classList.remove('active');
//     owenBtn.classList.remove('active');
// }
// jackBtn.addEventListener('click', jackBckgrd);
// //toby's button
// const tobyBckgrd = () => {
//     tobyBtn.classList.add('active');
//     aliBtn.classList.remove('active');
//     edBtn.classList.remove('active');
//     jackBtn.classList.remove('active');
//     tomBtn.classList.remove('active');
//     owenBtn.classList.remove('active');
// }
// tobyBtn.addEventListener('click', tobyBckgrd);
// //tom's button
// const tomBckgrd = () => {
//     tomBtn.classList.add('active');
//     aliBtn.classList.remove('active');
//     edBtn.classList.remove('active');
//     jackBtn.classList.remove('active');
//     tobyBtn.classList.remove('active');
//     owenBtn.classList.remove('active');
// }
// tomBtn.addEventListener('click', tomBckgrd);
// //owen's button
// const owenBckgrd = () => {
//     owenBtn.classList.add('active');
//     aliBtn.classList.remove('active');
//     edBtn.classList.remove('active');
//     jackBtn.classList.remove('active');
//     tobyBtn.classList.remove('active');
//     tomBtn.classList.remove('active');
// }
// owenBtn.addEventListener('click', owenBckgrd);





//SHOW PREDICTION FUNCTIONALITY
//ali's prediction
const showAliPred = () => {
    aliPred.classList.add('show');
    edPred.classList.remove('show');
    jackPred.classList.remove('show');
    tobyPred.classList.remove('show');
    tomPred.classList.remove('show');
    owenPred.classList.remove('show');
}
aliBtn.addEventListener('click', showAliPred);
//ed's prediction
const showEdPred = () => {
    edPred.classList.add('show');
    aliPred.classList.remove('show');
    jackPred.classList.remove('show');
    tobyPred.classList.remove('show');
    tomPred.classList.remove('show');
    owenPred.classList.remove('show');
}
edBtn.addEventListener('click', showEdPred);
//jack's prediction
const showJackPred = () => {
    jackPred.classList.add('show');
    aliPred.classList.remove('show');
    edPred.classList.remove('show');
    tobyPred.classList.remove('show');
    tomPred.classList.remove('show');
    owenPred.classList.remove('show');
}
jackBtn.addEventListener('click', showJackPred);
//toby's prediction
const showTobyPred = () => {
    tobyPred.classList.add('show');
    aliPred.classList.remove('show');
    edPred.classList.remove('show');
    jackPred.classList.remove('show');
    tomPred.classList.remove('show');
    owenPred.classList.remove('show');
}
tobyBtn.addEventListener('click', showTobyPred);
//tom's prediction
const showTomPred = () => {
    tomPred.classList.add('show');
    aliPred.classList.remove('show');
    edPred.classList.remove('show');
    jackPred.classList.remove('show');
    tobyPred.classList.remove('show');
    owenPred.classList.remove('show');
}
tomBtn.addEventListener('click', showTomPred);
//owen's prediction
const showOwenPred = () => {
    owenPred.classList.add('show');
    aliPred.classList.remove('show');
    edPred.classList.remove('show');
    jackPred.classList.remove('show');
    tobyPred.classList.remove('show');
    tomPred.classList.remove('show');
}
owenBtn.addEventListener('click', showOwenPred);


//ARROW ROTATION AND SHOW BUTTON SELECTED
const h3Titles = document.querySelectorAll('.stats-h3');

h3Titles.forEach(title => {
    title.addEventListener('click', function() {
        //selecting respective arrows for rotation
        const arrow = title.querySelector('.right-arrow');
        arrow.classList.toggle('rotate');
        //showing tabs when clicked
        let nextSibling = title.nextElementSibling;
        nextSibling.classList.toggle('show');
    })
})

//SHOW PREDICTIONS / STATS BOX
const statsTab = document.querySelector('.stats');
const predictionsTab = document.querySelector('.predictions');
const statsBox = document.querySelector('.stats-box');
const predictionsBox = document.querySelector('.predictions-box');


const showStatsTab = () => {
    statsBox.classList.remove('hide');
    predictionsBox.classList.remove('show');
    statsTab.classList.remove('hide');
    predictionsTab.classList.remove('show');
}

const showPredictionsTab = () => {
    statsBox.classList.add('hide');
    predictionsBox.classList.add('show');
    statsTab.classList.add('hide');
    predictionsTab.classList.add('show');
}

statsTab.addEventListener('click', showStatsTab);
predictionsTab.addEventListener('click', showPredictionsTab);

//TIMER COUNTDOWN
const countdownClock = document.querySelector('.timer');

let countdownDate = new Date("Apr 1, 2023 06:00:00");

let countdown = setInterval(function() {
    let now = new Date().getTime();
    let distance = countdownDate - now;
    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);
    const addZero = (num) => {
        if (num < 10) {
            num = "0" + num;
            return num;
        } else {
            return num;
        }
    }
    countdownClock.innerHTML = addZero(days) + ":" + addZero(hours) + ":" + addZero(minutes) + ":" + addZero(seconds);
    if (distance < 0) {
        clearInterval(countdown);
        countdownClock.innerHTML = "LIVE";
        countdownClock.style.color = 'red';
    };
}, 1000);