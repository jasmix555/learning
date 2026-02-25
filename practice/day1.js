function isEven(number) {
  return number % 2 === 0
}

function isOdd(num) {
  return num % 2 !== 0
}

function isDivisibleBy(num, div) {
  return num % div === 0;
}

function countEvenNumbers(arr) {
  let count = 0;
  arr.forEach(i => {
    if (i % 2 === 0) {
      count++;
    }
  });
  return count;
}

function sumOfEvenNumbers(arr) {
  let sum = 0;
  for (let i = 0; i < arr.length; i++) {
    if (arr[i] % 2 === 0) {
      sum += arr[i]
    }
  }

  return sum;
}

function sumOfOddNumbers(arr) {
  let sum = 0;

  for (let i = 0; i < arr.length; i++) {
    if (arr[i] % 2 !== 0) {
      sum += arr[i]
    }
  }
  return sum;
}

function averageOfEvenNumbers(arr) {
  let avg = 0;
  let count = 0;

  for (let i = 0; i < arr.length; i++) {
    if (arr[i] % 2 === 0) {
      avg += arr[i]
      count++
    }
  }

  if (count === 0) {
    return 0;
  }

  return avg / count;
}

function findLargestEvenNumber(arr) {
  var large = null;

  for (let i = 0; i < arr.length; i++) {
    // if number is even:
    if (arr[i] % 2 === 0) {
      // if largestEven is null:
      if (large === null) {
        // store number
        large = arr[i]
      }
      // else if number is greater than largestEven:
      else if (arr[i] > large) {
        //  update largestEven
        large = arr[i]
      }
    }
  }

  // show the last result
  return large;
}

function findSmallestEvenNumber(arr) {
  var small = null;

  for (let i = 0; i < arr.length; i++) {
    // if number is even:
    if (arr[i] % 2 === 0) {
      // if smallestEven is null:
      if (small === null) {
        // store number
        small = arr[i]
      }
      // else if number is greater than smallestEven:
      else if (arr[i] < small) {
        //  update smallestEven
        small = arr[i]
      }
    }
  }

  // show the last result
  return small;
}

function findSecondLargestEvenNumber(arr) {
  var large = null;
  var secondLarge = null;

  for (let i = 0; i < arr.length; i++) {
    // if number is even:
    if (arr[i] % 2 === 0) {
      // if largest is null OR number > largest:
      if (large === null || arr[i] > large) {
        // second = largest
        // largest = number
        secondLarge = large
        large = arr[i]
      }
      // else if second is null OR number > second:
      else if (secondLarge === null || arr[i] > secondLarge) {
        //  second = number
        secondLarge = arr[i]
      }
    }
  }

  // show the last result
  return secondLarge;
}

function doubleNumbers(arr) {
  return arr.map(function(num) {
    return num * 2;
  });
}

const users = [
  { id: 1, name: "Ken", age: 22 },
  { id: 2, name: "Sara", age: 30 },
  { id: 3, name: "Mike", age: 18 }
];

function getUserNames(users){
  return users.map(function(user){
    return user.name;
  })
}

// function getAdultUsers(users){
//   return users.filter(function(user){
//     return user.age > 25;
//   })
// }

const getAdultUsers = users =>
  users.filter(user => user.age > 25);

const getTeenageUsers = users =>
  users.filter(user => user.age >= 13 && user.age <= 19);

const getTeenageUsersNames = users =>
  users
  .filter(user => user.age >= 13 && user.age <= 19)
  .map(user => user.name);

const totalAge = users.reduce((total, user) =>{
   return total + user.age

}, 0);

// const userNames = users.reduce((names, user) =>{
//     names.push(user.name);
//     return names;

// }, []);

const userNames = users.reduce((names, user) => [...names, user.name], [])

console.log(userNames);
