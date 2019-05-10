var Resultados = Resultados || {},
    console = console || {},
    Tabla = Tabla|| {},
    document = document || {};

Tabla.contenedor = "";
Tabla.lenguajes = [{lenguaje: "C", cantidad:0}];
Tabla.totalEncuestados = 0;

Tabla.onLoadWindow = function (contenedor) {
  Tabla.contenedor = contenedor;
  window.addEventListener("DOMContentLoaded", function () {
    if (typeof Tabla.contenedor === "string") {
      Tabla.contenedor = document.getElementById(Tabla.contenedor);
    var section = document.createElement("section");
    section.id = "Resultados-encuesta";
    Tabla.contenedor.appendChild(section);

    Tabla.generar();
    console.log(Resultados);
    }
  });


Tabla.generar = function(){
  Tabla.totalEncuestados = Resultados.length;

  if(Tabla.totalEncuestados > 0){

    Tabla.cargarLenguajes();
    Tabla.generarGraficos();

  }else{
    let p = document.createElement("p");
    p.innerHTML = "Aun no hay datos sobre la encuesta realizada." ;
    Tabla.contenedor.appendChild(p);
  }

}
}

Tabla.cargarLenguajes = function(){



  Resultados.forEach(r => {
    var esta = false;
    Tabla.lenguajes.forEach( l => {
      if(l.lenguaje == r.lenguaje){
        l.cantidad++;
        esta = true;
      }
    })
    if(!esta){
      Tabla.lenguajes.push({lenguaje: r.lenguaje,cantidad:1});
    }
  });
}

Tabla.generarGraficos = function(){

  var figure,div ,section;

  section = document.querySelector("#Resultados-encuesta");

  div = document.createElement("div");
  div.id = "graficos";
  Tabla.lenguajes.forEach( l => {
    figure = document.createElement("figure");
    figure.classList.add("torre");

    let porcentaje = ((l.cantidad/Tabla.totalEncuestados) * 100).toFixed(0)  + "%";

    figure.style.transition = "background-size 5s ease-in 3s";
    figure.style.backgroundSize = "80% "+ porcentaje;
    figure.innerHTML =  l.lenguaje + " "+ porcentaje;
    div.appendChild(figure);
  });

  section.appendChild(div);

}
