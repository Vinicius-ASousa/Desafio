//add html
const html = (dados) =>{
    var generos = dados.genres.join(", ");
    return `
     <div class="card" style="width: 18rem;">
    <img src="${dados.image}" height="200" class="card-img-top" alt="...">
    <div class="card-body">
     <h5 class="card-title">${dados.name}</h5>
     <p class="card-text text-sm">${dados.description}</p>
     <p class="card-text"><b>Ano</b>: ${dados.year_publication} </b><b>Gêneros</b>: ${generos}</p>
     <a href="#" class="btn btn-primary">Ver detalhes</a>
     </div> </div>`; 
}

//get datas
export const data = (dataJson)=>{
    for (const key in dataJson['data']['data']) {
        document.getElementById("result-filter").innerHTML += html(dataJson['data']['data'][key]);
    }
}