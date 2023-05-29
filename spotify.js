function onJson_Spotify(json) {
    console.log('JSON ricevuto');
    const library = document.querySelector('.flex-container');
    library.innerHTML = '';
  
    console.log(json)
    const results = json.albums.items;
    let num_results = json.albums.total;
    if(num_results > 20)
      num_results = 20;
    for(let i=0; i<num_results; i++) {
      const risultato = results[i];
      const title = risultato.name;
      const image_sel = risultato.images[0].url;
      const album = document.createElement('div');
      album.classList.add('album');
      const img = document.createElement('img');
      img.src = image_sel;
      const caption = document.createElement('span');
      const slink= document.createElement('a');
      slink.setAttribute('href', risultato.external_urls.spotify);
      slink.textContent = title;
      album.appendChild(caption);
      album.appendChild(img);
      album.appendChild(slink);
      library.appendChild(album);   
  }
}
  function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }
  
  function search(event) {
    const musica_input = document.querySelector('#album');
    const musica_value = encodeURIComponent(musica_input.value);
    console.log('Eseguo ricerca: ' + musica_value);
  //LEGGO OPZIONE SELEZIONATA
    fetch('spotify.php?&q=' + musica_value).then(onResponse).then(onJson_Spotify);
  }
  const form_spotify = document.querySelector('#form_musica');
  form_spotify.addEventListener('submit', search);