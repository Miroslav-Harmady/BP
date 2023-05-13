function parseInput(id){
    var input = document.getElementById(id).value
    var result = [];
    input = input.split('\n'); // riadky rozdelene
    for(let i = 0; i < input.length; i++){
        if(input[i] == ""){
            continue;
        }
        var row = input[i].split(','); // rozdelenie na jednotlive prvky matice
        for(let j = 0; j < row.length; j++){
            row[j] = parseFloat(row[j]);
        }
        result.push(row);
    }
    return result;
}

function checkApproximation(last, next, dispersion){
    for(let i = 0; i < last.length; i++){
        if(Math.abs(next[i] - last[i]) > dispersion){
            return false
        }
    }
    return true
}

function isMatrixCorrect(a, b){
    for(let i = 0; i < a.length; i++){
        if(a.length != a[i].length){
            return false;
        }
        for(let j = 0; j < a[i].length; j++){
            if(isNaN(a[i][j])){
                return false;
            }
        }
        if(a.length != b.length){
            return false;
        }
        for(let j = 0; j < b[i].length; j++){
            if(isNaN(b[i][j])){
                return false;
            }
        }
    }
    return true;
}

function validate(a, b, dispersion){
    if(!isMatrixCorrect(a, b)){
        return "Matica je v nesprávnom tvare, prosím skontrolujte, či je matica štvrocová, prípadne či sú všetky prvky matice čísla.";
    }
    if(dispersion <= 0){
       return "Zastavovacie kritérium musí byť nezáporná hodnota";
    }
    return "";
}

function showModal(message){
    var modal = document.getElementById('errorModal');
    modal.style.opacity = 1;
    modal.style.pointerEvents = 'auto';
    let errMessage = document.getElementById("error");
    errMessage.innerText = message;
}

function hideModal(){
    var modal = document.getElementById('errorModal');
    modal.style.opacity = 0;
    modal.style.pointerEvents = 'none';
}

function createHeader(n){
    var tableHead = document.createElement("thead");
    var headRow = document.createElement("tr");
   
    var headCell = document.createElement("th");
    headCell.textContent = "i"; 
    headRow.appendChild(headCell);
    headCell.classList.add("bg-[#ff7900]", "text-white", "p-1", "border-2", "border-black");

    for(let i = 1; i <= n; i++){
        var headCell = document.createElement("th");
        headCell.textContent = "x" + i;
        headRow.appendChild(headCell);
        headCell.classList.add("bg-[#ff7900]", "text-white", "p-1", "border-2", "border-black");
    }
    tableHead.appendChild(headRow);
    return tableHead;
}

function createRow(tbody, aprox, iteration){
    var row = document.createElement("tr");
    var cell = document.createElement("td");
    cell.innerText = iteration;
    row.appendChild(cell);
    cell.classList.add("p-1", "border-2", "border-black");
    for(let j = 0; j < aprox.length; j++){
        var cell = document.createElement("td");
        cell.innerText = aprox[j];
        row.appendChild(cell);
        cell.classList.add("p-1", "border-2", "border-black");
    }
    tbody.appendChild(row);
}

function compute(){
    var table = document.getElementById("table");
    
    table.innerHTML = "";
    if((document.getElementById("inputA").value == "") || 
        (document.getElementById("inputB").value == "" || 
        document.getElementById("dispersion").value == "")){
        showModal("Nevyplnili ste všetky polia. Pre správne fungovanie kalkulačky prosím vyplňte všetky polia.");
        return;
    }
    var a = parseInput("inputA");
    var b = parseInput("inputB");
    var m = parseInt(document.getElementById("m").value);
    var dispersion = parseFloat(document.getElementById("dispersion").value);
    var r = parseInt(document.getElementById("r").value);
    var aproximation = [];
    var temp, error="";
    var tableHead = createHeader(a.length);
    var tableBody = document.createElement("tbody");
    error = validate(a, b, dispersion);
    if(error != ""){
        showModal(error);
        return;
    }
    for(let i = 0; i < a.length; i++){
        aproximation.push(0);
    }
    for(let k = 1; k < (m + 1); k++){
        var nextAprox = [];
        for(let i = 0; i < a.length; i++){
            temp = 0;
            for(let j = 0; j < a.length; j++){
                if(j == i){
                    continue;
                }
                temp = temp + (a[i][j] * aproximation[j]);
            }
            temp = (b[i][0] - temp) / (a[i][i]);
            nextAprox.push(math.round(temp, r)) 
        }
        // kontrola ci sme dosiahli hranicnu podmienku alebo nie
        if (checkApproximation(aproximation, nextAprox, dispersion)){ 
            createRow(tableBody, nextAprox, k);
            table.appendChild(tableHead);
            table.appendChild(tableBody);
            return nextAprox
        }
        createRow(tableBody, nextAprox, k);
        aproximation = nextAprox;
    }
    // createRow(tableBody, nextAprox, 10);
    table.appendChild(tableHead);
    table.appendChild(tableBody);
    return aproximation;
}