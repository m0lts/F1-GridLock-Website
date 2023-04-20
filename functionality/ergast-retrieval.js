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

export const fetchNextRace = async (link) => {
  try {
    const response = await fetch(link);
    const data = await response.json();
    console.log(data);
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
    // fill quali time
    const qualiTime = data.MRData.RaceTable.Races[0].Qualifying.time;

    // fill circuit map

    
  } catch (error) {
    console.error(error);
  }
};

















// PREVIOUS ATTEMPTS - TO LOOK BACK AT ***********************************

// export const fetchLastResult = (link) => {
//     fetch(link)
//     .then(res => res.json())
//     .then(data => {
//         console.log(data.MRData.RaceTable.Races[0].Results);
//         const raceResult = data.MRData.RaceTable.Races[0].Results;
//         for (let i = 0; i < raceResult.length; i++) {
//             const fillBox = () => 
//             {let driverTeam = raceResult[i].Constructor.name;
//             if (driverTeam === "Aston Martin") {
//               driverTeam = './images/teams/aston.png';
//             } else if (driverTeam === "Mercedes") {
//               driverTeam = './images/teams/mercedes.png';
//             } else if (driverTeam === "Red Bull") {
//               driverTeam = './images/teams/red-bull.png';
//             } else if (driverTeam === "McLaren") {
//               driverTeam = './images/teams/mclaren.png';
//             } else if (driverTeam === "Haas F1 Team") {
//               driverTeam = './images/teams/haas.png';
//             } else if (driverTeam === "Alfa Romeo") {
//               driverTeam = './images/teams/alfa-romeo.png';
//             } else if (driverTeam === "AlphaTauri") {
//               driverTeam = './images/teams/alpha-tauri.png';
//             } else if (driverTeam === "Ferrari") {
//               driverTeam = './images/teams/ferrari.png';
//             } else if (driverTeam === "Alpine F1 Team") {
//               driverTeam = './images/teams/alpine.png';
//             } else if (driverTeam === "Williams") {
//               driverTeam = './images/teams/williams.png';
//             };
//               const driverFirstName = raceResult[i].Driver.givenName;
//               const driverSecondName = raceResult[i].Driver.familyName;
//               const driverNumber = raceResult[i].Driver.permanentNumber;
//               return  `<li class="driver-container">
//                             <div class="driver-details">
//                               <div class="driver-number">
//                                 <p>${driverNumber}</p>
//                               </div>
//                               <div class="driver-name">
//                                 <p class="firstname">${driverFirstName}</p>
//                                 <p class="surname">${driverSecondName}</p>
//                               </div>
//                             </div>
//                             <figure class="driver-img">
//                           <img src="${driverTeam}" alt="">
//                         </figure>
//                           </li>`;}
//                           const prevRaceResult = document.querySelector(".previous-race-result");
//                           prevRaceResult.innerHTML = fillBox() + fillBox();
//         }
//     })
//     .catch(err => console.log('Error retrieving data'))
// };

// export const fetchLastResult = (link) => {
//     fetch(link)
//     .then(res => res.json())
//     .then(data => {
//         console.log(data.MRData.RaceTable.Races[0].Results);
//         const raceResult = data.MRData.RaceTable.Races[0].Results;
//         raceResult.forEach(arr => {
//             const driverTeam = arr.Constructor.name;
//             const driverFirstName = arr.Driver.givenName;
//             const driverSecondName = arr.Driver.familyName;
//             const driverNumber = arr.Driver.permanentNumber;
//             const prevRaceResult = document.querySelector('.previous-race-result');
//             prevRaceResult.innerHTML = 
//                         `<li class="driver-container">
//                           <div class="driver-details">
//                             <div class="driver-number">
//                               <p>${driverNumber}</p>
//                             </div>
//                             <div class="driver-name">
//                               <p class="firstname">${driverFirstName}</p>
//                               <p class="surname">${driverSecondName}</p>
//                             </div>
//                           </div>
                          
//                         </li>`;
//         });
                        
//                         // ONLY ADDING THE LAST ARRAY INDEX = NEED TO USE FOREACH FUNCTION TO ADD EACH LIST ITEM
//     })
//     .catch(err => console.log('Error retrieving data'))
// };



