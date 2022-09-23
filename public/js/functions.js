function validarForm() {
    var form = document.novoEvento;
    var aviso = document.getElementById("messageAviso");


    if (form.txtTitulo.value == "") {
        form.txtTitulo.style.borderColor = "#FF0000";
        form.txtTitulo.value = "";
        aviso.innerHTML = "A entrada do titulo não pode ser vazia.";
        form.txtTitulo.focus();
    } else if (form.txtDescripcao.value == "") {
        form.txtDescripcao.style.borderColor = "#FF0000";
        form.txtDescripcao.value = "";
        aviso.innerHTML = "A entrada da descrição não pode ser vazia.";
        form.txtDescripcao.focus();
    } else if (form.endereco_id.value <= 0) {
        aviso.innerHTML = "Deve selecionar o código do endereço";
        form.endereco_id.style.borderColor = "#FF0000";
        form.endereco_id.value = "Selecionar o código do endereço";
        form.endereco_id.focus();
    } else if (form.txtParticipante.value <= 5) {
        aviso.innerHTML = "Precisar autorizar pelo menos 5 pessoas a participar ao evento";
        form.txtParticipante.style.borderColor = "#FF0000";
        form.txtParticipante.value = "Selecionar o código do endereço";
        form.txtParticipante.focus();
    } else if (!(form.caricatura.files && form.caricatura.files[0].type == 'image/png' ||
            form.caricatura.files[0].type == 'image/jpg' ||
            form.caricatura.files[0].type == 'image/jpeg')) {
        aviso.innerHTML = "Precisar escolher uma imagen que aceita pelo sistema";
    } else {
        form.submit();
        //alert("Submit");
    }
}