function playAudio(wordId){
	audioURL = "js/" + wordID;
	var audio = new Audio(audioURL).play();
	audio.currentTime = 0;
	
}