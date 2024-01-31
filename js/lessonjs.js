  function termClick(id) {
    // Hide the term for the clicked flashcard
    document.getElementById('term' + id).style.display = "none";
    // Show the corresponding definition
    document.getElementById('definition' + id).style.display = "block";
}

function definitionClick(id) {
    // Hide the definition for the clicked flashcard
    document.getElementById('definition' + id).style.display = "none";
    // Show the corresponding term
    document.getElementById('term' + id).style.display = "block";
}

let currentFlashcard = 1;
const totalFlashcards = /* Replace with the actual total number of flashcards */;

function showFlashcard(index) {
    document.getElementById(`flashcard${currentFlashcard}`).style.display = "none";
    currentFlashcard = index;
    document.getElementById(`flashcard${currentFlashcard}`).style.display = "block";
}

function nextFlashcard() {
    if (currentFlashcard < totalFlashcards) {
        showFlashcard(currentFlashcard + 1);
    }
}

function prevFlashcard() {
    if (currentFlashcard > 1) {
        showFlashcard(currentFlashcard - 1);
    }
}

// Show the first flashcard initially
showFlashcard(currentFlashcard);