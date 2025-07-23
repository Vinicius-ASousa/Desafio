import { GENRS_LIST } from '../../routes/index.mjs'
import { api } from '../api.js'
import { data } from '../modules/genres/moduleGenres.js'

export const getGenres = () => {
    return api.request('',{
      params:{
        acao: GENRS_LIST.acao,
        controller: GENRS_LIST.controller
      }
    })
      .then(dadosJson =>{
        data(dadosJson);
      })
}