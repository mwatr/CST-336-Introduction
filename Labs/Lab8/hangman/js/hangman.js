var selectedWord = "";
var selectedHint = "";
var board = [];
var guess = 6;
var words = ["remote", "listless", "bemoan"];
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            
console.log(words[2]);
            
function initBoard() {
    for(var letter in selectedWord) {
        board.push("_");
    }
}
            
initBoard();

function pickBoard() {
    var randomIndex = Math.floor(Math.random() * words.length);
    selectedWord = words[randomIndex].toUpperCase();
}

function updateBoard() {
    $('#word').empty();
    
    for(var letter of board) {
        document.getElementById("word").innerHTML += letter + " ";
    }
}

function createLetters() {
    for(var letter of alphabet) {
        $("letters").append("<button class = 'letter' id = '" + "'>" + letter + "</button>");
    }
}

function checkLetter(letter) {
    var positions = new Array();
    
    for(var k = 0; k < selectedWord.length; ++k) {
        if(letter == selectedWord[k]) {
            positions.push(k);
        }
    }
    
    if(positions.length > 0) {
        updateWord(positions, letter);
    } else {
        --guess;
    }
}

function updateWord(positions, letter) {
    for(var pos of positions) {
        board[pos] = letter;
    }
    
    updateBoard();
}

function updateMan() {
    $("hangImg").attr("src", "img/stick" + (6 - guess) + ".png");
}

$("#letterBtn").click(function(){
    var boxVal = $("#letterBox").val();
    console.log("Button has value: " + boxVal);
})

$(".letter").click(function(){
    checkLetter($(this).attr("id"));
})