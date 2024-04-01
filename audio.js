function playAudio(wordId){
	audioURL = "audio/" + wordID;
	var audio = new Audio(audioURL).play();
	audio.currentTime = 0;
	
}