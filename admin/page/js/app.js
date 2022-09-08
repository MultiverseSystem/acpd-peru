var total_paginas = 0;
var id_video = 0;
var id_form_video = "";

$(document).on("submit", "#agregar-video", function (e) {
  e.preventDefault();
  e.stopPropagation();

  $("#alerta-video").empty();
  if (
    $("#link").val() != "" &&
    $("#ptf").val() != "" &&
    $("#carpeta").val() != ""
  ) {
    if (
      $("#link").val().indexOf("youtube") > -1 &&
      $("#ptf").val() == "facebook"
    ) {
      $("#alerta-video").append(`
        <div class="alert alert-danger m-2 text-center" role="alert">
       El Link no coincide con la plataforma seleccionada!
    </div>
        `);
      return;
    }

    if (
      $("#link").val().indexOf("facebook") > -1 &&
      $("#ptf").val() == "youtube"
    ) {
      $("#alerta-video").append(`
        <div class="alert alert-danger m-2 text-center" role="alert">
       El Link no coincide con la plataforma seleccionada!
    </div>
        `);
      return;
    }

    const datos = {
      link: $("#link").val(),
      plataforma: $("#ptf").val(),
      titulo: $("#tt").val(),
      descripcion: $("#dct").val(),
      carpeta: $("#carpeta").val(),
      live: $("#envivo").is(":checked"),
    };

    const data = new FormData();
    data.append("data", JSON.stringify(datos));
    $.ajax({
      url: "api/video.api.php",
      method: "POST",
      data: data,
      async: true,
      dataType: "json",
      timeout: 500,
      cache: false,
      processData: false,
      contentType: false,
      success: function (res) {
        if (res == "ok") {
          $("#agregar-video")[0].reset();
          $("#agregarvideo").modal("hide");
          getVideosList($("#pageVideos").val());
          $("#alerta-video").empty();
        }
      },
    });
  } else {
    $("#alerta-video").append(`
    <div class="alert alert-danger m-2 text-center" role="alert">
   El campo Link, Carpeta y Plataforma son obligatorios!
</div>
    `);
  }
});

