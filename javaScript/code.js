function numberGenerator(){
    var select = document.getElementById('nbTable');
    for (var i = 1; i < 3; i++){
    select.options[select.options.length] = new Option(i+1, i);
    console.log(select.options[i]); 
  }
}
onload= numberGenerator(); 
function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}  

function selectItemV1(){
    var selecto = document.getElementById('nbTable');
    var value = selecto.options[selecto.selectedIndex].value;
    var elementGoAfter = document.getElementById("beforTitle");  
    for(var i = value ; i > 0 ; i--){
        var temp = document.createElement("p");
        temp.innerHTML="blabla";    
        insertAfter(elementGoAfter,temp);    
    }
}



function selectItem(){
    var selecto = document.getElementById('nbTable');
    var value = selecto.options[selecto.selectedIndex].value;
    var divForm = document.getElementById('divForm');
    var stat = ["A_FAIRE", "EN_COURS", "TERMINE"];
    divForm.innerHTML=''; 
    for(var i = 0 ; i <= value; i++){
        //tu dois avoir name dans l'input de chaque statut
        divForm.innerHTML += `<div class="form-group"> <label for="title${i + 1}">Statut${i + 1}</label><select class="form-control" id="status${i + 1}"  "><option value="${stat[i]}">${stat[i]}</option></div>`;    
    }
}
selectItem(); 




