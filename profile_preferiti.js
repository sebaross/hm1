function onResponse(response) {
    console.log(response);
  return response.json();
  }


function fetchpreferiti()
{
    fetch("fetchpreferiti.php").then(onResponse).then(fetchJson)
}

fetchpreferiti();

function fetchJson(json) {
    // svuoto i risultati
    console.log(json);

    const library = document.getElementById('results');
    library.innerHTML = '';

      let num_results =results.length;
      if(num_results > 20)
        num_results = 20;


      for(let i of json) {
        const caption= document.createElement('div');
        const title = i.title;
        console.log('bau');
        console.log(title);
        const image_sel = i.img;
        const album = document.createElement('div');
        album.classList.add('album');
        const img = document.createElement('img');
        img.src = image_sel;
        img.classList.add('img');
        caption.classList.add('title');
        caption.textContent=title;
        album.appendChild(caption);
        album.appendChild(img);
        library.appendChild(album);   
      }
      
    }