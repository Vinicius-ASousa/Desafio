import { MOVIE_LIST, MOVIE_INSERT } from '../../routes/index.mjs'
import { api } from '../api.js'
import { data } from '../modules/films/moduleFilms.js'

export const getMovie = (nome='', genrs =[]) => {

    var parametros = new URLSearchParams();

    parametros.append('acao', MOVIE_LIST.acao);
    parametros.append('controller', MOVIE_LIST.controller);

    nome != '' ? parametros.append('nome', nome) : "";

    genrs.length>0 ? genrs.forEach(valor =>{parametros.append('generos[]',valor)}) : "";
                
    return api.request('',{
        params: parametros
    })
    .then(dataJson => {
        data(dataJson);
    })
}

export const insertMovie = (nome='', genrs =[], description='', image='', year_publication='', featured='') => {
    var parametros = new URLSearchParams(); 

    parametros.append('acao', MOVIE_INSERT.acao);
    parametros.append('controller', MOVIE_INSERT.controller);

    nome != '' ? parametros.append('name', nome) : "";
    description != '' ? parametros.append('description', description) : "";
    image != '' ? parametros.append('image', image) : "";
    year_publication != '' ? parametros.append('year_publication', year_publication) : "";
    featured != '' ? parametros.append('featured', featured) : "";

    genrs.length>0 ? genrs.forEach(valor =>{parametros.append('generos[]',valor)}) : "";

    return api.request('',{
        params:parametros
    }).then(dados =>{
        dados["status"];
    })
}



