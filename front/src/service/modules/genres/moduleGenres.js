//get data
export const data = (dadosJson) =>{
    for (const key in dadosJson['data']['data']) {
          document.getElementById("genero").innerHTML += 
          `<div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="generos[]" value="${dadosJson['data']['data'][key]['id']}" id="check-${dadosJson['data']['data'][key]['name']}" />
            <label class="form-check-label" for="check-${dadosJson['data']['data'][key]['name']}">
              ${dadosJson['data']['data'][key]['name']}
            </label>
           </div>`
    }
}