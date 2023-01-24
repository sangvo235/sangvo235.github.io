/* author: Sang Vo
created: 22/07/22
last modified: 11/12/22
description: JavaScript file for index.html */

// Project Array List
let projects = [ 
{
  name: "Bus Replacement Mobile App",
  image: "images/bus_app.gif",
  tech1: "images/nothing.png", 
  tech2: "images/react_logo.svg", 
  tech3: "images/tailwind_logo.svg",
  tech4: "images/firebase_logo.svg",
  tech5: "images/figma_logo.svg", 
  tech6: "images/nothing.png",
  description: "Mobile app that digitalises the daily tasks of bus replacement ground staff by retrieving real-time data. \
  Built with React Native, Tailwind, Google Firebase/API and hosted on Expo.",
  link: "https://github.com/sangvo235/Melbourne_Transit",
  github: "https://github.com/sangvo235/Melbourne_Transit"
},
{
  name: "Interactive Quiz Platform",
  image: "images/quiz_platform.png",
  tech1: "images/html_logo.svg", 
  tech2: "images/css_logo.svg",
  tech3: "images/js_logo.svg",
  tech4: "images/bootstrap_logo.svg",
  tech5: "images/django_logo.svg",
  tech6: "images/figma_logo.svg", 
  description: "A full-stack quiz platform/application aimed at increasing gamification. \
  Incorporated agile methodologies (eg. sprint cycles) and key frameworks such as Bootstrap and Django.",
  link: "https://github.com/JATTYz/Quiz-Application-Django-Project",
  github: "https://github.com/JATTYz/Quiz-Application-Django-Project"
},
{
  name: "Portfolio Website",
  image: "images/portfolio_website.png",
  tech1: "images/nothing.png",
  tech2: "images/html_logo.svg", 
  tech3: "images/css_logo.svg",
  tech4: "images/js_logo.svg",
  tech5: "images/git_logo.svg",
  tech6: "images/nothing.png", 
  description: "Portfolio website demonstrating comprehension on front-end web development. \
  Includes parallax scrolling, hamburger menu and dynamic cross device compatibility. \
  Built with pure HTML/CSS/JS.", 
  link: "https://sangvo235.github.io",
  github: "https://github.com/sangvo235/sangvo235.github.io"
},
{
  name: "Java GUI Parking Slot System",
  image: "images/parking_system.png",
  tech1: "images/nothing.png",
  tech2: "images/nothing.png", 
  tech3: "images/java_logo.svg",
  tech4: "images/bluej_logo.png",
  tech5: "images/nothing.png",
  tech6: "images/nothing.png", 
  description: "A parking slot system transformed from console (text-based) to GUI through implementing Java Swing. \
  Enabling users to search, display parking time, add or delete parking slots/cars.",
  link: "https://github.com/sangvo235/Parking_Slot_System_GUI",
  github: "https://github.com/sangvo235/Parking_Slot_System_GUI"
}
]

// creating project div
var projectDiv = document.getElementById("projects");

