var selectedWord = "";
var selectedHint = "";
var board = [];
var guess = 6;
var words = [{word:"remote", hint:"I feel distant, isolated. I am..."}, 
             {word:"listless", hint:"I feel de-energized, unmotivated. I am..."}, 
             {word:"bemoan", hint:"I feel sorrow, discontent. I need to..."}];
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            
//console.log(words[2]);
window.onload = startGame();

function startGame() {
  pickBoard();
  initBoard();
  updateBoard();
}      

function initBoard() {
    for(var letter in selectedWord) {
        board.push("_");
    }
}
            
initBoard();

function pickBoard() {
    var randomIndex = Math.floor(Math.random() * words.length);
    selectedWord = words[randomIndex].word.toUpperCase();
    selectedHint = words[randomIndex].hint;
}

function updateBoard() {
    $('#word').empty();
    
    for(var k = 0; k < board.length; ++k) {
        $("word").append(board[k] += " ");
    }
    
    $("#word").append("<br />");
    $("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
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
        if(!board.includes('_')) {
            endGame(true);
        } 
    } else {
        --guess;
        updateMan();
    }
    
    if(guess <= 0) {
        endGame(false);
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

function endGame(win) {
    $("#letters").hide();
    
    if(win) {
        $('#won').show();
    } else {
        $('#lost').show();
    }
}

function disableBTN(btn) {
    btn.prop("disabled",true);
    btn.attr("class", "btn btn-danger");
}

$("#letterBtn").click(function(){
    var boxVal = $("#letterBox").val();
    console.log("Button has value: " + boxVal);
});

$(".letter").click(function(){
    checkLetter($(this).attr("id"));
});

$(".replayBtn").on("click", function() {
    location.reload();
    
});