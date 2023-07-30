
var userClickedPattern = [];
var gamePattern = [];
var buttonColors = ["red", "blue", "green", "yellow"];
var level = 0;
var flag = true;

$(document).keypress(function(){
	if (flag) {
		flag = false;
		nextSequence();
	}
});

function animatePress(currentColor){
	currentColor = "#" + currentColor;
	$(currentColor).addClass("pressed");
	setTimeout(function(){
		$(currentColor).removeClass("pressed");
	}, 100);
}

function playSound(name){
	var audio = new Audio("./sounds/"+name+".mp3");
	audio.play();
}

function nextSequence() {
	level++;
	$("#level-title").text("Level "+level);
	var randomNumber = Math.floor(Math.random()*4);
	var randomChosenColor = buttonColors[randomNumber];
	gamePattern.push(randomChosenColor);
	$("#"+randomChosenColor).fadeOut(100).fadeIn(100);
	playSound(randomChosenColor);
}

$(".btn").click(handler);

function handler(){
	var userChosenColor = this.id;
	userClickedPattern.push(userChosenColor);
	playSound(userChosenColor);
	animatePress(userChosenColor);
	checkAnswer(userClickedPattern.length - 1);
}

function checkAnswer(currentLevel){
	// console.log(userClickedPattern);
	// console.log(gamePattern);
	if(userClickedPattern[currentLevel]===gamePattern[currentLevel]){
		// console.log("success");
		if(userClickedPattern.length===gamePattern.length){
			setTimeout(function(){
				userClickedPattern = [];
				nextSequence();
			}, 1000);
		}
	}
	else{
		// console.log("wrong");
		playSound("wrong");
		$("#level-title").text("Game Over, Press Any Key To Restart");
		$("body").addClass("game-over");
		setTimeout(function(){
			$("body").removeClass("game-over");
		}, 200);
		startOver();
	}
}

function startOver(){
	gamePattern = [];
	level = 0;
	flag = true;
}