// export const fetchLastResult = (link) => {
//     fetch(link)
//     .then(res => res.json())
//     .then(data => {
//         console.log(data.MRData.RaceTable.Races[0].Results);
//         const raceResult = data.MRData.RaceTable.Races[0].Results;
//         const p1 = () => {
//           let driverTeam = raceResult[0].Constructor.name;
//             if (driverTeam === "Aston Martin") {
//               driverTeam = './images/teams/aston.png';
//             } else if (driverTeam === "Mercedes") {
//               driverTeam = './images/teams/mercedes.png';
//             } else if (driverTeam === "Red Bull") {
//               driverTeam = './images/teams/red-bull.png';
//             } else if (driverTeam === "McLaren") {
//               driverTeam = './images/teams/mclaren.png';
//             } else if (driverTeam === "Haas F1 Team") {
//               driverTeam = './images/teams/haas.png';
//             } else if (driverTeam === "Alfa Romeo") {
//               driverTeam = './images/teams/alfa-romeo.png';
//             } else if (driverTeam === "AlphaTauri") {
//               driverTeam = './images/teams/alpha-tauri.png';
//             } else if (driverTeam === "Ferrari") {
//               driverTeam = './images/teams/ferrari.png';
//             } else if (driverTeam === "Alpine F1 Team") {
//               driverTeam = './images/teams/alpine.png';
//             } else if (driverTeam === "Williams") {
//               driverTeam = './images/teams/williams.png';
//             };
//             const driverFirstName = raceResult[0].Driver.givenName;
//             const driverSecondName = raceResult[0].Driver.familyName;
//             const driverNumber = raceResult[0].Driver.permanentNumber;
//             return  `<li class="driver-container">
//                           <div class="driver-details">
//                             <div class="driver-number">
//                               <p>${driverNumber}</p>
//                             </div>
//                             <div class="driver-name">
//                               <p class="firstname">${driverFirstName}</p>
//                               <p class="surname">${driverSecondName}</p>
//                             </div>
//                           </div>
//                           <figure class="driver-img">
//                         <img src="${driverTeam}" alt="">
//                       </figure>
//                         </li>`;
                      
//         }
//         const p2 = () => {
//           let driverTeam = raceResult[1].Constructor.name;
//           if (driverTeam === "Aston Martin") {
//             driverTeam = './images/teams/aston.png';
//           } else if (driverTeam === "Mercedes") {
//             driverTeam = './images/teams/mercedes.png';
//           } else if (driverTeam === "Red Bull") {
//             driverTeam = './images/teams/red-bull.png';
//           } else if (driverTeam === "McLaren") {
//             driverTeam = './images/teams/mclaren.png';
//           } else if (driverTeam === "Haas F1 Team") {
//             driverTeam = './images/teams/haas.png';
//           } else if (driverTeam === "Alfa Romeo") {
//             driverTeam = './images/teams/alfa-romeo.png';
//           } else if (driverTeam === "AlphaTauri") {
//             driverTeam = './images/teams/alpha-tauri.png';
//           } else if (driverTeam === "Ferrari") {
//             driverTeam = './images/teams/ferrari.png';
//           } else if (driverTeam === "Alpine F1 Team") {
//             driverTeam = './images/teams/alpine.png';
//           } else if (driverTeam === "Williams") {
//             driverTeam = './images/teams/williams.png';
//           };
//           const driverFirstName = raceResult[1].Driver.givenName;
//           const driverSecondName = raceResult[1].Driver.familyName;
//           const driverNumber = raceResult[1].Driver.permanentNumber;
//           return  `<li class="driver-container">
//                         <div class="driver-details">
//                           <div class="driver-number">
//                             <p>${driverNumber}</p>
//                           </div>
//                           <div class="driver-name">
//                             <p class="firstname">${driverFirstName}</p>
//                             <p class="surname">${driverSecondName}</p>
//                           </div>
//                         </div>
//                         <figure class="driver-img">
//                         <img src="${driverTeam}" alt="">
//                       </figure>
//                       </li>`;
                    
//       };
//       const p3 = () => {
//         let driverTeam = raceResult[2].Constructor.name;
//             if (driverTeam === "Aston Martin") {
//               driverTeam = './images/teams/aston.png';
//             } else if (driverTeam === "Mercedes") {
//               driverTeam = './images/teams/mercedes.png';
//             } else if (driverTeam === "Red Bull") {
//               driverTeam = './images/teams/red-bull.png';
//             } else if (driverTeam === "McLaren") {
//               driverTeam = './images/teams/mclaren.png';
//             } else if (driverTeam === "Haas F1 Team") {
//               driverTeam = './images/teams/haas.png';
//             } else if (driverTeam === "Alfa Romeo") {
//               driverTeam = './images/teams/alfa-romeo.png';
//             } else if (driverTeam === "AlphaTauri") {
//               driverTeam = './images/teams/alpha-tauri.png';
//             } else if (driverTeam === "Ferrari") {
//               driverTeam = './images/teams/ferrari.png';
//             } else if (driverTeam === "Alpine F1 Team") {
//               driverTeam = './images/teams/alpine.png';
//             } else if (driverTeam === "Williams") {
//               driverTeam = './images/teams/williams.png';
//             };
//         const driverFirstName = raceResult[2].Driver.givenName;
//         const driverSecondName = raceResult[2].Driver.familyName;
//         const driverNumber = raceResult[2].Driver.permanentNumber;
//         return  `<li class="driver-container">
//                       <div class="driver-details">
//                         <div class="driver-number">
//                           <p>${driverNumber}</p>
//                         </div>
//                         <div class="driver-name">
//                           <p class="firstname">${driverFirstName}</p>
//                           <p class="surname">${driverSecondName}</p>
//                         </div>
//                       </div>
//                       <figure class="driver-img">
//                         <img src="${driverTeam}" alt="">
//                       </figure>
//                     </li>`;
                  
//     };
//       const prevRaceResult = document.querySelector(".previous-race-result");
//       prevRaceResult.innerHTML = p1() + p2() + p3();
//     })
//     .catch(err => console.log('Error retrieving data'))
// };

