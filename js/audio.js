function playAudio(wordId){
	audioURL = "audio/" + wordId + ".mp3";
	var audio = new Audio(audioURL).play();
	audio.currentTime = 0;
	
}