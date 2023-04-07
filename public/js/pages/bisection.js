var funcInput = document.getElementById('function_des');
var inputA = document.getElementById("inputA");
var inputB = document.getElementById("inputB");
var inputEsp = document.getElementById("eps");
var accuracy = document.getElementById("r");
var domain = []

function getDomain(){
   
    var a = parseInt(document.getElementById("inputA").value);
    var b = parseInt(document.getElementById("inputB").value);
    if (b < a){
        let temp = a;
        a = b;
        b = temp;
    }

    var d = [];
    for (let i = (a - 1); i <= (b + 1); i =i + 0.1){
        d.push(i);
    }
    return d;
}

function createRow(table, tableRow){
    var row = document.createElement("tr");
    for(let j = 0; j < 7; j++){
        var cell = document.createElement("td");
        cell.innerText = tableRow[j];
        cell.classList.add("p-1", "text-center", "border-2", "border-black")
        row.appendChild(cell);
    }
    table.appendChild(row);
}

function createHeader(table){
    var header = document.createElement("thead");
    var row = document.createElement("tr");
    appendHeader(row, "i");
    appendHeader(row, "a");
    appendHeader(row, "f(a)");
    appendHeader(row, "b");
    appendHeader(row, "f(b)");
    appendHeader(row, "s");
    appendHeader(row, "f(s)");
    header.appendChild(row);
    table.appendChild(header);
}

function appendHeader(row, text){
    var th = document.createElement("th");
    th.innerText = text;
    th.classList.add("bg-[#ff7900]", "text-white", "p-1", "text-center", "border-2", "border-black");
    row.appendChild(th);
}

function validate(f, a, b, esp){
    if(isNaN(a) || isNaN(b) || isNaN(esp) || f == ""){
        return "Nevyplnili ste všetky polia. Pre správne fungovanie kalkulačky prosím vyplňte každé pole.";
    }
    if(esp <= 0){
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

function compute(){
    var error = "";
    var chart = document.getElementById('chart');
    var table = document.getElementById("resultTable");
    table.innerHTML = "";
    chart.innerHTML = "";
    var r = parseInt(accuracy.value);
    var esp = parseFloat(inputEsp.value);
    var a = parseInt(inputA.value);
    var b = parseInt(inputB.value);
    var f = funcInput.value;
    error = validate(f, a, b, esp);
    if(error != ""){
        showModal(error);
        return;
    }

    var domain = getDomain(r);
    var fa, fb, s, fs;
    var aList = [], bList = [], y = [];
    try{
    for(let i = 0; i < domain.length; i++){
        y.push(math.parse(f).evaluate({x: domain[i]}));
    }}catch(e){
        showModal("Nesprávna syntax pri zadávaní predpisu funkcie");
        return;
    }

    fa = math.parse(f).evaluate({x: a});
    fb = math.parse(f).evaluate({x: b});
    if(fa * fb < 0){
        createHeader(table);
        for(let i = 0; i < 10; i++){
            s = math.round((a + b) / 2, r);
            fs = math.round(math.parse(f).evaluate({x: s}), r);
            var tableRow = [i + 1, a, fa, b, fb, s, fs];
            if (Math.abs(fs) < esp){
                createRow(table, tableRow);
                bList.push(b);
                aList.push(a);
                break; 
            }
            else if((fa * fs) < 0){
                bList.push(b);
                aList.push(a);
                b = s;
            }
            else if((fb * fs) < 0){
                bList.push(b);
                aList.push(a);
                a = s;
            }
            createRow(table, tableRow);
            fa = math.round(math.parse(f).evaluate({x: a}), r);
            fb = math.round(math.parse(f).evaluate({x: b}), r);
        }
    }

    var trace1 = {
        type: "scatter",
        name: "" + f,
        mode: "lines",
        x: domain,
        y: y,
        line: {color: "#0000FF"},
        showLegend: true
    };

    var data = [trace1];

    for(let i = 0; i < aList.length; i++){
        var trace = {
            type: "scatter",
            mode: "lines",
            name:"a",
            x: [aList[i], aList[i]],
            y: [0, math.parse(f).evaluate({x: aList[i]})],
            line: {color: "#FF0000"},
            showlegend: (i < 1)
        }
        data.push(trace);
        trace = {
            type: "scatter",
            mode: "lines",
            name:"b",
            x: [bList[i], bList[i]],
            y: [0, math.parse(f).evaluate({x: bList[i]})],
            line: {color: "#00FF00"},
            showlegend: (i < 1)
        }
        data.push(trace);
    }
    var layout = {
        title: {
            text: 'Nazov grafu',
            font: {
                color: "#ff7900"
            }
        },
        xaxis:{
            title:{
                text:"x",
                font: {
                    color: "#ff7900"
                }
            }
        },
        yaxis:{
            title: {
                text: "f(x)",
                font: {
                    color: "#ff7900"
                }
            }
        }
    }
    Plotly.newPlot(chart, data, layout);
    window.addEventListener('resize', function() {
        Plotly.Plots.resize(chart);
      });
}