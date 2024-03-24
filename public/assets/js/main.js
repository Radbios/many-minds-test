const card = document.getElementById("flash-card");


setTimeout( () => {
    card ? card.remove() : null;
}, 10000);
