const cerca= document.querySelector("form")
cerca.addEventListener("submit", search);
//let url ="ricerca_giocatori.php?name"+Text;

function search(event){
    event.preventDefault();
    console.log("funziona");

    // Leggo il tipo e il contenuto da cercare e mando tutto alla pagina PHP
    const form_data = new FormData(document.querySelector("#search form"));
    const text=form_data.get('search');
    console.log(text);
    // Mando le specifiche della richiesta alla pagina PHP, che prepara la richiesta e la inoltra
    fetch("ricercafilm.php?q="+encodeURIComponent(form_data.get('search'))).then(searchResponse).then(jsonBasket);
 
  
}

function searchResponse(response){
    console.log(response);
    return response.json();
}
function onResponse(response) {
  console.log(response);
return response.json();
}

function aggiungiPreferiti(event){
  const parentNode= event.currentTarget.parentNode;
  const title= parentNode.querySelector('div').textContent;
  const img= parentNode.querySelector('img').src;
  
  fetch("aggiungiPreferiti.php?title=" + title + "&img=" + img).then(onResponse);

}

function jsonBasket(json) {
    // svuoto i risultati
    console.log(json);
    const library = document.getElementById('results');
    library.innerHTML = '';

      const results = json.results;
      let num_results =results.length;
      if(num_results > 20)
        num_results = 20;


      for(let i=0; i<num_results; i++) {
        const risultato = results[i];
        const caption= document.createElement('div');
        const title = risultato.title;
        const image_sel = results[i].image.url;
        const album = document.createElement('div');
        album.classList.add('album');
        const img = document.createElement('img');
        img.src = image_sel;
        img.classList.add('immagine');
        caption.classList.add('titolo');
        caption.textContent=title;

        album.appendChild(caption);
        album.appendChild(img);

        img.addEventListener('click', aggiungiPreferiti);
        library.appendChild(album);   
      
    
      }
      } 