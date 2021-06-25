var passengerplus = document.getElementById("pluspass");
var passengerform = document.getElementById("pass_form");

passengerplus.addEventListener('click', createPassInputs);
function createPassInputs() {
        let fullnameinput = document.createElement("INPUT");
        fullnameinput.setAttribute("type", "text");
        fullnameinput.setAttribute("name", 'passfullname[]');
        fullnameinput.setAttribute("class", 'passfullname form-control mb-4 col-md-6');
        fullnameinput.setAttribute("placeholder", 'Full name');
        passengerform.appendChild(fullnameinput);
    }