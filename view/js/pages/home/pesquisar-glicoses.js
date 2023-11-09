//CONSTANTES
const table = document.querySelector(".glucose-history__table-container");
const tablePagination = document.querySelector(".glucose-history__pagination");
const tableVoid = document.getElementById("glucoses-void");

//FUNÇÃO QUE PESQUISA AS GLICOSES
function pesquisarGlicoses(id_usuario, limite, pagina) {
    
    //início da página
    let inicio = pagina * limite - limite;

    // A função contarGlicoses() é assíncrona, isso significa que toda instrução que vem depois dela é executada enquanto contarGlicoses() ainda está em execução!
    // Por isso, quando tento pegar o valor de uma variável pelo método return dentro da função assíncrona, dá erro de undefined...
    // Para evitar isso, utilizei uma função callback (função que só é executada depois que contarGlicoses() retornar uma resposta).
    contarGlicoses(id_usuario,(glicosesTotal) => {

        //quantidade de páginas
        let paginas = Math.ceil(glicosesTotal / limite);

        let xhr = new XMLHttpRequest;
        xhr.open("POST", "../../controller/pesquisarGlicoses.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = () => {
            if (xhr.status === 200 && xhr.readyState === 4) {
                if(xhr.response !== ""){
                    let glicoses = JSON.parse(xhr.response);
                    atualizarTabela(glicoses);
                    atualizarPaginacaoTabela(id_usuario,limite,pagina,paginas,inicio,glicoses.length,glicosesTotal);
                    tableVoid.classList.add('is-none'); // hides message "No data found"
                }else{
                    table.classList.add('is-none'); // hides table
                    tablePagination.classList.add('is-none'); // hides table pagination
                    tableVoid.classList.remove('is-none'); // shows message "No data found"
                }
            }
        };
        xhr.send(`id_usuario=${id_usuario}&limite=${limite}&inicio=${inicio}`);
    });

}//fim do pesquisarGlicoses()


//FUNÇÃO QUE ATUALIZA A TABELA DE GLICOSES
function atualizarTabela(glicoses) {

    //remove propriedade none da tabela
    table.classList.remove('is-none');

    //table row group
    let tableRowGroup = document.querySelector(".glucose-history__table-row-container");
    tableRowGroup.innerHTML = "";

    glicoses.forEach(glicose => {
        //table row
        let tableRow = document.createElement("div");
        tableRow.classList.add("glucose-history__table-row", "l-table-row");
        tableRow.id = `glicose-${glicose.id_glicose}`;

        //table cell (blank element to be copied)
        let tableCell = document.createElement("div");
        tableCell.classList.add("glucose-history__table-cell", "l-table-cell");

        //table cell (view)
        let tableCellView = tableCell.cloneNode();
        tableCellView.classList.add("glucose-history__table-cell--view");
        let viewIcon = document.createElement("div");
        viewIcon.classList.add("glucose-history__table-icon");
        viewIcon.setAttribute("onclick",`visualizarGlicose(${glicose.id_glicose}),abrirOverlay("detalhes-glicose")`);
        tableCellView.appendChild(viewIcon);
        tableRow.appendChild(tableCellView); // adds the cell view to table row

        //table cell (value)
        let tableCellValue = tableCell.cloneNode();
        tableCellValue.classList.add("glucose-history__table-cell--value");
        tableCellValue.innerText = glicose.valor;
        tableRow.appendChild(tableCellValue); // adds the cell value to table row 

        //table cell (date)
        let tableCellDate = tableCell.cloneNode();
        tableCellDate.classList.add("glucose-history__table-cell--date");
        tableCellDate.innerText = glicose.data;
        tableRow.appendChild(tableCellDate); // adds the cell date to table row 

        //table cell (time)
        let tableCellTime = tableCell.cloneNode();
        tableCellTime.classList.add("glucose-history__table-cell--time");
        tableCellTime.innerText = glicose.hora;
        tableRow.appendChild(tableCellTime); // adds the cell time to table row 

        //table cell (condition)
        let tableCellCondition = tableCell.cloneNode();
        tableCellCondition.classList.add("glucose-history__table-cell--condition");
        let span = document.createElement("span");
        if (glicose.condicao == null || glicose.condicao == "") {
            span.innerText = "Nenhum";
        } else {
            span.innerText = glicose.condicao;
        }
        tableCellCondition.appendChild(span);
        tableRow.appendChild(tableCellCondition); // adds the cell condition to table row 

        //table cell (comment)
        let tableCellComment = tableCell.cloneNode();
        tableCellComment.classList.add("glucose-history__table-cell--comment");
        if (glicose.comentario == null || glicose.comentario == "") {
            tableCellComment.innerText = "--";
        } else {
            tableCellComment.innerText = glicose.comentario.replaceAll(/(\n)/gm," ");
        }
        tableRow.appendChild(tableCellComment); // adds the cell comment to table row

        tableRowGroup.appendChild(tableRow); // adds the row to table body
    });
}//fim do atualizarTabela()

function atualizarPaginacaoTabela(id_usuario,limite,pagina,paginas,inicio,qtdGlicoses,totalGlicoses){

    //remove propriedade none da paginação
    tablePagination.classList.remove('is-none');

    //local vars
    let buttonStart = document.querySelector(".glucose-history__pagination-btn--start");
    let buttonPrevious = document.querySelector(".glucose-history__pagination-btn--previous");
    let currentPage = document.querySelector(".glucose-history__pagination-span");
    let buttonNext = document.querySelector(".glucose-history__pagination-btn--next");
    let buttonEnd = document.querySelector(".glucose-history__pagination-btn--end");

    if(pagina > 1){
        buttonStart.classList.remove('is-none');
        buttonPrevious.classList.remove('is-none');
    }else{
        buttonStart.classList.add('is-none');
        buttonPrevious.classList.add('is-none');
    }

    if(pagina < paginas){
        buttonNext.classList.remove('is-none');
        buttonEnd.classList.remove('is-none');
    }else{
        buttonNext.classList.add('is-none');
        buttonEnd.classList.add('is-none');
    }

    //updates buttons value and onclick event
    buttonStart.setAttribute("onclick",`pesquisarGlicoses(${id_usuario},${limite},1)`);
    buttonPrevious.setAttribute("onclick",`pesquisarGlicoses(${id_usuario},${limite},${pagina-1 < 1 ? 1 : pagina-1})`);
    currentPage.innerText = `${inicio+1} - ${inicio+qtdGlicoses} de ${totalGlicoses}`;
    buttonNext.setAttribute("onclick",`pesquisarGlicoses(${id_usuario},${limite},${pagina+1 > paginas ? paginas : pagina+1})`);
    buttonEnd.setAttribute("onclick",`pesquisarGlicoses(${id_usuario},${limite},${paginas})`);

}//fim do atualizarPaginacaoTabela()

//FUNÇÃO QUE RETORNA A QUANTIDADE TOTAL DE GLICOSES
function contarGlicoses(id_usuario,callback) {

    let xhr = new XMLHttpRequest;
    xhr.open("POST", "../../controller/contarGlicoses.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = () => {
        if (xhr.status === 200 && xhr.readyState === 4) {
            let resposta = parseInt(xhr.response);
            callback(resposta);
        }
    };
    xhr.send(`id_usuario=${id_usuario}`);
}//fim do contarGlicoses()