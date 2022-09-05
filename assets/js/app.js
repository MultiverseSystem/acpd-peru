// $(document).ready(function () {
//   $(".select-servicios").select2();
// });


$("#contact-form-acdp")
  .off("submit")
  .on("submit", async function (e) {
    e.preventDefault();
    $(".alert-success").remove()
    $(".alert-danger").remove()
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
    }else{
        $("#alert-ctz").append(
            '<div class="alert alert-danger text-center" role="alert">¡No se pudo enviar su mensaje! Verifique que todos los campos esten correctamente llenos.</div>'
          );
        
    }
  });
