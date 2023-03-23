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


//SHOW PREDICTION FUNCTIONALITY
const togglePred = (btn, pred) => {
    const btns = [aliBtn, edBtn, jackBtn, tobyBtn, tomBtn, owenBtn];
    btns.forEach(b => {
        if (b == btn) {
            btn.classList.add('active');
        } else {
            b.classList.remove('active');
        }
    });
    const preds = [aliPred, edPred, jackPred, tobyPred, tomPred, owenPred];
    preds.forEach(p => {
        if (p == pred) {
            pred.classList.add('show');
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



