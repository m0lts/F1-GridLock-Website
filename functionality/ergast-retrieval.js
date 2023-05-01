// RETRIEVE ERGAST DEVELOPER API FUNCTION

const teamImages = {
  "Aston Martin": "./images/teams/aston.png",
  "Mercedes": "./images/teams/mercedes.png",
  "Red Bull": "./images/teams/red-bull.png",
  "McLaren": "./images/teams/mclaren.png",
  "Haas F1 Team": "./images/teams/haas.png",
  "Alfa Romeo": "./images/teams/alfa-romeo.png",
  "AlphaTauri": "./images/teams/alpha-tauri.png",
  "Ferrari": "./images/teams/ferrari.png",
  "Alpine F1 Team": "./images/teams/alpine.png",
  "Williams": "./images/teams/williams.png",
};

export const fetchLastResult = async (link, fill) => {
  try {
    const response = await fetch(link);
    const data = await response.json();
    const raceResult = data.MRData.RaceTable.Races[0].Results;
    const mappedArray = raceResult.slice().map((result) => {
      const driverTeam = teamImages[result.Constructor.name];
      const driverFirstName = result.Driver.givenName;
      const driverSecondName = result.Driver.familyName;
      const driverNumber = result.Driver.permanentNumber;
      return `
        <li class="driver-container">
          <div class="driver-details">
            <div class="driver-number">
              <p>${driverNumber}</p>
            </div>
            <div class="driver-name">
              <p class="firstname">${driverFirstName}</p>
              <p class="surname">${driverSecondName}</p>
            </div>
          </div>
          <figure class="driver-img">
            <img src="${driverTeam}" alt="">
          </figure>
        </li>
      `;
    }).join("");
    const areaToFill = document.querySelector(fill);
    areaToFill.innerHTML = mappedArray;
  } catch (error) {
    console.error(error);
  }
};


const circuitFlags = {
  "Bahrain": "./images/flags/Flag_of_Bahrain.png",
  "Saudi Arabia": "./images/flags/saudi_flag.jpeg",
  "Australia": "./images/flags/Flag-Australia.webp",
  "Azerbaijan": "./images/flags/azer_flag.png",
  "USA": "./images/flags/USA.png",
  "Italy": "./images/flags/Italy_flag.png",
  "Monaco": "./images/flags/Monaco_Flag.png",
  "Spain": "./images/flags/spain_flag.webp",
  "Canada": "./images/flags/Canadian_Flag.png",
  "Austria": "./images/flags/Flag_of_Austria.png",
  "UK": "./images/flags/uk_flag.svg",
  "Hungary": "./images/flags/hungary_flag.png",
  "Belgium": "./images/flags/belgian_flag.png",
  "Netherlands": "./images/flags/dutch_flag.png",
  "Singapore": "./images/flags/singapore_flag.jpeg",
  "Japan": "./images/flags/japan_flag.png",
  "Qatar": "./images/flags/qatar_flag.png",
  "Mexico": "./images/flags/mexico_flag.svg",
  "Brazil": "./images/flags/brazil_flag.png",
  "United States": "./images/flags/USA.png",
  "UAE": "./images/flags/uae_flag.png"
};

const circuitNames = {
  "Bahrain Grand Prix": "Bahrain",
  "Saudi Arabian Grand Prix": "Saudi Arabia",
  "Australian Grand Prix": "Australia",
  "Azerbaijan Grand Prix": "Azerbaijan",
  "Miami Grand Prix": "Miami",
  "Emilia Romagna Grand Prix": "Imola",
  "Monaco Grand Prix": "Monaco",
  "Spanish Grand Prix": "Spain",
  "Canadian Grand Prix": "Canada",
  "Austrian Grand Prix": "Austria",
  "British Grand Prix": "Great Britain",
  "Hungarian Grand Prix": "Hungary",
  "Belgian Grand Prix": "Belgium",
  "Italian Grand Prix": "Monza",
  "Dutch Grand Prix": "Netherlands",
  "Singapore Grand Prix": "Singapore",
  "Japanese Grand Prix": "Japan",
  "Qatar Grand Prix": "Qatar",
  "Mexico City Grand Prix": "Mexico",
  "São Paulo Grand Prix": "Brazil",
  "United States Grand Prix": "United States",
  "Las Vegas Grand Prix": "Las Vegas",
  "Abu Dhabi Grand Prix": "Abu Dhabi"
};

const circuitTracks = {
  "Bahrain Grand Prix": "./images/tracks/bahrain_track.png",
  "Saudi Arabian Grand Prix": "./images/tracks/saudi_track.png",
  "Australian Grand Prix": "./images/tracks/australia_track.png",
  "Azerbaijan Grand Prix": "./images/tracks/baku_track.png",
  "Miami Grand Prix": "./images/tracks/miami_track.png",
  "Emilia Romagna Grand Prix": "./images/tracks/imola_track.png",
  "Monaco Grand Prix": "./images/tracks/monaco_track.png",
  "Spanish Grand Prix": "./images/tracks/spain_track.png",
  "Canadian Grand Prix": "./images/tracks/canada_track.png",
  "Austrian Grand Prix": "./images/tracks/austria_track.png",
  "British Grand Prix": "./images/tracks/uk_track.png",
  "Hungarian Grand Prix": "./images/tracks/hungary_track.png",
  "Belgian Grand Prix": "./images/tracks/belgium_track.png",
  "Italian Grand Prix": "./images/tracks/monza_track.png",
  "Dutch Grand Prix": "./images/tracks/dutch_track.png",
  "Singapore Grand Prix": "./images/tracks/singapore_track.png",
  "Japanese Grand Prix": "./images/tracks/japan_track.png",
  "Qatar Grand Prix": "./images/tracks/qatar_track.png",
  "Mexico City Grand Prix": "./images/tracks/mexico_track.png",
  "São Paulo Grand Prix": "./images/tracks/brazil_track.png",
  "United States Grand Prix": "./images/tracks/usa_track.png",
  "Las Vegas Grand Prix": "./images/tracks/lasvegas_track.png",
  "Abu Dhabi Grand Prix": "./images/tracks/abudhabi_track.png"
};

export const fetchNextRace = async (link) => {
  try {
    const response = await fetch(link);
    const data = await response.json();
    // fill circuit country title
    const raceName = data.MRData.RaceTable.Races[0].raceName;
    const circuitName = circuitNames[raceName];
    const circuitNameFill = document.querySelector('#race-country');
    circuitNameFill.innerHTML = `${circuitName}`;
    // fill circuit flag
    const circuitCountry = data.MRData.RaceTable.Races[0].Circuit.Location.country;
    const countryFlag = circuitFlags[circuitCountry];
    const flagFill = document.querySelector('.flag-fill');
    flagFill.src = `${countryFlag}`;
    flagFill.alt = raceName;
    // fill quali time
    const qualiTime = data.MRData.RaceTable.Races[0].Qualifying.time;
    let timeString = qualiTime.split("");
    timeString.pop();
    timeString[1]++;
    const returnedQualiTime = timeString.join("");
    const qualiDate = data.MRData.RaceTable.Races[0].Qualifying.date;
    const countdownClock = document.querySelector('.timer');
    // countdown logic
    let countdownDate = new Date(`${qualiDate} ${qualiTime}`);
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
    // fill circuit map
    const circuitTrack = circuitTracks[raceName];
    const circuitFill = document.querySelector('.circuit-fill');
    circuitFill.src = `${circuitTrack}`;
    circuitFill.alt = raceName;
  } catch (error) {
    console.error(error);
  }
};
