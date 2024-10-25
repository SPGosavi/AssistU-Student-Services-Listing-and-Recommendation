var imageUrls = [
    "../laundry.webp",
    "../medical.webp",
    "../pg.webp",
    "../food.webp"
];
var currentIndex = 0;
let bararr = ["bar1", "bar2", "bar3", "bar4"];

function changeImage() {
    document.getElementById("bgimg").src = imageUrls[currentIndex];
    currentIndex = (currentIndex + 1) % imageUrls.length;
}

let newindex=0;
function fillBarsSequentially() {
  var innerBars = document.querySelectorAll(".sbars");


  innerBars.forEach(function(bar, index) {
    setTimeout(function() {

      bar.style.height = "0";
      setTimeout(function() {
        bar.style.transition = "height 3s ease";
        bar.style.height = "65px";
        
        if (index === innerBars.length - 1) {
          setTimeout(resetBars, 3000);
        }
      }, 0);
    }, index * 3000);
  });
}

function resetBars() {
  var innerBars = document.querySelectorAll(".sbars");
  innerBars.forEach(function(bar) {
    bar.style.transition="none";
    bar.style.height = "0";
  });
  
  fillBarsSequentially();
}


fillBarsSequentially();

changeImage();
setInterval(changeImage, 3000);

function redirectToCategory(category) {
  window.location.href = "/category1.php?category=" + category;
}

var searchInput1 = document.querySelector(".search-input1");
var dropdownMenu1 = document.querySelector("#dropdown-menu1");

// Add a click event listener to the search input
searchInput1.addEventListener("click", function(event) {
    // Toggle the visibility of the dropdown menu
    dropdownMenu1.classList.toggle("show");
    event.stopPropagation(); // Prevent the event from propagating to the window
});

// Close the dropdown menu if the user clicks outside of it
window.addEventListener("click", function(event) {
    if (!event.target.matches('.search-input1')) {
        // If the click was not inside the search input, close the dropdown menu
        dropdownMenu1.classList.remove("show");
    }
});


// Get the search input and the dropdown menu
var searchInput2 = document.querySelector(".search-input2");
var dropdownMenu2 = document.querySelector("#dropdown-menu2");

// Add a click event listener to the search input
searchInput2.addEventListener("click", function(event) {
    // Toggle the visibility of the dropdown menu
    dropdownMenu2.classList.toggle("show");
    event.stopPropagation(); // Prevent the event from propagating to the window
});

// Close the dropdown menu if the user clicks outside of it
window.addEventListener("click", function(event) {
    if (!event.target.matches('.search-input2')) {
        // If the click was not inside the search input, close the dropdown menu
        dropdownMenu2.classList.remove("show");
    }
});

document.querySelector('.prof').addEventListener('click', function() {
    var popup = document.getElementById('popup');
    popup.style.display = popup.style.display === 'none' ? 'block' : 'none';
});

