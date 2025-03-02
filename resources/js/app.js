import './bootstrap';

document.addEventListener("DOMContentLoaded", function () {
    if (typeof window.gameId !== "undefined") {

        window.Echo.channel('game.' + window.gameId)
            .listen('.VoteRegistered', (e) => {
                console.log('Vote registered:', e);
            })
            .listen('.VotesRevealed', (e) => {
                console.log('Votes revealed:', e);
            });
    } else {
        console.warn("gameId não definido. O Echo não pode se conectar ao canal.");
    }
});
