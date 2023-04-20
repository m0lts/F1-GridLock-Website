// ***********
//NAV BAR
const menuBtn = document.querySelector('.menu-btn');
const navScreen = document.querySelector('.nav-screen');
//functionality
const showNavBar = () => {
    navScreen.classList.toggle('active');
}
menuBtn.addEventListener('click', showNavBar);
// **********








// ***********
// TAKE PRE-PROGRAMMED OBJECTS FROM DRIVERS.JS TO FILL RELEVANT BOXES
import { verstappenCard,
    perezCard,
    hamiltonCard,
    russellCard,
    leclercCard,
    sainzCard,
    alonsoCard,
    strollCard,
    norrisCard,
    piastriCard,
    oconCard,
    gaslyCard,
    albonCard,
    sargeantCard,
    bottasCard,
    zhouCard,
    deVriesCard,
    tsunodaCard,
    magnussenCard,
    hulkenbergCard,
    ricciardoMclarenCard,
    gaslyAlphaTauriCard,
    schumacherCard,
    alonsoAlpineCard,
    vettelCard,
    latifiCard } from './drivers.js';


// fill predictions
const aliPred = document.querySelector('.ali-pred');
const edPred = document.querySelector('.ed-pred');
const jackPred = document.querySelector('.jack-pred');
const tobyPred = document.querySelector('.toby-pred');
const tomPred = document.querySelector('.tom-pred');
const owenPred = document.querySelector('.owen-pred');

aliPred.innerHTML = '' ;
edPred.innerHTML =  '' ;
jackPred.innerHTML = '' ;
tobyPred.innerHTML = '' ;
tomPred.innerHTML = '' ;
owenPred.innerHTML = '' ;

// BACKUP PREDICTIONS
// aliPred.innerHTML = verstappenCard + leclercCard + perezCard + alonsoCard + sainzCard + hamiltonCard + strollCard + russellCard + norrisCard + gaslyCard;
// edPred.innerHTML = verstappenCard + perezCard + leclercCard + russellCard + hamiltonCard + sainzCard + alonsoCard + norrisCard + oconCard + piastriCard;
// jackPred.innerHTML = leclercCard + verstappenCard + perezCard + sainzCard + russellCard + hamiltonCard + norrisCard + alonsoCard + strollCard + bottasCard;
// tobyPred.innerHTML = verstappenCard + leclercCard + perezCard + sainzCard + hamiltonCard + russellCard + oconCard + gaslyCard + alonsoCard + norrisCard;
// tomPred.innerHTML = verstappenCard + perezCard + alonsoCard + leclercCard + sainzCard + hamiltonCard + strollCard + russellCard + norrisCard + oconCard;
// owenPred.innerHTML = verstappenCard + leclercCard + alonsoCard + perezCard + hamiltonCard + russellCard + gaslyCard + strollCard + oconCard + norrisCard;

// fill previous year result
// const prevYearResult = document.querySelector(".previous-year-result");
// prevYearResult.innerHTML = verstappenCard + perezCard + russellCard + hamiltonCard + gaslyAlphaTauriCard + vettelCard + alonsoAlpineCard + ricciardoMclarenCard + norrisCard + oconCard + bottasCard + albonCard + tsunodaCard + schumacherCard + latifiCard + strollCard + magnussenCard + zhouCard + leclercCard + sainzCard;

// fill previous race result
// const prevRaceResult = document.querySelector(".previous-race-result");
// prevRaceResult.innerHTML = verstappenCard + hamiltonCard + alonsoCard + strollCard + perezCard + norrisCard + hulkenbergCard + piastriCard + zhouCard + tsunodaCard + bottasCard + sainzCard + gaslyCard + oconCard + deVriesCard + sargeantCard + magnussenCard + russellCard + albonCard + leclercCard;

// fill standings boxes
// ali prev predictions

// ****************











// ****************
//SHOW PREDICTION FUNCTIONALITY
//get btns
const aliBtn = document.querySelector('.ali');
const edBtn = document.querySelector('.ed');
const jackBtn = document.querySelector('.jack');
const tobyBtn = document.querySelector('.toby');
const tomBtn = document.querySelector('.tom');
const owenBtn = document.querySelector('.owen');
// logic
const togglePred = (btn, pred) => {
    const btns = [aliBtn, edBtn, jackBtn, tobyBtn, tomBtn, owenBtn];
    btns.forEach(b => {
        if (b == btn) {
            b.classList.add('active');
        } else {
            b.classList.remove('active');
        }
    });
    const preds = [aliPred, edPred, jackPred, tobyPred, tomPred, owenPred];
    preds.forEach(p => {
        if (p == pred) {
            p.classList.add('show');
        } else {
            p.classList.remove('show');
        }
    })
    };
aliBtn.addEventListener('click', () => togglePred(aliBtn, aliPred));
edBtn.addEventListener('click', () => togglePred(edBtn, edPred));
jackBtn.addEventListener('click', () => togglePred(jackBtn, jackPred));
tobyBtn.addEventListener('click', () => togglePred(tobyBtn, tobyPred));
tomBtn.addEventListener('click', () => togglePred(tomBtn, tomPred))
owenBtn.addEventListener('click', () => togglePred(owenBtn, owenPred));
// ****************











// ***************
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
// ********************










// ******************
//TIMER COUNTDOWN
const countdownClock = document.querySelector('.timer');

let countdownDate = new Date("Apr 28, 2023 14:00:00");

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
// ***********************


// RETRIEVE ERGAST DEVELOPER API

import { fetchLastResult } from "./ergast-retrieval.js";

const lastRaceResultLink = 'http://ergast.com/api/f1/current/last/results.json';
fetchLastResult(lastRaceResultLink, ".previous-race-result");

const lastYearResultLink = 'http://ergast.com/api/f1/2022/8/results.json'
fetchLastResult(lastYearResultLink, ".previous-year-result");


// retrieve next race details

import { fetchNextRace } from "./ergast-retrieval.js";

const nextRaceLink = 'http://ergast.com/api/f1/current/next.json';
fetchNextRace(nextRaceLink);







