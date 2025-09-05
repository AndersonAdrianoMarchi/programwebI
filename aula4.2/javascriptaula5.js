function validaCadastro() {
    var usuario = document.getElementById ("campo_usuario").value;
    var senha = document.getElementById ("campo_senha").value;  

    if (usuario === "user" && senha === "pass") {
        alert ("Login Ok");
    } else {
        document.getElementById("campo_usuario").classList.add("user_pass_fail");
        document.getElementById("campo_senha").classlist.add("user_pass_fail");
    }
}