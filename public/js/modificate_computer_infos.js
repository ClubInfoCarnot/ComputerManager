tds = document.getElementsByTagName("td");

function addOnClickEvent(td) {
    td.onclick = function() {
        var content = td.innerHTML;
        td.innerHTML = `<input class="entry" type="text" value="${content}"><a href="#" class="validate">Valider</a>`
        td.onclick = null;
        document.getElementsByClassName("validate")[0].onclick = function validateEntry(td) {
            td.innerHTML = document.getElementsByClassName("entry").text;
            addOnClickEvent(td);
        };
    };
}

for (const td of tds) {
    addOnClickEvent(td);
}