for (const project of projects){

  // wrapper div - card
  var pcard = document.createElement("div");
  pcard.className = "pcard";
  pcard.setAttribute("data-aos", "fade-down-right");
  pcard.setAttribute("data-aos-offset", "175");
  pcard.setAttribute("data-aos-delay", "50");
  pcard.setAttribute("data-aos-duration", "1000");
  pcard.setAttribute("data-aos-easing", "ease-in-out-sine");

  // project titles
  var title = document.createElement("h2");
  title.textContent = project["name"];

  // project images
  var image = document.createElement("img");
  image.src = project["image"];

  // project tech wrapper
  var projectTech = document.createElement("div");
  projectTech.className = "cardProjectTech";

  // project tech
  var tech1 = document.createElement("img");
  tech1.src = project["tech1"];
  var tech2 = document.createElement("img");
  tech2.src = project["tech2"];
  var tech3 = document.createElement("img");
  tech3.src = project["tech3"];
  var tech4 = document.createElement("img");
  tech4.src = project["tech4"];
  var tech5 = document.createElement("img");
  tech5.src = project["tech5"];
  var tech6 = document.createElement("img");
  tech6.src = project["tech6"];

  // project desciption wrapper
  var descriptionBox = document.createElement("div");
  descriptionBox.className = "cardDescriptionBox";

  // project description
  var description = document.createElement("p");
  description.textContent = project["description"];

  // project link wrapper
  var linkWrapper = document.createElement("div");
  linkWrapper.className = "cardLinkWrapper";

  // project link
  var link = document.createElement("a");
  link.setAttribute("target", "_blank");
  link.href = project["link"];
  link.className = "fas fa-link";
  
  var linkName = document.createElement("h3");
  linkName.textContent = "Demo";

  // project github
  var github = document.createElement("a");
  github.setAttribute("target", "_blank");
  github.href = project["github"];
  github.className = "fab fa-github";
  github.classList.add("cardLink");

  var githubName = document.createElement("h3");
  githubName.textContent = "Github";
  
  // Appending individual components  
  projectTech.appendChild(tech1);
  projectTech.appendChild(tech2);
  projectTech.appendChild(tech3);
  projectTech.appendChild(tech4);
  projectTech.appendChild(tech5);
  projectTech.appendChild(tech6);
  descriptionBox.appendChild(description);
  link.appendChild(linkName);
  github.appendChild(githubName);
  linkWrapper.appendChild(link);
  linkWrapper.appendChild(github);

  // Appending card components 
  pcard.appendChild(title);
  pcard.appendChild(image);
  pcard.appendChild(projectTech);
  pcard.appendChild(descriptionBox);
  pcard.appendChild(linkWrapper);

  // Appending card to project div
  projectDiv.appendChild(pcard)

} 

// Experience Array List
let experience = [
{
  expImage: "images/swinburne_logo.jpg",
  company: "Swinburne University",
  role: "Master of Information Technology, Software Development",
  date: "Feb 2022 - Nov 2023 (Expected Graduation)",
  description: "Grade: 4.0 GPA | 85.625 WAM"
},
{ 
  expImage: "images/deloitte_logo.jpg",
  company: "Deloitte",
  role: "Digital & Technology Risk Intern",
  date: "Nov 2022 - Current",
  description: "- Scrum implementation, control testing and analysing cloud risk."
},
{
  expImage: "images/datacom_logo.png",
  company: "Datacom",
  role: "Service Desk Analyst",
  date: "Feb 2022 - Aug 2022",
  description: "- Managing IT incidents and service request to provide technical support for end users."
},
{
  expImage: "images/monash_logo.jpg",
  company: "Monash University",
  role: "Bachelor of Commerce, Finance & Actuarial Studies",
  date: "Feb 2017 - Nov 2021",
  description: "Grade: Distinction"
}]

// creating experience div
var experienceDiv = document.getElementById("experience");

for (const exp of experience) {

  // experience wrapper div
  var expCard = document.createElement("div");
  expCard.className = "expCard";
  expCard.setAttribute("data-aos", "fade-down-right");
  expCard.setAttribute("data-aos-offset", "175");
  expCard.setAttribute("data-aos-delay", "50");
  expCard.setAttribute("data-aos-duration", "1000");
  expCard.setAttribute("data-aos-easing", "ease-in-out-sine");

  // experience image 
  var expImg = document.createElement("img");
  expImg.src = exp["expImage"];
  expImg.className = "expCardImg";

  // experience desciption wrapper
  var experienceBox = document.createElement("div");
  experienceBox.className = "cardExperienceBox";

  // experience company
  var company = document.createElement("h2");
  company.textContent = exp["company"];

  // experience role
  var role = document.createElement("h3");
  role.textContent = exp["role"];

  // experience date
  var date = document.createElement("p");
  date.textContent = exp["date"];

  // experience description
  var description = document.createElement("p");
  description.textContent = exp["description"];
  
  // Appending experience description wrapper children
  experienceBox.appendChild(company);
  experienceBox.appendChild(role);
  experienceBox.appendChild(date);
  experienceBox.appendChild(description);

  // Appending experience card components 
  expCard.appendChild(expImg);
  expCard.appendChild(experienceBox);

  // Appending card to project div
  experienceDiv.appendChild(expCard)

}

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

