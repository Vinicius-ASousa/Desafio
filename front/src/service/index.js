import { getGenres } from './genre/index.js'
import { getMovie, insertMovie } from './movie/index.js'
import { validator } from './validator.js'

export const Genres = getGenres;
export const Movie = getMovie;
export const InsertMo = insertMovie;
export const InputValidator = validator;