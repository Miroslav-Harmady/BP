var funcInput = document.getElementById('function_des');
var inputA = document.getElementById("inputA");
var inputEsp = document.getElementById("eps");
var domain = []
var parser = math.parser();

function getDomain(a, b){
    // var a = parseInt(document.getElementById("inputda").value);
    // var b = parseInt(document.getElementById("inputdb").value);
    var d = [];
    for (let i = a; i <= b; i = i + 0.1){
        d.push(i);
    }
    return d;
}

function createHeader(){
    var tableHead = document.createElement("thead");
    var headRow = document.createElement("tr");
   
    var headCell = document.createElement("th");
    headCell.textContent = "i"; 
    headRow.appendChild(headCell);
    headCell.classList.add("bg-[#ff7900]", "text-white", "p-1", "border-2", "border-black");

    var headCell = document.createElement("th");
    headCell.textContent = "f(xi)"
    headRow.appendChild(headCell);
    headCell.classList.add("bg-[#ff7900]", "text-white", "p-1", "border-2", "border-black");

    tableHead.appendChild(headRow);
    return tableHead;
}


function validate(f, a, b, eps, x){
    if(isNaN(a) || isNaN(b) || isNaN(eps) || f == "" || isNaN(x)){
        return "Nevyplnili ste všetky polia. Pre správne fungovanie kalkulačky prosím vyplňte každé pole.";
    }
    if(eps <= 0){
       return "Zastavovacie kritérium musí byť nezáporná hodnota";
    }
    if(a > b){
        return "Prosim zadajte interval tak, ze a je mensie ako b"; // pripadne to hodim do getDomain a prevratim hodnoty ak treba
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
    table = document.getElementById("resultTable");
    table.innerHTML = "";
    chart.innerHTML = ""; 
    var a = parseInt(document.getElementById("inputda").value);
    var b = parseInt(document.getElementById("inputdb").value);
    var eps = inputEsp.value;
    var x = parseFloat(inputA.value);
    var f = funcInput.value;
    var r = parseInt(document.getElementById("r").value);
    error = validate(f, a, b, eps, x);
    if(error != ""){
        showModal(error);
        return;
    }
    var domain = getDomain(a, b);

    y = [];
    try{
        for(let i = 0; i < domain.length; i++){
            y.push(math.parse(f).evaluate({x: domain[i]}));
        }
    }catch(e){
        showModal("Nesprávna syntax pri zadávaní predpisu funkcie");
        return;
    }
   
    var tableHead = createHeader();
    var tableBody = document.createElement("tbody");

    for(let i = 0; i < 10; i++){ 
        if(math.derivative(f, 'x').evaluate({x: x}) == 0){
            break;
        }
        var row = document.createElement("tr");
        var td = document.createElement("td");
        td.classList.add("p-1", "border-2", "border-black");
        td.textContent = i;
        row.appendChild(td);

        var td = document.createElement("td");
        td.textContent = x;
        td.classList.add("p-1", "border-2", "border-black");
        row.appendChild(td);

        tableBody.appendChild(row);

        x = math.round(x - (math.parse(f).evaluate({x: x}) / math.derivative(f, 'x').evaluate({x: x})), r); 

        if (math.abs(math.parse(f).evaluate({x: x})) < eps){
            var row = document.createElement("tr");
            var td = document.createElement("td");
            td.textContent = i + 1;
            td.classList.add("p-1", "border-2", "border-black");
            row.appendChild(td);

            var td = document.createElement("td");
            td.textContent = x;
            td.classList.add("p-1", "border-2", "border-black");
            row.appendChild(td);

            tableBody.appendChild(row);
            break;
        }
    }
    table.appendChild(tableHead);
    table.appendChild(tableBody);

    var trace1 = {
        type: "scatter",
        mode: "lines",
        x: domain,
        y: y,
        line: {color: "#0000FF"}
    };
    var data = [trace1];
    var layout = {
        title: {
            text: 'Newtonova metóda',
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