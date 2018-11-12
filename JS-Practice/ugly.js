const x = 10;
        var name = "Jeremy";
        {
        	let name = "Ben";
	        console.log(name);
        }

        console.log(name);
        console.log(x);
        ////two different ways to declare an object in JS
        // var album = {
	       // artist:(name:"Sting", age:67);
	       // songs:[];
	       // title:"Ten Summoner's Tales"
	       // format:"Vinyl"
	       // speed:function(speed){
	
	       // }	
        // };

        // function Album() {
	       // this.name = arguments[0];
	       // this.songs = arguments[1];
        // }

        ////How is this variable inputing arguments into a function that takes no arguments?
        ////It's because of "invisible" variables called variadic parameters. This means there is no set number of parameters.
        // var aelbum = new Album("Hunting High and Low",[]);

        // Album.prototype.play = function(){}

        ////In Javascript, if anything has parantheses attached to it, the program will always try to execute what's in the parantheses.
        function right_now(text) {
	        console.log("Print this: " ,text);
        } ("No semicolon!")