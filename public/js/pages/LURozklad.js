function initializeMatrix(n){
    var a = [];
    for(let i = 0; i < n; i++){
        temp = [];
        for(let j = 0; j < n; j++){
            temp.push(0.0);
        }
        a.push(temp);
    }
    return a;
}

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

function computeY(n, l, b, r){ 
    y = [];
    for(let i = 0; i < n; i++){
        y.push([0.0]); 
    }
    for(let i = 0; i < n; i++){
        var temp = 0;
        for(let j = 0;j < i; j++){
            temp += math.round(l[i][j] * y[j][0], r);
        }
        y[i][0] = math.round((b[i][0] - temp) / l[i][i], r)
    }
    return y
}

function computeX(n, u, y, r){
    x = [];
    for(let i = 0; i < n; i++){
        x.push([0.0]);
    }
    for(let i = n - 1; i >= 0 ; i--){
        var temp = 0;
        for(let j = n - 1;j > i; j--){
            temp += math.round(u[i][j] * x[j][0], r);
        }
        x[i][0] = math.round((y[i][0] - temp) / u[i][i], r)
    }
    return x
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

function validate(a, b){
    if(!isMatrixCorrect(a, b)){
        var error = "Matica je v nesprávnom tvare, prosím skontrolujte, či je matica štvrocová, prípadne či sú všetky prvky matice čísla.";
        return error;
    }
    return "";
}

//zobrazi modal s chybovou hlaskou
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

function toLatex(char, a){
    var result = "\\(" + char + "= " +  "\\begin{pmatrix}";
    for(let i = 0; i < a.length; i++){
        for(let j = 0; j < a[0].length; j++){
            result += a[i][j];
            if(j < a.length - 1){
                result += "&";
            } 
        }
        if(i < a.length - 1){
            result = result + "\\" + "\\";
        }
    }
    result += "\\end{pmatrix}\\)";
    return result;
}

function printLatex(spanId,char,  a){
    var span = document.getElementById(spanId);
    span.innerHTML = toLatex(char, a);
    MathJax.Hub.Queue(["Typeset", MathJax.Hub, span]);
}

function printResult(l, u, x, y){
    printLatex("resultL", "L", l);
    printLatex("resultU", "U", u);
    printLatex("resultY", "y", y);
    printLatex("resultX", "x", x);
}

function compute(){
    var error = "";
    if((document.getElementById("inputA").value == "") || 
        (document.getElementById("inputB").value == "")){
        showModal("Nevyplnili ste všetky polia. Pre správne fungovanie kalkulačky prosím vyplňte všetky polia.");
        return;
    }
    var a = parseInput("inputA");
    var b = parseInput("inputB");
    error = validate(a, b);
    if(error != ""){
        showModal(error);
        return;
    }

    var u = initializeMatrix(a.length);
    var l = initializeMatrix(a.length);
    var r = parseInt(document.getElementById("r").value); 

    for(let k = 0; k < a.length; k++){
        u[k][k] = math.round(a[k][k], r);

        for(let i = k; i < a.length; i++){
            l[i][k] = math.round(a[i][k] / u[k][k], r);
            u[k][i] = math.round(a[k][i], r);
        }

        for(let i = k + 1; i < a.length; i++){
            for(let j = k+1; j < a.length; j++){
                a[i][j] = math.round(a[i][j] - l[i][k] * u[k][j], r)
            }
        }   
    }
    var y = computeY(a.length, l, b, r);
    var x = computeX(a.length, u, y, r);
    printResult(l, u, x, y);
}