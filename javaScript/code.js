function numberGenerator(){
    var select = document.getElementById('nbTable');
    for (var i = 2; i <= 3; i++){
    select.options[select.options.length] = new Option(i, i);
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
    for(var i = 0 ; i < value; i++){
        divForm.innerHTML += `<div class="form-group"> <label for="status${i + 1}">Statut${i + 1}</label><select class="form-control" id="status${i + 1}" name="Statut${i + 1}"></select></div>`;    
        var status = `status${i + 1}`;
        for(var j = 0; j < stat.length; j++){
            var statusopt = `Statut${j+1}`; 
            insertOptions(status, stat[j], statusopt);
        }

    }
    
}
selectItem();

function insertOptions(object1, object2, opj3){
    var selectStaus = document.getElementById(object1);
    var opt = new Option(object2, object2); 
    opt.setAttribute("name", opj3); 
    selectStaus.options[selectStaus.options.length] = opt; 
}




