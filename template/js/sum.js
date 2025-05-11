 // Select all numeric inputs
 const inputs = document.querySelectorAll('.number-input');
 const resultDisplay = document.getElementById('sum-result');
 const averageDisplay = document.getElementById('average-result');
 const startDateInput = document.getElementById('start-date');
 const endDateInput = document.getElementById('end-date');
 const peopleCountInput = document.getElementById('people-count');

 // Function to calculate sum and average
 function calculate() {
     let sum = 0;

     // Calculate the sum of the numeric inputs
     inputs.forEach(input => {
         if (input.id !== 'people-count') { // Exclude people count from sum
             const value = parseFloat(input.value) || 0;
             sum += value;
         }
     });

     // Calculate the total number of days between selected dates
     const startDate = new Date(startDateInput.value);
     const endDate = new Date(endDateInput.value);
     let days = 0;

     if (startDate && endDate && endDate >= startDate) {
         const timeDifference = endDate - startDate + 86400000; // Include the end date
         days = timeDifference / (1000 * 3600 * 24);
     }

     // Each day is equivalent to 8 hours and 600 Baht
     const costPerDay = 600;
     const totalCost = days * costPerDay;

     // Calculate the final sum
     const finalSum = sum + totalCost;

     // Display the total sum
     resultDisplay.textContent = finalSum;

     // Calculate and display the average per person
     const peopleCount = parseInt(peopleCountInput.value) || 1; // Default to 1 to avoid division by zero
     const average = finalSum / peopleCount;
     averageDisplay.textContent = average.toFixed(2); // Show 2 decimal places
 }

 // Add event listeners for input changes
 inputs.forEach(input => {
     input.addEventListener('input', calculate);
 });

 // Add event listeners for date range inputs
 startDateInput.addEventListener('input', calculate);
 endDateInput.addEventListener('input', calculate);