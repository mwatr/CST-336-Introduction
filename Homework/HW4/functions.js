function generateNumbers(size, range) {
    var random_arr = [];
    var total = 0;
    for (var i = 0; i < size; ++i){
        var rand = Math.floor((Math.random() * range) + 1);
        random_arr.push(rand);
        total += random_arr[i];
        console.log("Testing...testing...test...");
    }
    
    for (var i = 0; i < size; ++i){
        console.log(random_arr[i] + " ");
    }
}

function test() {
    console.log("Testing...testing...test...");
}