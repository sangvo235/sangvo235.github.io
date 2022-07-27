window.onload = () => {
// Project section variables
const projects = {};

// Quiz Platform 
projects["quiz-platform"] = {
  name: "Interactive Quiz Platform",
  image: "night_star.jpg",
  description: "An interactive quiz platform built via HTML, Bootstrap CSS, JS & Django.",
  demo: "https://github.com/sangvo235/sangvo235.github.io",
  gitlink: "https://github.com/sangvo235/sangvo235.github.io"
};

// Project Section Logic 
var projectsDiv = document.getElementById("projects");

for (var key of Object.key(projects)) {
  var project = projects[key];

  // Element creation
  var box = document.createElement("div");
  box.className = "box";

  var name = document.createElement("h2");
  name.textContent = project["name"];

  var image = document.createElement("img");
  image.src = project["image"]

  var descriptionBox = document.createElement("div");
  descriptionBox.className = "box-db"

  var description = document.createElement("p");
  description.textContent = project["description"];

  var demo = document.createElement("a");
  demo.href = project["demo"];
  demo.setAttribute("target", "_blank");
  demo.className = "fa-solid fa-laptop-code";
  demo.classList.add("boxLink");

  var gitLink = document.createElement("a");
  gitLink.href = project["gitlink"];
  gitLink.setAttribute("target", "_blank");
  gitLink.className = "fab fa-github";
  gitLink.classList.add("boxLink");

  descriptionBox.appendChild(description);
  descriptionBox.appendChild(demo);
  descriptionBox.appendChild(getLink);

  box.appendChild(name);
  box.appendChild(image);
  box.appendChild(descriptionBox);

  projectsDiv.appendChild(box);

}
}