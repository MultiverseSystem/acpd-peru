$(document).on("submit", "#inicio-sesion-admin", function (e) {
  e.preventDefault();

  const datos = {
    correo: $("#correo-admin").val(),
    pass: $("#password-admin").val(),
  };

  fetch("api/usuario.api.php", {
    method: "POST",
    cache: "no-cache",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(datos),
  })
    .then((res) => res.json())
    .then((data) =>
      data === "ok" ? $(location).attr("href", "/acpd-peru/admin") : ""
    );
});

$(document).on("click", "#cerrar-sesion", function (e) {
  e.preventDefault();
  fetch("api/usuario.api.php?sesion=cerrar", {
    method: "GET",
    cache: "no-cache",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((res) => res.json())
    .then((data) => (data === "ok" ? $(location).attr("href", "/") : ""));
});
