document.addEventListener("DOMContentLoaded", function () {
    const backgroundForm = document.getElementById('background-form');
    const tracksForm = document.getElementById('tracks-form');

    backgroundForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const fileInput = document.getElementById('background-image');
        const file = fileInput.files[0];

        // Upload the file to the server
        console.log('Background image uploaded:', file);
        alert('Background image uploaded successfully!');
    });

    tracksForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const trackUrl = document.getElementById('track-url').value;

        // Dend the URL to the server to update the track list
        console.log('New SoundCloud link added:', trackUrl);
        alert('New SoundCloud link added successfully!');
    });
});
