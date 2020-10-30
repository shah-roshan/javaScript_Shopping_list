/**
 * This is the shop.js file that has different event handlers to add content from the database when the page loads
 * and fetches a json response and decodes it.
 * By Roshan Shah,000793559
 * date:2nd November,2019
 */

/**
 * this event listener waits for the full page to finish loading before loading the other event listeners
 */
window.addEventListener("load", function () {

  /**
   * this event listener track any clicks made by the user
   */
  window.addEventListener("click", function (event) {

    if (event.target.classList.contains('deleteButton')) {

      /**
       * This is the fetch method that sends a get request to delete.php and decodes the json response
       */
      fetch("php/delete.php?id=" + event.target.id, {
          credentials: "include"
        })
        .then(response => response.json())
        .then(success);



    }
    if (event.target.classList.contains('done')) {
      /**
       * This is the fetch method that sends a get request to done.php and decodes the json response
       */
      fetch("php/done.php?id=" + event.target.id, {
          credentials: "include"
        })
        .then(response => response.json())
        .then(success);
    }

  });

  /**
   * This method triggers the add button function when enter key is pressed and item name is not null..
   */
  window.addEventListener("keydown", function (event) {
    if (this.document.getElementById("item").value != "") {
      if (event.keyCode === 13) {
        this.document.getElementById("addButton").click();

      }
    }

  });

  /**
   * This is the fetch method that sends a get request to getList.php and decodes the json response
   */
  fetch("php/getList.php", {
      credentials: "include"
    })
    .then(response => response.json())
    .then(success);

  /**
   * This function recieves the json response and changes the DOM elements to get the desired ouput
   * It sorts the array based on completion and all completed tasks go at the bottom
   * @param {is the json response } list 
   */
  function success(list) {
    x = list
    let target = document.getElementById("target");
    target.innerHTML = "";

    for (let i = 0; i < list.length; i++) {
      //creating a new element using document.create method
      let done = document.createElement('input');
      done.type = "checkbox";
      done.name = "done";
      done.value = "value";
      done.id = list[i].id;
      done.className = "done";


      if (list[i].done == 1) {
        done.defaultChecked = true;



        console.log("checked");
      }




      target.appendChild(done);
      let button = "<button class=deleteButton id=" + list[i].id + ">Delete</button>";
      target.innerHTML += button + list[i].item + "(" + list[i].quantity + ")" + "<br>";


    }






    document.getElementById("item").value = "";
    document.getElementById("quantity").value = 1;

  }


  /**
   * this function conatins the code for the add button
   * It sends a post request and calls the success function and updates the results
   */
  document.getElementById("addButton").addEventListener("click", function () {
    let quantity = document.getElementById("quantity").value;
    let item = document.getElementById("item").value;

    let params = "quantity=" + quantity + "&item=" + item;
    /**
     * This is the fetch method that sends a post request to addItem.php and decodes the json response
     */
    fetch("php/addItem.php", {
        method: 'POST',
        credentials: 'include',
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: params

      })
      .then(response => response.json())
      .then(success);

  });
  let item = document.getElementById("item");
  if (item.value == "") {
    item.style.borderColor = "red";

  }
  /**
   * this is the event listener function for the item . It validates  value and turns green if not null  otherwise appllies
   * a red border around the textbox 
   */
  item.addEventListener("input", function () {
    if (item.value != "") {
      item.style.borderColor = "green";

    } else {
      item.style.borderColor = "red";

    }

  });
  let quantity = this.document.getElementById("quantity");
  /**
   * this is the event listener function for the quantity . It validates for positive int value and turns green if so otherwise appllies
   * a red border around the textbox 
   */
  quantity.addEventListener("input", function () {
    if (quantity.value < 0 || quantity.value == "") {
      quantity.style.borderColor = "red";
    } else {
      quantity.style.borderColor = "green";
    }
  });


});