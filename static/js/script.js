function validarFormulario() {
    var nome = document.forms["Formfill"]["name"].value;
    var email = document.forms["Formfill"]["email"].value;
    var whatsapp = document.forms["Formfill"]["wpp"].value;
    var salario = document.forms["Formfill"]["salary"].value;

    if (nome === "" || email === "" || whatsapp === "" || salario === "") {
        alert("Por favor, preencha todos os campos obrigatórios.");
        return false;
    }

    return true;
}