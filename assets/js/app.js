var carpeta = "";

var total_paginas = 0;
var id_video = 0;
var id_form_video = "";

$("#contact-form-acdp")
  .off("submit")
  .on("submit", async function (e) {
    e.preventDefault();
    $(".alert-success").remove();
    $(".alert-danger").remove();
    const info = {
      nombre: $("#nombre").val(),
      email: $("#email").val(),
      asunto: $("#asunto").val(),
      msj: $("#mensaje").val(),
    };
    const datos = new FormData();
    datos.append("informacion", JSON.stringify(info));

    const response = await fetch("api/contactar.php", {
      method: "POST", // *GET, POST, PUT, DELETE, etc.
      mode: "no-cors", // no-cors, *cors, same-origin
      cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
      body: datos, // body data type must match "Content-Type" header
    });

    const rest = await response.json();
    console.log(rest);
    if (rest == "enviado") {
      $("#contact-form-acdp")[0].reset();
      $("#alert-ctz").append(
        '<div class="alert alert-success text-center" role="alert">¡Su mensaje fue enviada!</div>'
      );
    } else {
      $("#alert-ctz").append(
        '<div class="alert alert-danger text-center" role="alert">¡No se pudo enviar su mensaje! Verifique que todos los campos esten correctamente llenos.</div>'
      );
    }
  });

function getVideosList(pagina, carpeta) {
  $("#videos-lista").empty();
  $("#totalPaginas").empty();
  fetch("admin/api/video.api.php?page=" + pagina + "&carpeta=" + carpeta, {
    cache: "no-cache",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((res) => res.json())
    .then((data) => {
      total_paginas = data["paginas"];
      $("#totalPaginas").append(`de ${data["paginas"]}`);

      data.videos.map((item) =>
        $("#videos-lista").append(`
        <div class="col-md-4 ">
        ${
          item.ptf == "youtube"
            ? `<iframe width="100%" height="250" src="${item.links}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`
            : `<iframe src="${item.links}" width="100%" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>`
        }
        <div class="card">
        <div class="card-header bg-secondary d-flex text-white justify-content-between">
        <span> <i class="fas fa-calendar-alt"></i> 
        ${item.created_at}</span>
        <span>
        <i class="fas fa-church"></i>
         ${item.carpeta}
        </span>
        </div>
    </div>
        </div>
        `)
      );
    });
}

getVideosList((pagina = 1), carpeta);

$(document).on(
  "click",
  "#all-list-video,#all-predica-video,#all-reunion-video,#all-mensaje-video,#all-otros-video",
  function () {
    $(
      "#all-list-video,#all-predica-video,#all-reunion-video,#all-mensaje-video,#all-otros-video"
    ).removeClass("btn-primary");
    $(
      "#all-list-video,#all-predica-video,#all-reunion-video,#all-mensaje-video,#all-otros-video"
    ).addClass("btn-secondary");
    $(this).removeClass("btn-secondary");
    $(this).addClass("btn-primary");
    carpeta = $(this).attr("value");
    getVideosList((pagina = 1), carpeta);
  }
);

$(document).on("click", "#at,#sg", function (e) {
  if (e.target.id == "at") {
    if ($("#pageVideos").val() == 1) {
      $("#at").prop("disabled", true);
      $("#sg").prop("disabled", false);
      return;
    }
  } else {
    if ($("#pageVideos").val() == total_paginas) {
      $("#at").prop("disabled", false);
      $("#sg").prop("disabled", true);
      return;
    }
  }

  num = 0;
  switch (e.target.id) {
    case "at":
      num = parseFloat($("#pageVideos").val()) - 1;
      break;
    case "sg":
      num = parseFloat($("#pageVideos").val()) + 1;
      break;
    default:
      break;
  }
  $("#pageVideos").val(num);
  const page = $("#pageVideos").val();
  getVideosList(page, carpeta);
});

$(document).ready(function () {
  $("#video-en-vivo").empty();
  fetch("admin/api/video.api.php?envivo=true", {
    method: "GET",
    cache: "no-cache",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((res) => res.json())
    .then((data) => {
      if (data) {
        $("#video-en-vivo").append(`
        ${
          data.ptf == "youtube"
            ? `<iframe width="100%" height="550px" src="${data.links}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`
            : `<iframe src="${data.links}" width="100%" height="550px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>`
        }
        <div style="background-color:#3c5b95;margin-top:-6px;">
            <h5 class="text-center text-white">${data.titulo}</h5>
        </div>
        `);
      } else {
        $("#video-en-vivo").append(`
        <div class="alert alert-secondary text-center" role="alert">
       No hay transmisión en vivo
      </div>
        `);
      }
    });
});

$(document).on("click", "#cerrar-sesion", function (e) {
  e.preventDefault();
  fetch("admin/api/usuario.api.php?sesion=cerrar", {
    method: "GET",
    cache: "no-cache",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((res) => res.json())
    .then((data) => (data === "ok" ? $(location).attr("href", "/") : ""));
});

$("#enviar-formulario").on("submit", function (e) {
  e.preventDefault();
  $("#alerta-contacto").empty();

  const datos = new FormData();
  datos.append("nombre", $("#nombre").val());
  datos.append("correo", $("#correo").val());
  datos.append("asunto", $("#asunto").val());
  datos.append("mensaje", $("#mensaje").val());
  fetch("admin/api/contacto.php", {
    method: "POST",
    body: datos,
  })
    .then((data) => data.json())
    .then((res) => {
      if (res == "ok") {
        $("#alerta-contacto").append(`
        <div class="alert alert-success" role="alert">
        Tu mensaje fue enviado exitosamente!
    </div>
        `);
      }
    })
    .catch((err) => {
      console.log(err);
      if (err) {
        $("#alerta-contacto").append(`
        <div class="alert alert-danger" role="alert">
        Tu mensaje no pudo ser enviado.
    </div>
        `);
      }
    });
});
