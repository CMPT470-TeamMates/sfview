// https://developer.mozilla.org/en-US/docs/Web/API/Web_Speech_API/Using_the_Web_Speech_API
// Speech-to-text currently only works for Chrome: https://github.com/mdn/web-speech-api/issues/3.
// webkitSpeechRecognition is an experimental feature, so ESLint must not
// not recognize it in its rules yet, which is why it fails the lint.
// Build without lint for now.
var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition
var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList
var SpeechRecognitionEvent = SpeechRecognitionEvent || webkitSpeechRecognitionEvent

var locations = ['library', 'AQ', 'academic quadrangle'];
var grammar = '#JSGF V1.0; grammar locations; public <location> = ' + locations.join(' | ') + ' ;'

// Instantiate SpeechRecognition object and list.
var recognition = new SpeechRecognition();
var speechRecognitionList = new SpeechGrammarList();

// Add our JSGF grammar.
speechRecognitionList.addFromString(grammar, 1);
recognition.grammars = speechRecognitionList;

//recognition.continuous = false;
recognition.lang = 'en-US';
recognition.interimResults = false; // We'll return final results instead.
recognition.maxAlternatives = 1;

var startRecognition = () => {
    recognition.start();
    console.log('Ready to receive command.');
}

var diagnostic = document.querySelector('#voice-input-result');

// Input via button.
var button = document.querySelector('#voice-input-button');
button.onclick = () => {
    startRecognition();
};

// Input via tap/click.
var area = document.querySelector('#voice-input-triggerable');
area.onclick = () => {
    startRecognition();
}

// Input via space bar.
document.onkeyup = (event) => {
    // Graceful degradation: https://medium.com/@uistephen/keyboardevent-key-for-cross-browser-key-press-check-61dbad0a067a
    if (event.defaultPrevented) {
        return;
    }
    var key = event.key || event.keyCode;
    if (key == ' ') {
        startRecognition();
    }
}

recognition.onresult = function (event) {
    // The SpeechRecognitionEvent results property returns a SpeechRecognitionResultList object
    // The SpeechRecognitionResultList object contains SpeechRecognitionResult objects.
    // It has a getter so it can be accessed like an array
    // The [last] returns the SpeechRecognitionResult at the last position.
    // Each SpeechRecognitionResult object contains SpeechRecognitionAlternative objects that contain individual results.
    // These also have getters so they can be accessed like arrays.
    // The [0] returns the SpeechRecognitionAlternative at position 0.
    // We then return the transcript property of the SpeechRecognitionAlternative object

    var last = event.results.length - 1;
    var location = event.results[last][0].transcript;
    console.log('Result received: ' + location + '.');
    console.log('Confidence: ' + event.results[0][0].confidence);
    diagnostic.textContent = 'Result received: ' + location + '.';
}

recognition.onspeechend = () => {
    recognition.stop();
}

recognition.onnomatch = () => {
    diagnostic.textContent = 'Location not recognized.';
}

recognition.onerror = (event) => {
    diagnostic.textContent = 'Error occurred in recognition: ' + event.error;
}
