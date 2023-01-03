<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <title>CodeIgniter Tutorial</title>
  <style>
/* Base reset */
* {
  margin: 0;
  padding: 0;
}

/* box-sizing and font sizing */
*,
*::before,
*::after {
  box-sizing: inherit;
}

@media (max-width: 28.75em) {
  html {
    font-size: 55%;
  }
}
#navbar {
  top: 0;
  left: 0;
  justify-content: flex-end;
  position: fixed;
  background-color: black;
  width: 100%;
  display: flex;
  z-index: 10;
}

a {
  text-decoration: none;
}


#list {
  display: flex;
  margin-right: 2rem;
  list-style: none;
}

li {
  display: list-item;
}

.nav-link:hover {
  background-color: red;
}

.nav-link {
  display: block;
  color: white;
  padding: 2rem;
  text-decoration: none;
}

footer {
  font-weight: 300;
  display: flex;
  justify-content: space-evenly;
  padding: 2rem;
  background: black;
  color: white;
}
    </style>
</head>
<body>
        <nav id="navbar">
          <ul id="list">
            <li>
            <a href="#welcome-section" class="nav-link">Home</a>
            </li>
            <li>
            <a href="#projects" class="nav-link">Add Client</a>
            </li>
            <li>
            <a href="#contacts" class="nav-link">Contacts</a>
            </li>
          </ul>
        </nav>