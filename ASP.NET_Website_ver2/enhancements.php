<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Introductory Home Page" />
    <meta name="keywords" content="HTML, CSS, ASP.NET" />
    <meta name="author" content="Sang Vo"  />

    <link href ="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    
    <title>ASP.NET</title>
</head>

<body>
<?php
include("header.inc")  
?>

<article> 
<section id="enhance_1">
<h1>Enhancement #1</h1>
    <br><br><br><br>
    Displayed multiple applications of pseudo-elements and classes:
    <br>
    <ul>
        <li>Usage of ::after to correct for navigation background not appearing</li>
        <li>:hover</li>
        <li>:hover::before</li>
        <li> ::before</li>
    </ul>
    <p>Used a combination of ::before and :hover pseudo-classes to create an enhanced hyperlink display in the navigation bar. In addition, applied a transition & google icons to this element.</p>
    <p>Overall, the navigation bar & footer received higher visual clarity on each hyperlinks path and contrast with background.
    Using before and after hover pseudo class in combination with transition function to create more clarity for users when hovering over the navigation bar (header) or footer of the webpage.</p>
    <p>Source used to create the navigation bar & footer: <a href="https://youtu.be/FEmysQARWFU">Youtube Link</a></p>
</section>

<section id="enhance_2">
<h1>Enhancement #2</h1>
    <br><br><br>
    <p>Application of image maps to make more engaging content for user by integrating hypertexted images, alt-text, figure captions and logos. Image maps were used to show ASP.NET capability with different operating systems (macOS, Windows and Linux) on index.html & topic.html.</p>
    <p>Done by first making the image transparent via photoshop (allows for integration with webpage’s existing background colour). Used the map function, location coordinates of each section and shape. Allows for multiple alt text and links to be implemented one image.</p>
    <p>Sourced used to create image maps: <a href="https://www.image-map.net">Image Map</a></p>
</section>
</article>

<?php
include("footer.inc")  
?>

</body>
</html>