function getVideosList(pagina) {
  $("#videoList").empty();
  $("#totalPaginas").empty();
  fetch("api/video.api.php?page=" + pagina + "&carpeta=", {
    method: "GET",
    cache: "no-cache",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((res) => res.json())
    .then((data) => {
      total_paginas = data["paginas"];
      $("#totalPaginas").append(`de ${data["paginas"]}`);

      if (data["videos"].length == 0) {
        $("#videoList").append(`
            <tr>
            <td colspan="6">Aun no tienes videos registrados</td>
            </tr>
        `);
      } else {
        data["videos"].map((item) =>
          $("#videoList").append(`
         <tr>
         <td>${item.id}</td>
         <td>${item.links.substr(0, 50)}...</td>
         <td>${item.titulo}</td>
         <td>${item.ptf}</td>
         <td>${item.carpeta}</td>
         <td>${item.created_at}</td>
         <td>${
           item.live == 1
             ? `<span class="badge text-bg-danger">En Vivo</span>`
             : `<span class="badge text-bg-secondary">Video</span>`
         }</td>p

         <td>
         <button class="btn btn-primary btn-sm editar-id-video" value="${
           item.id
         }" data-bs-toggle="modal" data-bs-target="#editar-video-${
            item.id
          }">Editar</button>

         <!-- Modal -->
         <div class="modal fade" id="editar-video-${
           item.id
         }" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
           <div class="modal-dialog">
           <form id="editar-video-put-${item.id}" value="${item.id}">
             <div class="modal-content">
               <div class="modal-header bg-secondary text-white">
                 <h5 class="modal-title" id="staticBackdropLabel">Editar: ${
                   item.id + " - " + item.titulo
                 }</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
              
               <label for="link-edit">Link (URL)</label>
               <input type="text" name="link-edit" id="link-edit" value="${
                 item.links
               }" class="form-control mb-2">
              
               <label for="ptf-edit">Plataforma</label>
               <select name="ptf-edit" id="ptf-edit" class="form-control mb-2">
                   <option value="">-- Seleccione la plataforma --</option>
                   <option value="facebook"  ${
                     item.ptf == "facebook" ? "selected" : ""
                   } >Facebook</option>
                   <option value="youtube"  ${
                     item.ptf == "youtube" ? "selected" : ""
                   } >Youtube</option>
               </select>

               <label for="carpeta-edit">Carpeta</label>
               <select name="carpeta-edit" id="carpeta-edit" class="form-control mb-2">
                   <option value="">-- Seleccione la carpeta --</option>
                   <option value="Prédica" ${
                     item.carpeta == "Prédica" ? "selected" : ""
                   }>Prédica</option>
                   <option value="Reunión"  ${
                     item.carpeta == "Reunión" ? "selected" : ""
                   }>Reunión</option>
                   <option value="Mensaje" ${
                     item.carpeta == "Mensaje" ? "selected" : ""
                   }>Mensaje</option>
                   <option value="Otros" ${
                     item.carpeta == "Otros" ? "selected" : ""
                   }>Otros</option>
               </select>

               <label for="tt-edit">Titulo (Opcional)</label>
               <input type="text" name="tt-edit" id="tt-edit" value="${
                 item.titulo
               }" class="form-control mb-2">
              
               <label for="dct-edit">Descripción (Opcional)</label>
               <input type="text" name="dct-edit" id="dct-edit" value="${
                 item.dct
               }" class="form-control mb-2">

               <div class="form-check">
                   <input class="form-check-input" name="envivo-edit" type="checkbox" id="envivo-edit" ${
                     item.live && "checked"
                   }>
                   <label class="form-check-label" for="envivo-edit">
                       VIDEO TRANSMITIDO EN VIVO
                   </label>
               </div>
              
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <button type="submit" class="btn btn-primary">Editar Video</button>
               </div>
               <div id="alerta-video-edit-${item.id}">

               </div>
             </div>
             </form>
             </div>
         </div>
         <button class="btn btn-danger btn-sm eliminar-video" value="${
           item.id
         }">Eliminar</button>
         </td>
         </tr>
         `)
        );
      }
    });
}

getVideosList((page = 1));

$(document).on("click", ".eliminar-video", function () {
  fetch("api/video.api.php", {
    method: "DELETE",
    cache: "no-cache",
    body: JSON.stringify($(this).attr("value")),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((res) => res.json())
    .then((data) => {
      getVideosList($("#pageVideos").val());
    });
});

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
  getVideosList(page);
});

$(document).on("click", ".editar-id-video", function () {
  id_video = $(this).attr("value");
  id_form_video = "#editar-video-put-" + id_video;
});

$(document).on("submit", id_form_video, function (e) {
  e.preventDefault();

  if (
    $(id_form_video).serializeArray()[0].value.indexOf("youtube") > -1 &&
    $(id_form_video).serializeArray()[1].value == "facebook"
  ) {
    $("#alerta-video-edit-" + id_video).append(`
      <div class="alert alert-danger m-2 text-center" role="alert">
     El Link no coincide con la plataforma seleccionada!
  </div>
      `);
    return;
  }

  if (
    $(id_form_video).serializeArray()[0].value.indexOf("facebook") > -1 &&
    $(id_form_video).serializeArray()[1].value == "youtube"
  ) {
    $("#alerta-video-edit-" + id_video).append(`
      <div class="alert alert-danger m-2 text-center" role="alert">
     El Link no coincide con la plataforma seleccionada!
  </div>
      `);
    return;
  }

  const id = $(id_form_video).attr("value");

  const test = [];

  const datos = $(id_form_video).serializeArray();

  datos.forEach((element) => {
    switch (element.name) {
      case "link-edit":
        test.push({ link: element.value });
        break;
      case "ptf-edit":
        test.push({ plataforma: element.value });
        break;
      case "tt-edit":
        test.push({ titulo: element.value });
        break;
      case "dct-edit":
        test.push({ descripcion: element.value });
        break;
      case "carpeta-edit":
        test.push({ carpeta: element.value });
        break;
      case "envivo-edit":
        test.push({ live: element.value == "on" ? true : false });
        break;
      default:
        break;
    }
  });

  fetch("api/video.api.php/?" + id, {
    method: "PUT",
    cache: "no-cache",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(test),
  })
    .then((res) => res.json())
    .then((datos) => {
      if (datos === "ok") {
        $(id_form_video)[0].reset();
        $("#editar-video-" + id_video).modal("hide");
        getVideosList($("#pageVideos").val());
      }
    });
});
