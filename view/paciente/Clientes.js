var fields = document.querySelectorAll("#cad_pacientes [name]");
var paciente = {};

document.getElementById("cad_pacientes").addEventListener("submit",function(event){
    event.preventDefault();
    fields.forEach(function(field, index){
    paciente[field.name] = field.value;
})
 console.log(paciente);

});
