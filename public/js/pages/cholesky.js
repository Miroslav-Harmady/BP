//nainicializovanie matice nulami
function initializeL(n){
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

//konvertovanie vstupu na pole
function parseInput(id){
    var input = document.getElementById(id).value
    var result = [];
    input = input.split('\n'); 
    for(let i = 0; i < input.length; i++){
        if(input[i] == ""){
            continue;
        }
        var row = input[i].split(','); 
        for(let j = 0; j < row.length; j++){
            row[j] = parseFloat(row[j]);
        }
        result.push(row);
    }
    return result;
}

function sum1(l,i){
    var result = 0;
    for(let k = 0; k < i; k++){
        result += math.pow(l[i][k], 2);
    }
    return result;
}

function sum2(l,j,i){
    var result = 0;
    for(let k = 0; k < j - 1; k++){
        result += (l[j][k] * l[i][k]);
    }
    return result;
}

function sum3(n,l){
    var result = 0;
    for(let k = 0; k < n; k++){
        result += math.pow(l[n - 1][k], 2);
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

function transposeL(l){
    var lt = [];
    for(let i = 0; i < l.length; i++){
        lt.push([]);
    }
    
    for(let i = 0; i < l.length; i++){
        for(let j = 0; j < l.length; j++){
            lt[j].push(l[i][j]);
        }
    }
    return lt;
}

function computeX(n, u, y ,r){
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

//kontrola ci je matica stvrcova pripadne ci sa sklada len z cisel
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
    var result = "$$" + char + "= " +  "\\begin{pmatrix}";
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
    result += "\\end{pmatrix}$$";
    return result;
}

function printLatex(spanId,char,  a){
    var span = document.getElementById(spanId);
    span.innerHTML = toLatex(char, a);
    MathJax.Hub.Queue(["Typeset", MathJax.Hub, span]);
}

function printResult(l, x, y){
    printLatex("resultL", "L", l);
    printLatex("resultY", "y", y);
    printLatex("resultX", "x", x);
}

function compute(){
    var errorMsg = "";
    if((document.getElementById("inputA").value == "") || (document.getElementById("inputB").value == "")){
        errorMsg = "Nevyplnili ste všetky polia. Pre správne fungovanie kalkulačky prosím vyplňte všetky polia.";
        showModal(errorMsg);
        return;
    }

    var a = parseInput("inputA");
    var n = a.length;
    var b = parseInput("inputB");
    var l = initializeL(n);
    var r = parseInt(document.getElementById("r").value);
    errorMsg = validate(a, b);

    if(errorMsg != ""){
        showModal(errorMsg);
        return;
    }
   
    l[0][0] = math.sqrt(a[0][0]);

    for(let j = 0; j < n; j++){
        l[j][0] = a[j][0] / l[0][0];
    }

    for(let i = 1; i < n - 1; i++){
        var tempSum = sum1(l, i);
        l[i][i] = math.sqrt(a[i][i] - tempSum);

        for(let j = i + 1; j < n;j++){
            tempSum = sum2(l, j, i);
            l[j][i] = (a[j][i] - tempSum) / l[i][i];
        }
    }
    tempSum = sum3(n, l);
    l[n - 1][n - 1] = math.sqrt(a[n - 1][n - 1] - tempSum);
   
    var y = computeY(n, l, b, r);
    var x = computeX(n, transposeL(l), y, r);
    printResult(l,x,y);
}
