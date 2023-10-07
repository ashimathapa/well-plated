document.addEventListener("DOMContentLoaded", function () {
  let searchInput = document.getElementById("search-input");
  let personList = document.getElementById("person-list");
  // let recipeContainer = document.getElementsByClassName("viewRecipe");

  let people = [
    {
      name: "Burger",
      type: "Vegeterian",
      ingredients: "Cheese, Vegetables",
      photo: "./img/burgercombo.jpg",
      recipeUrl: "./Burger.html",
    },

    {
      name: "Barbecue",
      type: "Non-Veg",
      ingredients: "Ketchup, Oil ",
      photo: "./img/barbecue.jpg",
    },
    {
      name: "Pulau",
      type: "Vegetarian",
      ingredients: " Bread, Vegetables",
      photo: "./img/pulau.jpg",
      recipeUrl: "./pulau.html",
    },
    {
      name: "Khir",
      type: "Vegetarian",
      ingredients: " milk, ghee",
      photo: "./img/khir.jpg",
    },
    {
      name: "Paneer",
      type: "Vegetarian",
      ingredients: "Milk, lemon-juice",
      photo: "./img/paneer.jpg",
    },
    {
      name: "Thukpa",
      type: "Non-Veg",
      ingredients: "Noodles, meat",
      photo: "./img/thukpa.jpg",
    },
    {
      name: "Biryani",
      type: "Non-Veg",
      ingredients: "Meat, Ghee",
      photo: "./img/biryani.jpg",
    },
    {
      name: "chowmin",
      type: "Non-Veg",
      ingredients: "Noodles, Vegetables",
      photo: "./img/chowmin.jpg",
    },
    {
      name: "Milkshake",
      type: "Drinks",
      ingredients: "Icecream,Milk ",
      photo: "./img/milkshake.jpg",
    },
    // {
    //   name: "Momo",
    //   type: "Non-Veg",
    //   ingredients: "Meat, Oil, flour",
    //   photo: "./img/momo.jpg",
    //   recipeUrl: "./momo.html",
    // },
    {
      name: "Momo",
      type: "Vegetarian",
      ingredients: "Flour, Oil, Vegetables",
      photo: "./img/momo.jpg",
      recipeUrl: "./Momo.html",
    },
    // Add details for the remaining people
    // ...
  ];

  function generatePersonCard(person) {
    let card = document.createElement("div");
    card.className = "person-card";

    let photo = document.createElement("div");
    photo.className = "person-photo";
    let img = document.createElement("img");
    img.src = person.photo;
    photo.appendChild(img);

    let name = document.createElement("div");
    name.className = "person-name";
    name.textContent = person.name;

    let type = document.createElement("div");
    type.className = "person-info";
    type.textContent = "Type: " + person.type;

    let ingredients = document.createElement("div");
    ingredients.className = "person-info";
    ingredients.textContent = "Ingredients: " + person.ingredients;

    let viewRecipe = document.createElement("button");
    viewRecipe.className = "person-info view-recipe";
    viewRecipe.textContent = "View Recipe";
    viewRecipe.addEventListener("click", function () {
      window.location.href = person.recipeUrl;
    });

    card.appendChild(photo);
    card.appendChild(name);
    card.appendChild(type);
    card.appendChild(ingredients);
    card.appendChild(viewRecipe);

    return card;
  }

  function renderPersonList(people) {
    personList.innerHTML = "";

    for (let i = 0; i < people.length; i++) {
      let card = generatePersonCard(people[i]);
      personList.appendChild(card);
    }
  }

  renderPersonList(people);

  searchInput.addEventListener("keyup", function () {
    let searchTerm = searchInput.value.toLowerCase();
    let filteredPeople = people.filter(function (person) {
      return person.name.toLowerCase().includes(searchTerm);
    });
    renderPersonList(filteredPeople);
  });
});
