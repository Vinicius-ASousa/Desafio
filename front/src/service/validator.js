export const validator = (nome, geners, description, year_publication, featured)=>{
    var error = [];
    if(nome.length >255){
        error += "O campo nome não pode conter mais de 255 caractéres \n";
    }

    if(nome.length <1){
        error += "O campo nome não pode ser vazio \n";
    }

    if(description.length <1){
        error += "O campo descrição não pode ser vazio \n";
    }

    if(description.length >255){
        error += "O campo descrição não pode conter mais de 255 caractéres \n";
    }

    if(year_publication.length <1){
        error += "O campo ano não pode ser vazio \n";
    }

    if(geners.length <1){
        error += "Deve ser selecionado ao menos 1 genero \n";
    }
     
    return error;
}