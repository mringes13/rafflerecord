startField = document.getElementById('start');
endField = document.getElementById('end');
calcButton = document.getElementById('calculate').addEventListener("click", calculateTickets);

function calculateTickets(){
    console.log(startField.value);
    console.log(endField.value);
}