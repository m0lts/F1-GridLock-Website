


// Tally up points for each user

function calculatePoints(classNames, totalPointsElement) {
    const points = document.querySelectorAll(classNames);
    let pointsSum = 0;
  
    points.forEach(point => {
      const value = parseFloat(point.textContent);
  
      if (!isNaN(value)) {
        pointsSum += value;
      }
    });
  
    totalPointsElement.innerHTML = pointsSum;
  }
  
  // OWEN
  const owenTotalPoints = document.querySelector('.owen-points-total');
  calculatePoints('.owen-points', owenTotalPoints);
  
  // TOM
  const tomTotalPoints = document.querySelector('.tom-points-total');
  calculatePoints('.tom-points', tomTotalPoints);

  // TOBY
  const tobyTotalPoints = document.querySelector('.toby-points-total');
  calculatePoints('.toby-points', tobyTotalPoints);

  // ALI
  const aliTotalPoints = document.querySelector('.ali-points-total');
  calculatePoints('.ali-points', aliTotalPoints);

  // ED
  const edTotalPoints = document.querySelector('.ed-points-total');
  calculatePoints('.ed-points', edTotalPoints);

  // TOBY
  const jackTotalPoints = document.querySelector('.jack-points-total');
  calculatePoints('.jack-points', jackTotalPoints);



  // PUT SCORES IN ORDER

// const listElements = document.querySelectorAll('.points-tally');

// const listElementsArray = Array.from(listElements);

// listElementsArray.sort(function(a, b) {
//     var numA = parseFloat(a.innerHTML);
//     var numB = parseFloat(b.innerHTML);
  
//     if (!isNaN(numA) && !isNaN(numB)) {
//       // Both elements are numbers
//       return numB - numA; // Sort in descending order
//     } else if (!isNaN(numA)) {
//       // Only 'a' is a number, 'b' is not
//       return -1; // Maintain the order with text elements
//     } else if (!isNaN(numB)) {
//       // Only 'b' is a number, 'a' is not
//       return 1; // Maintain the order with text elements
//     } else {
//       // Both elements are text
//       return 0; // Maintain the original order
//     }
//   });

// const ul = document.createElement("ul");
// listElementsArray.forEach(element => {
//     ul.appendChild(element);
// });


// document.body.appendChild(ul);

// Get the people list
const peopleList = document.getElementById("peopleList");

// Get all the people list items
const peopleItems = Array.from(peopleList.getElementsByTagName("li"));

// Create an array to store the name and total pairs
const nameTotals = [];

// Iterate over each person's list item
peopleItems.forEach((personItem) => {
    // Get the person's name
    const name = personItem.firstChild.textContent.trim();

    // Get the person's total
    const total = parseInt(personItem.querySelector(".total").textContent);

    // Add the name and total to the array
    nameTotals.push({ name, total });
});

// Sort the nameTotals array based on the total points in descending order
nameTotals.sort((a, b) => b.total - a.total);

// Remove all existing list items
peopleItems.forEach((personItem) => personItem.remove());

// Reconstruct the list with the sorted names and totals
nameTotals.forEach((item) => {
    const listItem = document.createElement("li");
    listItem.textContent = `${item.name} (${item.total})`;
    peopleList.appendChild(listItem);
});