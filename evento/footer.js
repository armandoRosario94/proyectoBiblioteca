$(document).ready(function() {

  var body = document.getElementsByTagName("body");
  var contenedorFooter = document.createElement("div")
  contenedorFooter.classList.add('contenedorFooter');
  var container = document.createElement('div');
  container.classList.add("container");
  var footer = document.createElement('div');
  footer.classList.add("footer");
  footer.innerHTML = "Todos los derechos reservados &copy UMAR 2017";
  body[0].appendChild(contenedorFooter);
  contenedorFooter.appendChild(container);
  container.appendChild(footer);
});
