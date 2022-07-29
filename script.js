// Scrolling Logic for Nav Bar
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});


// Responsive Hamburger Menu for Mobile Logic 
const hamburger = document.querySelector(".hamburger");
const navmenu = document.querySelector(".nav-menu");

  // Logic: when clicking hamburger the transition to an X in addition to the navmenu opening up occurs
hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navmenu.classList.toggle("active");
})

  // Logic: when clicking a nav-link the menu should close
document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () => {
    hamburger.classList.remove("active");
    navmenu.classList.remove("active");
  }))

let controller = new ScrollMagic.Controller();
// Chain multiple animations together
let timeline = new TimelineMax();

timeline
  .to(".bg_top", 6, { y: -400 })
  .to(".bg_mid", 6, { y: -200 }, "-=6")
  .fromTo(".bg_base", { y: -25 }, { y: 0, duration: 6 }, "-=6")
  .to(".projects", 6, { top: "0%" }, "-=6");

let scene = new ScrollMagic.Scene({
  triggerElement: "section",
  duration: "125%",
  triggerHook: 0,
})
  .setTween(timeline)
  .setPin("section")
  .addTo(controller);

document.querySelector(".card-btn").addEventListener
  ("click", () => {
  document.querySelector(".about").classList.toggle("change");
});