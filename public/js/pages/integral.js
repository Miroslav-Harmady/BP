function getH(a, b, n){
    var h;
    h = (b - a) / n;
    return h;
}

function getIntervals(a, n, h){
    var intervals = [];
    for(let i = 1; i <= n + 1; i++){
        intervals.push(a + (i-1)*h);
    }
    return intervals;
}

function createHeader(){
    var tableHead = document.createElement("thead");
    var headRow = document.createElement("tr");
   
    var headCell = document.createElement("th");
    headCell.textContent = "xi"; 
    headRow.appendChild(headCell);

    var headCell = document.createElement("th");
    headCell.textContent = "f(xi)"//tu tiez to iste
    headRow.appendChild(headCell);

    tableHead.appendChild(headRow);
    return tableHead;
}

function fillBody(table, intervals, h, f, start, end, r){
    var total = 0;
    var body = document.createElement("tbody");
    for(let i = start; i < end; i++){
        var row = document.createElement("tr");

        var td = document.createElement("td");
        if(table.id == "table3"){
            td.textContent = (intervals[i] + intervals[i + 1]) / 2;
        }else{
            td.textContent = intervals[i];
        }
        row.appendChild(td);

        var td = document.createElement("td");
        if(table.id === "table3"){
            let x = (intervals[i] + intervals[i+1])/2
            td.textContent = math.round(h * math.parse(f).evaluate({x: x}), r);
            total = math.round(total + (h * math.parse(f).evaluate({x: x})), r);
        }
        else{
            td.textContent = math.round(h * math.parse(f).evaluate({x: intervals[i]}), r);
            total = math.round(total + (h * math.parse(f).evaluate({x: intervals[i]})), r); 
        }
        
        row.appendChild(td);
        body.appendChild(row);
    }
    //toto musim este nejako domysliet
    let div = document.getElementById("result");
    let p = document.createElement("p");
    p.textContent = "total: " + total;
    div.appendChild(p);
    return body;
}

function generateTable(tableId, intervals, h, f, start, end, r){
    var table = document.getElementById(tableId);
    table.innerHTML = "";

    var tableHead = createHeader();
    try{
    var tableBody = fillBody(table, intervals, h, f, start, end, r);
    }catch(e){
        showModal("Nesprávna syntax pri zadávaní predpisu funkcie");
        return;
    }
    table.appendChild(tableHead);
    table.appendChild(tableBody);
    return;
}

function validate(f, a, b, n){
    if(isNaN(a) || isNaN(b) || isNaN(n) || f == ""){
        return "Nevyplnili ste Všetky polia. Pre správne fungovanie kalkulačky prosím vyplňte každé pole.";
    }
    if(n <= 0){
       return "Počet intervalov musí byť nezáporné číslo.";
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
    var error ="";
    var f = document.getElementById("f").value;
    var b = parseInt(document.getElementById("b").value);
    var n = parseInt(document.getElementById("n").value);
    var a = parseInt(document.getElementById("a").value);
    var r = parseInt(document.getElementById("r").value);
    error = validate(f, a, b, n);
    if(error != ""){
        showModal(error);
        return;
    }
    var h = getH(a, b, n);
    var intervals;
    intervals = getIntervals(a, n, h);
    try{
    generateTable("table", intervals, h, f, 0, intervals.length - 1, r);
    generateTable("table2", intervals, h, f, 1, intervals.length, r );
    generateTable("table3", intervals, h, f, 0, intervals.length - 1, r);
    }catch(e){
        console.log(e.message)
        return;
    }
    createGraph("graph1", a, n, h, r);
}

function getDomain(){
    var a = parseInt(document.getElementById("a").value);
    var b = parseInt(document.getElementById("b").value);
    if (b < a){
        let temp = a;
        a = b;
        b = temp;
    }
    var d = [];
    for (let i = a; i <= b; i = i + 0.1, r){
        d.push(i);
    }
    return d;
}

function createGraph(graphId, a, n, h, r){
    var f = document.getElementById("f").value;
    var graph = document.getElementById(graphId);
    var domain = getDomain(r);
    var data = [], y = [], intervals = [];
    intervals = getIntervals(a, n, h);

    for(let i = 0; i < domain.length; i++){
        y.push(math.parse(f).evaluate({x: domain[i]}));
    }

    var layout = { // tu sa spise cely layout cize nazvy pomenovania osi atd
    };

    var trace = {
        type: "scatter",
        mode: "lines",
        x: domain,
        y: y,
        line: {color: "#0000FF"}
    };
    data.push(trace);
    Plotly.newPlot(graph, data, layout);
}

