function moveElement(select, id) {

    var other_select = document.getElementById(id);
    var text = select.options[select.selectedIndex].text;

    newOption = document.createElement("OPTION"),
    newOptionVal = document.createTextNode(text);

    newOption.appendChild(newOptionVal);
    other_select.insertBefore(newOption, other_select.childNodes[2]);

    select.remove(select.selectedIndex);

}